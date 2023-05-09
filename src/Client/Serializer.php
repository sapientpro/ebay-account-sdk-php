<?php

namespace SapientPro\EbayAccountSDK\Client;

use SapientPro\EbayAccountSDK\Models\EbayModelInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class Serializer
{
    private SymfonySerializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor(typeExtractors: [new PhpDocExtractor()]);
        $normalizers = [new ObjectNormalizer(propertyTypeExtractor: $extractor), new ArrayDenormalizer()];

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
}
