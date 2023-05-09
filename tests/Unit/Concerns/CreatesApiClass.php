<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use SapientPro\EbayAccountSDK\Api\ApiInterface;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\Serializer;

trait CreatesApiClass
{
    public function createApi(string $class, Client $client): ApiInterface
    {
        return new $class(new EbayClient($client, new Serializer()));
    }
}
