<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use SapientPro\EbayAccountSDK\Api\ApiInterface;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;

trait CreatesApiClass
{
    public function createApi(string $class, Client $client): ApiInterface
    {
        $configuration = (new Configuration())->setAccessToken('test');

        $api = new $class($configuration);
        $api->setEbayClient(new EbayClient($client, new Serializer()));

        return $api;
    }
}
