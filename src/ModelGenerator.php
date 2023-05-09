<?php

namespace SapientPro\EbayAccountSDK;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\Property;
use SapientPro\EbayAccountSDK\Models\EbayModelInterface;

class ModelGenerator
{
    private const SOURCE_PATH = 'src';

    private Filesystem $fileSystem;

    public function __construct()
    {
        $localAdapter = new LocalFilesystemAdapter(self::SOURCE_PATH);
        $this->fileSystem = new Filesystem($localAdapter);
    }
    public function generate(string $jsonPath): void
    {
        $json = $this->fileSystem->read($jsonPath);
        $data = json_decode($json);

        foreach ($data->schemas as $className => $classData) {
            $class = new ClassType($className);

            if (isset($classData->description)) {
                $class->addComment($classData->description);
            }

            $class->addImplement('\SapientPro\EbayAccountSDK\Models\EbayModelInterface');

            $properties = [];

            foreach ($classData->properties as $propertyName => $property) {
                $classProperty = $class->addProperty($propertyName);
                $classProperty->addComment($property->description);

                if (!isset($property->type)) {
                    $processedProperty = $this->processTypelessProperty($property, $classProperty);

                    $properties[] = $processedProperty;

                    continue;
                }

                $type = $this->processType($property->type);
                $classType = null !== $type ? $type : $property->type;

                if ('array' === $classType) {
                    $processedProperty = $this->processArrayProperty($property, $classProperty);

                    $properties[] = $processedProperty;

                    continue;
                }

                $classProperty->setType($classType)->setComment($property->description);

                $properties[] = $classProperty;
            }

            $class->setProperties($properties);

            $phpFile = new PhpFile();
            $namespace = $phpFile->addNamespace('SapientPro\EbayAccountSDK\Models');
            $namespace->add($class);

            $this->fileSystem->write("Models\\" . "$className" . ".php", (string) $phpFile);
        }
    }

    private function processType(string $type): ?string
    {
        $typesMap = [
            'boolean' => 'bool',
            'integer' => 'int'
        ];

        return $typesMap[$type] ?? null;
    }

    private function extractObjectType(string $referenceObject): string
    {
        return EbayModelInterface::NAMESPACE . substr($referenceObject, strlen('#/components/schemas/'));
    }

    private function processTypelessProperty(object $jsonProperty, Property $classProperty): Property
    {
        $referenceObject = $jsonProperty->{'$ref'};
        $objectType = $this->extractObjectType($referenceObject);

        $classProperty->setType($objectType);

        return $classProperty;
    }

    private function processArrayProperty(object $jsonProperty, Property $classProperty): Property
    {
        $items = $jsonProperty->items;

        $classProperty->setType('array');

        $docBlockType = isset($items->{'$ref'})
            ? $this->extractObjectType($items->{'$ref'})
            : $items->type;

        $classProperty->addComment('@var ' . $docBlockType . '[]');

        return $classProperty;
    }
}
