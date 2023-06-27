<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\SellingPrivileges;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PrivilegeApi implements ApiInterface
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
     * Operation getPrivileges
     *
     *
     * @return SellingPrivileges
     * @throws ApiException on non-2xx response
     */
    public function getPrivileges(): SellingPrivileges
    {
        $response = $this->getPrivilegesWithHttpInfo();

        return $response['data'];
    }

    /**
     * Operation getPrivilegesWithHttpInfo
     *
     *
     * @return array of SellingPrivileges, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getPrivilegesWithHttpInfo(): array
    {
        $request = $this->getPrivilegesRequest();

        return $this->ebayClient->sendRequest($request, returnType: SellingPrivileges::class);
    }

    /**
     * Create request for operation 'getPrivileges'
     *
     * @return Request
     */
    protected function getPrivilegesRequest(): Request
    {
        $resourcePath = '/privilege';

        return $this->ebayRequest->getRequest($resourcePath);
    }
}
