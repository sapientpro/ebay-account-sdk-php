<?php

namespace SapientPro\EbayAccountSDK;

use League\Flysystem\FileAttributes;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;
use Nette\PhpGenerator\PhpFile;

class EnumGenerator
{
    private const SOURCE_PATH = 'src';
    public const NAMESPACE = 'SapientPro\\EbayAccountSDK\\Enums';

    private Filesystem $fileSystem;

    public function __construct()
    {
        $localAdapter = new LocalFilesystemAdapter(self::SOURCE_PATH);
        $this->fileSystem = new Filesystem($localAdapter);
    }

    public function generate(): void
    {
        $files = $this->fileSystem->listContents('Enums');

        /** @var FileAttributes $file */
        foreach ($files as $file) {
            /** @var ClassType $constEnum */
            $constEnum = ClassType::fromCode($this->fileSystem->read($file->path()));

            $constants = $constEnum->getConstants();

            $enum = new EnumType($constEnum->getName());
            $enum->setType('string');
            $enumName = $enum->getName();

            foreach ($constants as $constant) {
                $enum->addCase($constant->getName(), $constant->getValue())
                    ->addComment($constant->getComment());
            }

            $phpFile = new PhpFile();
            $namespace = $phpFile->addNamespace(self::NAMESPACE);
            $namespace->add($enum);

            $this->fileSystem->write("Enums\\" . "$enumName" . ".php", (string) $phpFile);
        }
    }
}
