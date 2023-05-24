<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

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
