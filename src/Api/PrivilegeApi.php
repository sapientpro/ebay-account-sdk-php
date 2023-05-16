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
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PrivilegeApi implements ApiInterface
{
    protected ClientInterface $client;

    protected Configuration $config;

    protected EbayClient $ebayClient;

    protected EbayRequest $ebayRequest;

    public function __construct(
        EbayClient $ebayClient = null,
        EbayRequest $ebayRequest = null,
        ClientInterface $client = null,
        Configuration $config = null,
    ) {
        $serializer = new Serializer();
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->ebayClient = $ebayClient ?: new EbayClient($this->client, $serializer);
        $this->ebayRequest = $ebayRequest ?: new EbayRequest(new HeaderSelector(), $this->config, $serializer);
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
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
        $returnType = SellingPrivileges::class;
        $request = $this->getPrivilegesRequest();

        return $this->ebayClient->sendRequest($request, $returnType);
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
