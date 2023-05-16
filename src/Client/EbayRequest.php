<?php

namespace SapientPro\EbayAccountSDK\Client;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\EbayModelInterface;

class EbayRequest
{
    public function __construct(
        private HeaderSelector $headerSelector,
        private Configuration $config,
        private Serializer $serializer
    ) {
    }

    public function getRequest(
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $parameters = $this->processParameters('GET', $queryParameters, $headerParameters);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    public function postRequest(
        EbayModelInterface $body,
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $parameters = $this->processParameters('POST', $queryParameters, $headerParameters);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $this->serializer->serialize($body)
        );
    }

    public function putRequest(
        EbayModelInterface $body,
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $parameters = $this->processParameters('PUT', $queryParameters, $headerParameters);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $this->serializer->serialize($body)
        );
    }

    public function deleteRequest(
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $parameters = $this->processParameters('DELETE', $queryParameters, $headerParameters);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    private function processParameters(
        string $method,
        array $queryParameters = null,
        array $headerParameters = null
    ): array {
        $queryParams = [];
        $headerParams = [];

        if (null !== $queryParameters) {
            foreach ($queryParameters as $key => $parameter) {
                $queryParams[$key] = Serializer::toQueryValue($parameter);
            }
        }

        if (null !== $headerParameters) {
            foreach ($headerParameters as $key => $parameter) {
                $headerParams[$key] = $parameter;
            }
        }

        $headers = match ($method) {
            'GET' => $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            ),
            'POST' => $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            ),
            'PUT' => $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            ),
            'DELETE' => $this->headerSelector->selectHeaders(
                [],
                []
            ),
        };

        // this endpoint requires OAuth (access token)
        if (null !== $this->config->getAccessToken()) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return [
            'headers' => $headers,
            'query' => $query
        ];
    }
}
