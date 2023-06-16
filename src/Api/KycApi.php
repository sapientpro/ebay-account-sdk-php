<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class KycApi implements ApiInterface
{
    /** @ignore */
    private EbayClient $ebayClient;

    /** @ignore */
    private EbayRequest $ebayRequest;

    /** @ignore */
    private Configuration $config;

    /**
     * @ignore
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;

        $serializer = new Serializer();
        $client = new Client();

        $this->ebayClient = new EbayClient($client, $serializer);
        $this->ebayRequest = new EbayRequest(
            new HeaderSelector(),
            $this->config,
            $serializer
        );
    }

    /**
     * @ignore
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /** @ignore */
    public function setEbayClient(EbayClient $ebayClient): void
    {
        $this->ebayClient = $ebayClient;
    }

    /**
     * Operation getKYC
     *
     * This method was originally created to see which onboarding requirements were still pending
     * for sellers being onboarded for eBay managed payments,
     * but now that all seller accounts are onboarded globally,
     * this method should now just returne an empty payload with a 204 No Content HTTP status code.
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function getKYC(): void
    {
        $this->getKYCWithHttpInfo();
    }

    /**
     * Operation getKYCWithHttpInfo
     *
     *
     * @return array of KycResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getKYCWithHttpInfo(): array
    {
        $request = $this->getKYCRequest();

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'getKYC'
     *
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getKYCRequest(): Request
    {
        $resourcePath = '/kyc';

        return $this->ebayRequest->getRequest($resourcePath);
    }
}
