<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\CustomPolicy;
use SapientPro\EbayAccountSDK\Models\CustomPolicyCreateRequest;
use SapientPro\EbayAccountSDK\Models\CustomPolicyRequest;
use SapientPro\EbayAccountSDK\Models\CustomPolicyResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CustomPolicyApi implements ApiInterface
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

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation createCustomPolicy
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function createCustomPolicy(
        CustomPolicyCreateRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId
    ): array {
        $response = $this->createCustomPolicyWithHttpInfo($body, $xEbayCMarketplaceId);

        return $response['data'];
    }

    /**
     * Operation createCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function createCustomPolicyWithHttpInfo(
        CustomPolicyCreateRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId
    ): array {
        $request = $this->createCustomPolicyRequest($body, $xEbayCMarketplaceId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'createCustomPolicy'
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return Request
     */
    protected function createCustomPolicyRequest(
        CustomPolicyCreateRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId
    ): Request {
        $resourcePath = '/custom_policy/';

        return $this->ebayRequest->postRequest(
            $body,
            $resourcePath,
            headerParameters: ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }

    /**
     * Operation getCustomPolicies
     *
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return CustomPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicies(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $policy_types = null
    ): CustomPolicyResponse {
        $response = $this->getCustomPoliciesWithHttpInfo($xEbayCMarketplaceId, $policy_types);

        return $response['data'];
    }

    /**
     * Operation getCustomPoliciesWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return array of \SapientPro\EbayAccountSDK\Model\CustomPolicyResponse,
     * HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException on non-2xx response
     */
    public function getCustomPoliciesWithHttpInfo(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $policy_types = null
    ): array {
        $returnType = CustomPolicyResponse::class;
        $request = $this->getCustomPoliciesRequest($xEbayCMarketplaceId, $policy_types);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getCustomPolicies'
     *
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return Request
     */
    protected function getCustomPoliciesRequest(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $policy_types = null
    ): Request {
        $resourcePath = '/custom_policy/';
        $queryParams = [];

        if (null !== $policy_types) {
            $queryParams['policy_types'] = $policy_types;
        }

        return $this->ebayRequest->getRequest(
            $resourcePath,
            $queryParams,
            ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }

    /**
     * Operation getCustomPolicy
     *
     * @param  string  $customPolicyId  Unique custom policy identifier
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return CustomPolicy
     *
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicy(string $customPolicyId, MarketplaceIdEnum $xEbayCMarketplaceId): CustomPolicy
    {
        $response = $this->getCustomPolicyWithHttpInfo($customPolicyId, $xEbayCMarketplaceId);

        return $response['data'];
    }

    /**
     * Operation getCustomPolicyWithHttpInfo
     *
     * @param  string  $customPolicyId  Unique custom policy identifier
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return array of \SapientPro\EbayAccountSDK\Models\CustomPolicy,
     * HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicyWithHttpInfo(string $customPolicyId, MarketplaceIdEnum $xEbayCMarketplaceId): array
    {
        $request = $this->getCustomPolicyRequest($customPolicyId, $xEbayCMarketplaceId);

        return $this->ebayClient->sendRequest($request, CustomPolicy::class);
    }

    /**
     * Create request for operation 'getCustomPolicy'
     *
     * @param  string  $customPolicyId  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return Request
     */
    protected function getCustomPolicyRequest(string $customPolicyId, MarketplaceIdEnum $xEbayCMarketplaceId): Request
    {
        $resourcePath = '/custom_policy/{custom_policy_id}';

        $resourcePath = str_replace(
            '{' . 'custom_policy_id' . '}',
            ObjectSerializer::toPathValue($customPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->getRequest(
            $resourcePath,
            headerParameters: ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }

    /**
     * Operation updateCustomPolicy
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @param  string  $customPolicyId  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicy(
        CustomPolicyRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $customPolicyId
    ): void {
        $this->updateCustomPolicyWithHttpInfo($body, $xEbayCMarketplaceId, $customPolicyId);
    }

    /**
     * Operation updateCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @param  string  $customPolicyId  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @return array of HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicyWithHttpInfo(
        CustomPolicyRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $customPolicyId
    ): array {
        $request = $this->updateCustomPolicyRequest($body, $xEbayCMarketplaceId, $customPolicyId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'updateCustomPolicy'
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @param  string  $customPolicyId  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @return Request
     */
    protected function updateCustomPolicyRequest(
        CustomPolicyRequest $body,
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $customPolicyId
    ): Request {
        $resourcePath = '/custom_policy/{custom_policy_id}';

        $resourcePath = str_replace(
            '{' . 'custom_policy_id' . '}',
            ObjectSerializer::toPathValue($customPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->putRequest(
            $body,
            $resourcePath,
            headerParameters: ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }
}
