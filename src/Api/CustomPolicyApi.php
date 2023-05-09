<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Utils;
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
use SapientPro\EbayAccountSDK\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use RuntimeException;
use stdClass;

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
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function createCustomPolicy(CustomPolicyCreateRequest $body, string $x_ebay_c_marketplace_id): array
    {
        $response = $this->createCustomPolicyWithHttpInfo($body, $x_ebay_c_marketplace_id);

        return $response['data'];
    }

    /**
     * Operation createCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function createCustomPolicyWithHttpInfo(
        CustomPolicyCreateRequest $body,
        string $x_ebay_c_marketplace_id
    ): array {
        $request = $this->createCustomPolicyRequest($body, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'createCustomPolicy'
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createCustomPolicyRequest(
        CustomPolicyCreateRequest $body,
        string $x_ebay_c_marketplace_id
    ): Request {
        $resourcePath = '/custom_policy/';

        return $this->ebayRequest->postRequest(
            $body,
            $resourcePath,
            x_ebay_c_marketplace_id: $x_ebay_c_marketplace_id
        );
    }

    /**
     * Operation createCustomPolicyAsync
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     * @return PromiseInterface
     */
    public function createCustomPolicyAsync(
        CustomPolicyCreateRequest $body,
        string $x_ebay_c_marketplace_id
    ): PromiseInterface {
        return $this->createCustomPolicyAsyncWithHttpInfo($body, $x_ebay_c_marketplace_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createCustomPolicyAsyncWithHttpInfo
     *
     *
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in the MarketplaceIdEnum
     * @return PromiseInterface
     */
    public function createCustomPolicyAsyncWithHttpInfo(
        CustomPolicyCreateRequest $body,
        string $x_ebay_c_marketplace_id
    ): PromiseInterface {
        $returnType = 'object';
        $request = $this->createCustomPolicyRequest($body, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendAsync($request, $returnType);
    }

    /**
     * Operation getCustomPolicies
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return CustomPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicies(
        string $x_ebay_c_marketplace_id,
        string $policy_types = null
    ): CustomPolicyResponse {
        $response = $this->getCustomPoliciesWithHttpInfo($x_ebay_c_marketplace_id, $policy_types);

        return $response['data'];
    }

    /**
     * Operation getCustomPoliciesWithHttpInfo
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return array of \SapientPro\EbayAccountSDK\Model\CustomPolicyResponse,
     * HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     */
    public function getCustomPoliciesWithHttpInfo(string $x_ebay_c_marketplace_id, string $policy_types = null): array
    {
        $returnType = CustomPolicyResponse::class;
        $request = $this->getCustomPoliciesRequest($x_ebay_c_marketplace_id, $policy_types);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getCustomPolicies'
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getCustomPoliciesRequest(string $x_ebay_c_marketplace_id, string $policy_types = null): Request
    {
        $resourcePath = '/custom_policy/';
        $queryParams = [];

        if (null !== $policy_types) {
            $queryParams['policy_types'] = $policy_types;
        }

        return $this->ebayRequest->getRequest($resourcePath, $queryParams, $x_ebay_c_marketplace_id);
    }

    /**
     * Operation getCustomPoliciesAsync
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPoliciesAsync(
        string $x_ebay_c_marketplace_id,
        string $policy_types = null
    ): PromiseInterface {
        return $this->getCustomPoliciesAsyncWithHttpInfo($x_ebay_c_marketplace_id, $policy_types)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCustomPoliciesAsyncWithHttpInfo
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPoliciesAsyncWithHttpInfo(
        string $x_ebay_c_marketplace_id,
        string $policy_types = null
    ): PromiseInterface {
        $returnType = CustomPolicyResponse::class;
        $request = $this->getCustomPoliciesRequest($x_ebay_c_marketplace_id, $policy_types);

        return $this->ebayClient->sendAsync($request, $returnType);
    }

    /**
     * Operation getCustomPolicy
     *
     * @param  string  $custom_policy_id  Unique custom policy identifier
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return CustomPolicy
     *
     * @throws ApiException on non-2xx response
     * @throws \JsonException
     */
    public function getCustomPolicy(string $custom_policy_id, string $x_ebay_c_marketplace_id): CustomPolicy
    {
        $response = $this->getCustomPolicyWithHttpInfo($custom_policy_id, $x_ebay_c_marketplace_id);

        return $response['data'];
    }

    /**
     * Operation getCustomPolicyWithHttpInfo
     *
     * @param  string  $custom_policy_id  Unique custom policy identifier
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return array of \SapientPro\EbayAccountSDK\Models\CustomPolicy,
     * HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws \JsonException
     *
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicyWithHttpInfo(string $custom_policy_id, string $x_ebay_c_marketplace_id): array
    {
        $request = $this->getCustomPolicyRequest($custom_policy_id, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendRequest($request, CustomPolicy::class);
    }

    /**
     * Create request for operation 'getCustomPolicy'
     *
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getCustomPolicyRequest(string $custom_policy_id, string $x_ebay_c_marketplace_id): Request
    {
        $resourcePath = '/custom_policy/{custom_policy_id}';

        $resourcePath = str_replace(
            '{' . 'custom_policy_id' . '}',
            ObjectSerializer::toPathValue($custom_policy_id),
            $resourcePath
        );

        return $this->ebayRequest->getRequest(
            $resourcePath,
            x_ebay_c_marketplace_id: $x_ebay_c_marketplace_id
        );
    }

    /**
     * Operation getCustomPolicyAsync
     *
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPolicyAsync(string $custom_policy_id, string $x_ebay_c_marketplace_id): PromiseInterface
    {
        return $this->getCustomPolicyAsyncWithHttpInfo($custom_policy_id, $x_ebay_c_marketplace_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCustomPolicyAsyncWithHttpInfo
     *
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPolicyAsyncWithHttpInfo(
        string $custom_policy_id,
        string $x_ebay_c_marketplace_id
    ): PromiseInterface {
        $returnType = CustomPolicy::class;
        $request = $this->getCustomPolicyRequest($custom_policy_id, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendAsync($request, $returnType);
    }

    /**
     * Operation updateCustomPolicy
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicy(
        CustomPolicyRequest $body,
        string $x_ebay_c_marketplace_id,
        string $custom_policy_id
    ): void {
        $this->updateCustomPolicyWithHttpInfo($body, $x_ebay_c_marketplace_id, $custom_policy_id);
    }

    /**
     * Operation updateCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return array of HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicyWithHttpInfo(
        CustomPolicyRequest $body,
        string $x_ebay_c_marketplace_id,
        string $custom_policy_id
    ): array {
        $request = $this->updateCustomPolicyRequest($body, $x_ebay_c_marketplace_id, $custom_policy_id);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'updateCustomPolicy'
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updateCustomPolicyRequest(
        CustomPolicyRequest $body,
        string $x_ebay_c_marketplace_id,
        string $custom_policy_id
    ): Request {
        $resourcePath = '/custom_policy/{custom_policy_id}';

        $resourcePath = str_replace(
            '{' . 'custom_policy_id' . '}',
            ObjectSerializer::toPathValue($custom_policy_id),
            $resourcePath
        );

        return $this->ebayRequest->putRequest($body, $resourcePath, x_ebay_c_marketplace_id: $x_ebay_c_marketplace_id);
    }

    /**
     * Operation updateCustomPolicyAsync
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function updateCustomPolicyAsync(
        CustomPolicyRequest $body,
        string $x_ebay_c_marketplace_id,
        string $custom_policy_id
    ): PromiseInterface {
        return $this->updateCustomPolicyAsyncWithHttpInfo($body, $x_ebay_c_marketplace_id, $custom_policy_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateCustomPolicyAsyncWithHttpInfo
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $custom_policy_id  Unique custom policy identifier for the policy to be returned.
     * This value is automatically assigned by the system when the policy is created.
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function updateCustomPolicyAsyncWithHttpInfo(
        CustomPolicyRequest $body,
        string $x_ebay_c_marketplace_id,
        string $custom_policy_id
    ): PromiseInterface {
        $request = $this->updateCustomPolicyRequest($body, $x_ebay_c_marketplace_id, $custom_policy_id);

        return $this->ebayClient->sendAsync($request);
    }
}
