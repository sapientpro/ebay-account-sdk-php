<?php

namespace SapientPro\EbayAccountSDK\Client;

use SapientPro\EbayAccountSDK\Models\EbayModelInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class Serializer
{
    private SymfonySerializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor(typeExtractors: [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizers = [
            new ArrayDenormalizer(),
            new BackedEnumNormalizer(),
            new ObjectNormalizer(propertyTypeExtractor: $extractor)
        ];

        $this->serializer = new SymfonySerializer($normalizers, $encoders);
    }

    public function deserialize(string $json, string $class): ?EbayModelInterface
    {
        return $this->serializer->deserialize($json, $class, 'json');
    }

    public function serialize(EbayModelInterface $class): string
    {
        return $this->serializer->serialize($class, JsonEncoder::FORMAT);
    }

    public static function toPathValue(string $value): string
    {
        return rawurlencode($value);
    }

    public static function toQueryValue(array|string $object): string
    {
        if (is_array($object)) {
            return implode(',', $object);
        }

        return $object;
    }
}
