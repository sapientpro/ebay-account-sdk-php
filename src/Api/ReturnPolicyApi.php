<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\ReturnPolicy;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyResponse;
use SapientPro\EbayAccountSDK\Models\SetReturnPolicyResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ReturnPolicyApi implements ApiInterface
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
     * Operation createReturnPolicy
     *
     * @param  ReturnPolicyRequest  $body  Return policy request (required)
     *
     * @return SetReturnPolicyResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createReturnPolicy(ReturnPolicyRequest $body): SetReturnPolicyResponse
    {
        $response = $this->createReturnPolicyWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation createReturnPolicyWithHttpInfo
     *
     * @param  ReturnPolicyRequest  $body  Return policy request (required)
     *
     * @return array of SetReturnPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createReturnPolicyWithHttpInfo(ReturnPolicyRequest $body): array
    {
        $returnType = SetReturnPolicyResponse::class;
        $request = $this->createReturnPolicyRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createReturnPolicy'
     *
     * @param  ReturnPolicyRequest  $body  Return policy request (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createReturnPolicyRequest(ReturnPolicyRequest $body): Request
    {
        $resourcePath = '/return_policy';

        return $this->ebayRequest->postRequest($body, $resourcePath);
    }

    /**
     * Operation deleteReturnPolicy
     *
     * @param  string  $returnPolicyId  This path parameter specifies the ID of the return policy you want to delete.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteReturnPolicy(string $returnPolicyId): void
    {
        $this->deleteReturnPolicyWithHttpInfo($returnPolicyId);
    }

    /**
     * Operation deleteReturnPolicyWithHttpInfo
     *
     * @param  string  $returnPolicyId  This path parameter specifies the ID of the return policy you want to delete.
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteReturnPolicyWithHttpInfo(string $returnPolicyId): array
    {
        $request = $this->deleteReturnPolicyRequest($returnPolicyId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteReturnPolicy'
     *
     * @param  string  $returnPolicyId  This path parameter specifies the ID of the return policy you want to delete.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteReturnPolicyRequest(string $returnPolicyId): Request
    {
        $resourcePath = '/return_policy/{return_policy_id}';

        $resourcePath = str_replace(
            '{' . 'return_policy_id' . '}',
            Serializer::toPathValue($returnPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getReturnPolicies
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return ReturnPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getReturnPolicies(MarketplaceIdEnum $marketplaceId): ReturnPolicyResponse
    {
        $response = $this->getReturnPoliciesWithHttpInfo($marketplaceId);

        return $response['data'];
    }

    /**
     * Operation getReturnPoliciesWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return array of ReturnPolicyResponse, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getReturnPoliciesWithHttpInfo(MarketplaceIdEnum $marketplaceId): array
    {
        $returnType = ReturnPolicyResponse::class;
        $request = $this->getReturnPoliciesRequest($marketplaceId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getReturnPolicies'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return Request
     */
    protected function getReturnPoliciesRequest(MarketplaceIdEnum $marketplaceId): Request
    {
        $resourcePath = '/return_policy';

        $queryParams['marketplace_id'] = Serializer::toQueryValue($marketplaceId->value);

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation getReturnPolicy
     *
     * @param  string  $returnPolicyId
     *  This path parameter specifies the of the return policy you want to retrieve.
     *
     * @return ReturnPolicy
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getReturnPolicy(string $returnPolicyId): ReturnPolicy
    {
        $response = $this->getReturnPolicyWithHttpInfo($returnPolicyId);

        return $response['data'];
    }

    /**
     * Operation getReturnPolicyWithHttpInfo
     *
     * @param  string  $returnPolicyId
     *  This path parameter specifies the of the return policy you want to retrieve.
     *
     * @return array of ReturnPolicy, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getReturnPolicyWithHttpInfo(string $returnPolicyId): array
    {
        $returnType = ReturnPolicy::class;
        $request = $this->getReturnPolicyRequest($returnPolicyId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getReturnPolicy'
     *
     * @param  string  $returnPolicyId
     *  This path parameter specifies the of the return policy you want to retrieve.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getReturnPolicyRequest(string $returnPolicyId): Request
    {
        $resourcePath = '/return_policy/{return_policy_id}';

        $resourcePath = str_replace(
            '{' . 'return_policy_id' . '}',
            Serializer::toPathValue($returnPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getReturnPolicyByName
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the return policy you want to retrieve.
     *
     * @return ReturnPolicy
     * @throws ApiException on non-2xx response
     */
    public function getReturnPolicyByName(MarketplaceIdEnum $marketplaceId, string $name): ReturnPolicy
    {
        $response = $this->getReturnPolicyByNameWithHttpInfo($marketplaceId, $name);

        return $response['data'];
    }

    /**
     * Operation getReturnPolicyByNameWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the return policy you want to retrieve.
     *
     * @return array of ReturnPolicy, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getReturnPolicyByNameWithHttpInfo(MarketplaceIdEnum $marketplaceId, string $name): array
    {
        $returnType = ReturnPolicy::class;
        $request = $this->getReturnPolicyByNameRequest($marketplaceId, $name);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getReturnPolicyByName'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the return policy you want to retrieve.
     *
     * @return Request
     */
    protected function getReturnPolicyByNameRequest(MarketplaceIdEnum $marketplaceId, string $name): Request
    {
        $resourcePath = '/return_policy/get_by_policy_name';
        $queryParams['marketplace_id'] = Serializer::toQueryValue($marketplaceId->value);
        $queryParams['name'] = Serializer::toQueryValue($name);

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation updateReturnPolicy
     *
     * @param  ReturnPolicyRequest  $body  Container for a return policy request. (required)
     * @param  string  $returnPolicyId  This path parameter specifies the ID of the return policy you want to update. (required)
     *
     * @return SetReturnPolicyResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateReturnPolicy(ReturnPolicyRequest $body, string $returnPolicyId): SetReturnPolicyResponse
    {
        $response = $this->updateReturnPolicyWithHttpInfo($body, $returnPolicyId);

        return $response['data'];
    }

    /**
     * Operation updateReturnPolicyWithHttpInfo
     *
     * @param  ReturnPolicyRequest  $body  Container for a return policy request. (required)
     * @param  string  $returnPolicyId
     *  This path parameter specifies the ID of the return policy you want to update.
     *
     * @return array of SetReturnPolicyResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateReturnPolicyWithHttpInfo(ReturnPolicyRequest $body, string $returnPolicyId): array
    {
        $returnType = SetReturnPolicyResponse::class;
        $request = $this->updateReturnPolicyRequest($body, $returnPolicyId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'updateReturnPolicy'
     *
     * @param  ReturnPolicyRequest  $body  Container for a return policy request. (required)
     * @param  string  $returnPolicyId
     *  This path parameter specifies the ID of the return policy you want to update.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updateReturnPolicyRequest(ReturnPolicyRequest $body, string $returnPolicyId): Request
    {
        $resourcePath = '/return_policy/{return_policy_id}';

        $resourcePath = str_replace(
            '{' . 'return_policy_id' . '}',
            Serializer::toPathValue($returnPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->putRequest($body, $resourcePath);
    }
}
