<?php

namespace SapientPro\EbayAccountSDK\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Model\CustomPolicyResponse;
use SapientPro\EbayAccountSDK\ObjectSerializer;

class EbayClient
{
    public function __construct(private Client $client)
    {
    }

    public function sendRequest(string $returnType, Request $request): array
    {
        try {
            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $content = json_decode($response->getBody()->getContents());

            return [
                ObjectSerializer::deserialize($content, $returnType),
                $response->getStatusCode(),
            ];
        } catch (ApiException $e) {
            if ($e->getCode() == 200) {
                $data = ObjectSerializer::deserialize(
                    $e->getResponseBody(),
                    CustomPolicyResponse::class,
                );
                $e->setResponseObject($data);
            }

            throw $e;
        }
    }
}
