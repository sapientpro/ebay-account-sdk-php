<?php

namespace SapientPro\EbayAccountSDK\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\ObjectSerializer;

class EbayClient
{
    public function __construct(private Client $client, private Serializer $serializer)
    {
    }

    /**
     * @throws ApiException
     */
    public function sendRequest(Request $request, string $returnType = null): array
    {
        try {
            $response = $this->client->send($request);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse()?->getHeaders(),
                $e->getResponse()?->getBody()?->getContents()
            );
        }

        return $this->prepareResponse($response, $request->getUri(), $returnType);
    }

    public function sendAsync(Request $request, string $returnType = null): PromiseInterface
    {
        return $this->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($returnType) {
                    $content = json_decode($response->getBody()->getContents());

                    return [
                        ObjectSerializer::deserialize($content, $returnType),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * @throws ApiException
     */
    private function prepareResponse(
        ResponseInterface $response,
        string $requestUri,
        string $returnType = null
    ): array {
        $statusCode = $response->getStatusCode();
        $preparedResponse['code'] = $statusCode;

        if (!empty($response->getHeaders())) {
            $preparedResponse['headers'] = $statusCode;
        }

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $requestUri
                ),
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        }

        $content = $response->getBody()->getContents();

        if (!empty($content)) {
            $model = $this->serializer->deserialize($content, $returnType);

            if (null !== $model) {
                $preparedResponse['data'] = $model;
            }
        }

        return $preparedResponse;
    }
}
