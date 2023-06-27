<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicy;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicyRequest;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicyResponse;
use SapientPro\EbayAccountSDK\Models\SetFulfillmentPolicyResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FulfillmentPolicyApi implements ApiInterface
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
     * Operation createFulfillmentPolicy
     *
     * @param  FulfillmentPolicyRequest  $body  Request to create a seller account fulfillment policy. (required)
     *
     * @return SetFulfillmentPolicyResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createFulfillmentPolicy(FulfillmentPolicyRequest $body): SetFulfillmentPolicyResponse
    {
        $response = $this->createFulfillmentPolicyWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation createFulfillmentPolicyWithHttpInfo
     *
     * @param  FulfillmentPolicyRequest  $body  Request to create a seller account fulfillment policy. (required)
     *
     * @return array of \SapientPro\EbayAccountSDK\Model\SetFulfillmentPolicyResponse,
     * HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createFulfillmentPolicyWithHttpInfo(FulfillmentPolicyRequest $body): array
    {
        $returnType = SetFulfillmentPolicyResponse::class;
        $request = $this->createFulfillmentPolicyRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createFulfillmentPolicy'
     *
     * @param  FulfillmentPolicyRequest  $body  Request to create a seller account fulfillment policy. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createFulfillmentPolicyRequest(FulfillmentPolicyRequest $body): Request
    {
        $resourcePath = '/fulfillment_policy/';

        return $this->ebayRequest->postRequest(
            $resourcePath,
            $body
        );
    }

    /**
     * Operation deleteFulfillmentPolicy
     *
     * @param  string  $fulfillmentPolicyId  This path parameter specifies the ID of the fulfillment policy to delete.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteFulfillmentPolicy(string $fulfillmentPolicyId): void
    {
        $this->deleteFulfillmentPolicyWithHttpInfo($fulfillmentPolicyId);
    }

    /**
     * Operation deleteFulfillmentPolicyWithHttpInfo
     *
     * @param  string  $fulfillmentPolicyId  This path parameter specifies the ID of the fulfillment policy to delete.
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteFulfillmentPolicyWithHttpInfo(string $fulfillmentPolicyId): array
    {
        $request = $this->deleteFulfillmentPolicyRequest($fulfillmentPolicyId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteFulfillmentPolicy'
     *
     * @param  string  $fulfillmentPolicyId  This path parameter specifies the ID of the fulfillment policy to delete.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteFulfillmentPolicyRequest(string $fulfillmentPolicyId): Request
    {
        $resourcePath = '/fulfillment_policy/{fulfillmentPolicyId}';

        $resourcePath = str_replace(
            '{' . 'fulfillmentPolicyId' . '}',
            Serializer::toPathValue($fulfillmentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getFulfillmentPolicies
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return FulfillmentPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPolicies(MarketplaceIdEnum $marketplaceId): FulfillmentPolicyResponse
    {
        $response = $this->getFulfillmentPoliciesWithHttpInfo($marketplaceId);

        return $response['data'];
    }

    /**
     * Operation getFulfillmentPoliciesWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return array of FulfillmentPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPoliciesWithHttpInfo(MarketplaceIdEnum $marketplaceId): array
    {
        $returnType = FulfillmentPolicyResponse::class;
        $request = $this->getFulfillmentPoliciesRequest($marketplaceId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getFulfillmentPolicies'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return Request
     */
    protected function getFulfillmentPoliciesRequest(MarketplaceIdEnum $marketplaceId): Request
    {
        $resourcePath = '/fulfillment_policy';

        $queryParams['marketplace_id'] = $marketplaceId->value;

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation getFulfillmentPolicy
     *
     * @param  string  $fulfillmentPolicyId
     *
     * @return FulfillmentPolicy
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPolicy(string $fulfillmentPolicyId): FulfillmentPolicy
    {
        $response = $this->getFulfillmentPolicyWithHttpInfo($fulfillmentPolicyId);

        return $response['data'];
    }

    /**
     * Operation getFulfillmentPolicyWithHttpInfo
     *
     * @param  string  $fulfillmentPolicyId
     *
     * @return array of \SapientPro\EbayAccountSDK\Model\FulfillmentPolicy, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPolicyWithHttpInfo(string $fulfillmentPolicyId): array
    {
        $returnType = FulfillmentPolicy::class;
        $request = $this->getFulfillmentPolicyRequest($fulfillmentPolicyId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getFulfillmentPolicy'
     *
     * @param  string  $fulfillmentPolicyId ID of the fulfillment policy you want to retrieve. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getFulfillmentPolicyRequest(string $fulfillmentPolicyId): Request
    {
        $resourcePath = '/fulfillment_policy/{fulfillmentPolicyId}';

        $resourcePath = str_replace(
            '{' . 'fulfillmentPolicyId' . '}',
            Serializer::toPathValue($fulfillmentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getFulfillmentPolicyByName
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the fulfillment policy you want to retrieve.
     *
     * @return FulfillmentPolicy
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPolicyByName(MarketplaceIdEnum $marketplaceId, string $name): FulfillmentPolicy
    {
        $response = $this->getFulfillmentPolicyByNameWithHttpInfo($marketplaceId, $name);

        return $response['data'];
    }

    /**
     * Operation getFulfillmentPolicyByNameWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the fulfillment policy you want to retrieve.
     *
     * @return array of \SapientPro\EbayAccountSDK\Model\FulfillmentPolicy, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getFulfillmentPolicyByNameWithHttpInfo(MarketplaceIdEnum $marketplaceId, string $name): array
    {
        $request = $this->getFulfillmentPolicyByNameRequest($marketplaceId, $name);

        return $this->ebayClient->sendRequest($request, returnType: FulfillmentPolicy::class);
    }

    /**
     * Create request for operation 'getFulfillmentPolicyByName'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the fulfillment policy you want to retrieve.
     *
     * @return Request
     */
    protected function getFulfillmentPolicyByNameRequest(MarketplaceIdEnum $marketplaceId, string $name): Request
    {
        $resourcePath = '/fulfillment_policy/get_by_policy_name';

        $queryParameters = [
            'marketplace_id' => $marketplaceId->value,
            'name' => $name,
        ];

        return $this->ebayRequest->getRequest($resourcePath, $queryParameters);
    }

    /**
     * Operation updateFulfillmentPolicy
     *
     * @param  FulfillmentPolicyRequest  $body  Fulfillment policy request (required)
     * @param  string  $fulfillmentPolicyId
     *  This path parameter specifies the ID of the fulfillment policy you want to update.
     *
     * @return SetFulfillmentPolicyResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateFulfillmentPolicy(
        FulfillmentPolicyRequest $body,
        string $fulfillmentPolicyId
    ): SetFulfillmentPolicyResponse {
        $response = $this->updateFulfillmentPolicyWithHttpInfo($body, $fulfillmentPolicyId);

        return $response['data'];
    }

    /**
     * Operation updateFulfillmentPolicyWithHttpInfo
     *
     * @param  FulfillmentPolicyRequest  $body  Fulfillment policy request (required)
     * @param  string  $fulfillmentPolicyId
     *  This path parameter specifies the ID of the fulfillment policy you want to update.
     *
     * @return array of SetFulfillmentPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateFulfillmentPolicyWithHttpInfo(
        FulfillmentPolicyRequest $body,
        string $fulfillmentPolicyId
    ): array {
        $request = $this->updateFulfillmentPolicyRequest($body, $fulfillmentPolicyId);

        return $this->ebayClient->sendRequest($request, returnType: SetFulfillmentPolicyResponse::class);
    }

    /**
     * Create request for operation 'updateFulfillmentPolicy'
     *
     * @param  FulfillmentPolicyRequest  $body  Fulfillment policy request
     * @param  string  $fulfillmentPolicyId
     * This path parameter specifies the ID of the fulfillment policy you want to update.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updateFulfillmentPolicyRequest(
        FulfillmentPolicyRequest $body,
        string $fulfillmentPolicyId
    ): Request {
        $resourcePath = '/fulfillment_policy/{fulfillmentPolicyId}';

        $resourcePath = str_replace(
            '{' . 'fulfillmentPolicyId' . '}',
            Serializer::toPathValue($fulfillmentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->putRequest($resourcePath, $body);
    }
}
