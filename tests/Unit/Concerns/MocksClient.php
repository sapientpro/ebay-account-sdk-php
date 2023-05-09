<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\Serializer;

trait MocksClient
{
    public function prepareClientMock(
        int $status,
        string $responseBody = null,
        array $responseHeaders = []
    ): Client {
        $clientMock = new MockHandler([
            new Response($status, $responseHeaders, $responseBody)
        ]);

        $handlerStack = HandlerStack::create($clientMock);

        return new Client(['handler' => $handlerStack]);
    }
}
