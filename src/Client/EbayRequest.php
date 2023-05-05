<?php

namespace SapientPro\EbayAccountSDK\Client;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Model\ModelInterface;
use SapientPro\EbayAccountSDK\ObjectSerializer;

class EbayRequest
{
    public function __construct(private HeaderSelector $headerSelector, private Configuration $config)
    {
    }

    public function getRequest(
        string $resourcePath,
        array $queryParameters = null,
        string $x_ebay_c_marketplace_id = null
    ): Request {
        $parameters = $this->processParameters($queryParameters, $x_ebay_c_marketplace_id);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    public function postRequest(
        ModelInterface $body,
        string $resourcePath,
        array $queryParameters = null,
        string $x_ebay_c_marketplace_id = null
    ): Request {
        $parameters = $this->processParameters($queryParameters, $x_ebay_c_marketplace_id);
        $query = $parameters['query'];
        $headers = $parameters['headers'];

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            (string) $body
        );
    }

    private function processParameters(
        array $queryParameters = null,
        string $x_ebay_c_marketplace_id = null
    ): array {
        $queryParams = [];
        $headerParams = [];

        if (null !== $queryParameters) {
            foreach ($queryParameters as $key => $parameter) {
                $queryParams[$key] = ObjectSerializer::toQueryValue($parameter);
            }
        }

        if (null !== $x_ebay_c_marketplace_id) {
            $headerParams['X-EBAY-C-MARKETPLACE-ID'] = ObjectSerializer::toHeaderValue($x_ebay_c_marketplace_id);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
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
