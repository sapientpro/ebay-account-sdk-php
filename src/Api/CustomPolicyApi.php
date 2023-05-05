<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Utils;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Model\CustomPolicy;
use SapientPro\EbayAccountSDK\Model\CustomPolicyCreateRequest;
use SapientPro\EbayAccountSDK\Model\CustomPolicyRequest;
use SapientPro\EbayAccountSDK\Model\CustomPolicyResponse;
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
class CustomPolicyApi
{
    protected ClientInterface $client;

    protected Configuration $config;

    protected HeaderSelector $headerSelector;

    protected EbayClient $ebayClient;

    protected EbayRequest $ebayRequest;

    /**
     * @param  ClientInterface|null  $client
     * @param  Configuration|null  $config
     * @param  HeaderSelector|null  $selector
     */
    public function __construct(
        EbayClient $ebayClient = null,
        EbayRequest $ebayRequest = null,
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->ebayClient = $ebayClient ?: new EbayClient($this->client);
        $this->ebayRequest = $ebayRequest ?: new EbayRequest($this->headerSelector, $this->config);
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation createCustomPolicy
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay marketplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return object
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createCustomPolicy(CustomPolicyCreateRequest $body, string $x_ebay_c_marketplace_id)
    {
        [$response] = $this->createCustomPolicyWithHttpInfo($body, $x_ebay_c_marketplace_id);

        return $response;
    }

    /**
     * Operation createCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay marketplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function createCustomPolicyWithHttpInfo(CustomPolicyCreateRequest $body, string $x_ebay_c_marketplace_id)
    {
        $returnType = 'object';
        $request = $this->createCustomPolicyRequest($body, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendRequest($returnType, $request);
    }

    /**
     * Create request for operation 'createCustomPolicy'
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createCustomPolicyRequest(CustomPolicyCreateRequest $body, string $x_ebay_c_marketplace_id)
    {
        $resourcePath = '/custom_policy/';

        return $this->ebayRequest->postRequest(
            $body,
            $resourcePath,
            x_ebay_c_marketplace_id: $x_ebay_c_marketplace_id
        );
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Operation createCustomPolicyAsync
     *
     * @param  CustomPolicyCreateRequest  $body  Request to create a new Custom Policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function createCustomPolicyAsync($body, $x_ebay_c_marketplace_id)
    {
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
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function createCustomPolicyAsyncWithHttpInfo($body, $x_ebay_c_marketplace_id)
    {
        $returnType = 'object';
        $request = $this->createCustomPolicyRequest($body, $x_ebay_c_marketplace_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
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
     * Operation getCustomPolicies
     *
     * @param  string  $x_ebay_c_marketplace_id  Ebay marketplace for the custom policy that is being created.
     * Supported values for this header can be found in MarketplaceIdEnum
     * @param  string|null  $policy_types  Type of custom policies to be returned.
     *
     * @return CustomPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicies(string $x_ebay_c_marketplace_id, string $policy_types = null)
    {
        [$response] = $this->getCustomPoliciesWithHttpInfo($x_ebay_c_marketplace_id, $policy_types);

        return $response;
    }

    /**
     * Operation getCustomPoliciesWithHttpInfo
     *
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $policy_types  This query parameter specifies the type of custom policies to be returned.&lt;br /&gt;&lt;br /&gt;Multiple policy types may be requested in a single call by providing a comma-delimited set of all policy types to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; Omitting this query parameter from a request will also return policies of all policy types.&lt;/span&gt;&lt;br/&gt;&lt;br/&gt;Two Custom Policy types are supported: &lt;ul&gt;&lt;li&gt;Product Compliance (PRODUCT_COMPLIANCE)&lt;/li&gt; &lt;li&gt;Takeback (TAKE_BACK)&lt;/li&gt;&lt;/ul&gt; (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SapientPro\EbayAccountSDK\Model\CustomPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCustomPoliciesWithHttpInfo(string $x_ebay_c_marketplace_id, string $policy_types = null): array
    {
        $returnType = CustomPolicyResponse::class;
        $request = $this->getCustomPoliciesRequest($x_ebay_c_marketplace_id, $policy_types);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $content = json_decode($response->getBody()->getContents());

            return [
                ObjectSerializer::deserialize($content, $returnType),
                $response->getStatusCode(),
            ];
        } catch (ApiException $e) {
            if ($e->getCode() == 200) {
                $data = ObjectSerializer::deserialize(
                    $e->getResponseBody(),
                    CustomPolicyResponse::class,
                );
                $e->setResponseObject($data);
            }

            throw $e;
        }
    }

    /**
     * Create request for operation 'getCustomPolicies'
     *
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string|null  $policy_types  This query parameter specifies the type of custom policies to be returned.&lt;br /&gt;&lt;br /&gt;Multiple policy types may be requested in a single call by providing a comma-delimited set of all policy types to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; Omitting this query parameter from a request will also return policies of all policy types.&lt;/span&gt;&lt;br/&gt;&lt;br/&gt;Two Custom Policy types are supported: &lt;ul&gt;&lt;li&gt;Product Compliance (PRODUCT_COMPLIANCE)&lt;/li&gt; &lt;li&gt;Takeback (TAKE_BACK)&lt;/li&gt;&lt;/ul&gt; (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getCustomPoliciesRequest(string $x_ebay_c_marketplace_id, string $policy_types = null)
    {
        $resourcePath = '/custom_policy/';
        $queryParams = [];
        $headerParams = [];

        // query params
        if (null !== $policy_types) {
            $queryParams['policy_types'] = ObjectSerializer::toQueryValue($policy_types, null);
        }

        $headerParams['X-EBAY-C-MARKETPLACE-ID'] = ObjectSerializer::toHeaderValue($x_ebay_c_marketplace_id);

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            []
        );

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = $this->config->getAccessToken();
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

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    /**
     * Operation getCustomPoliciesAsync
     *
     *
     *
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $policy_types  This query parameter specifies the type of custom policies to be returned.&lt;br /&gt;&lt;br /&gt;Multiple policy types may be requested in a single call by providing a comma-delimited set of all policy types to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; Omitting this query parameter from a request will also return policies of all policy types.&lt;/span&gt;&lt;br/&gt;&lt;br/&gt;Two Custom Policy types are supported: &lt;ul&gt;&lt;li&gt;Product Compliance (PRODUCT_COMPLIANCE)&lt;/li&gt; &lt;li&gt;Takeback (TAKE_BACK)&lt;/li&gt;&lt;/ul&gt; (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPoliciesAsync($x_ebay_c_marketplace_id, $policy_types = null): PromiseInterface
    {
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
     *
     *
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $policy_types  This query parameter specifies the type of custom policies to be returned.&lt;br /&gt;&lt;br /&gt;Multiple policy types may be requested in a single call by providing a comma-delimited set of all policy types to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; Omitting this query parameter from a request will also return policies of all policy types.&lt;/span&gt;&lt;br/&gt;&lt;br/&gt;Two Custom Policy types are supported: &lt;ul&gt;&lt;li&gt;Product Compliance (PRODUCT_COMPLIANCE)&lt;/li&gt; &lt;li&gt;Takeback (TAKE_BACK)&lt;/li&gt;&lt;/ul&gt; (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPoliciesAsyncWithHttpInfo($x_ebay_c_marketplace_id, $policy_types = null)
    {
        $request = $this->getCustomPoliciesRequest($x_ebay_c_marketplace_id, $policy_types);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) {
                    $returnType = CustomPolicyResponse::class;
                    $content = json_decode($response->getBody()->getContents());

                    return [
                        ObjectSerializer::deserialize($content, $returnType),
                        $response->getStatusCode()
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
                        responseBody: $response->getBody()
                    );
                }
            );
    }

    /**
     * Operation getCustomPolicy
     *
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function getCustomPolicy(string $custom_policy_id, string $x_ebay_c_marketplace_id): array
    {
        [$response] = $this->getCustomPolicyWithHttpInfo($custom_policy_id, $x_ebay_c_marketplace_id);

        return $response;
    }

    /**
     * Operation getCustomPolicyWithHttpInfo
     *
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SapientPro\EbayAccountSDK\Model\CustomPolicy, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCustomPolicyWithHttpInfo(string $custom_policy_id, string $x_ebay_c_marketplace_id): array
    {
        $request = $this->getCustomPolicyRequest($custom_policy_id, $x_ebay_c_marketplace_id);

        return $this->ebayClient->sendRequest(CustomPolicy::class, $request);
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
     *
     *
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getCustomPolicyAsyncWithHttpInfo(
        string $custom_policy_id,
        string $x_ebay_c_marketplace_id
    ): PromiseInterface {
        $request = $this->getCustomPolicyRequest($custom_policy_id, $x_ebay_c_marketplace_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) {
                    $returnType = CustomPolicy::class;
                    $content = json_decode($response->getBody()->getContents());

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
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
                        responseBody: $response->getBody()
                    );
                }
            );
    }

    /**
     * Operation updateCustomPolicy
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicy($body, $x_ebay_c_marketplace_id, $custom_policy_id)
    {
        $this->updateCustomPolicyWithHttpInfo($body, $x_ebay_c_marketplace_id, $custom_policy_id);
    }

    /**
     * Operation updateCustomPolicyWithHttpInfo
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateCustomPolicyWithHttpInfo($body, $x_ebay_c_marketplace_id, $custom_policy_id)
    {
        $returnType = '';
        $request = $this->updateCustomPolicyRequest($body, $x_ebay_c_marketplace_id, $custom_policy_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'updateCustomPolicy'
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updateCustomPolicyRequest($body, $x_ebay_c_marketplace_id, $custom_policy_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $body when calling updateCustomPolicy'
            );
        }
        // verify the required parameter 'x_ebay_c_marketplace_id' is set
        if ($x_ebay_c_marketplace_id === null || (is_array($x_ebay_c_marketplace_id) && count($x_ebay_c_marketplace_id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $x_ebay_c_marketplace_id when calling updateCustomPolicy'
            );
        }
        // verify the required parameter 'custom_policy_id' is set
        if ($custom_policy_id === null || (is_array($custom_policy_id) && count($custom_policy_id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $custom_policy_id when calling updateCustomPolicy'
            );
        }

        $resourcePath = '/custom_policy/{custom_policy_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($x_ebay_c_marketplace_id !== null) {
            $headerParams['X-EBAY-C-MARKETPLACE-ID'] = ObjectSerializer::toHeaderValue($x_ebay_c_marketplace_id);
        }

        // path params
        if ($custom_policy_id !== null) {
            $resourcePath = str_replace(
                '{' . 'custom_policy_id' . '}',
                ObjectSerializer::toPathValue($custom_policy_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name'     => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

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

        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateCustomPolicyAsync
     *
     *
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function updateCustomPolicyAsync($body, $x_ebay_c_marketplace_id, $custom_policy_id)
    {
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
     *
     *
     * @param  CustomPolicyRequest  $body  Request to update a current custom policy. (required)
     * @param  string  $x_ebay_c_marketplace_id  This header parameter specifies the eBay markeplace for the custom policy that is being created. Supported values for this header can be found in the &lt;a href&#x3D;\&quot;/api-docs/sell/account/types/ba:MarketplaceIdEnum\&quot; target&#x3D;\&quot;_blank\&quot;&gt;MarketplaceIdEnum&lt;/a&gt; type definition.&lt;br/&gt; &lt;br/&gt; &lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; The following eBay marketplaces support Custom Policies: &lt;ul&gt;&lt;li&gt;Germany (EBAY_DE)&lt;/li&gt; &lt;li&gt;Canada (EBAY_CA)&lt;/li&gt; &lt;li&gt;Australia (EBAY_AU)&lt;/li&gt; &lt;li&gt;United States (EBAY_US)&lt;/li&gt; &lt;li&gt;France (EBAY_FR)&lt;/li&gt;&lt;/ul&gt;&lt;/span&gt; (required)
     * @param  string  $custom_policy_id  This path parameter is the unique custom policy identifier for the policy to be returned.&lt;br/&gt;&lt;br/&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; This value is automatically assigned by the system when the policy is created.&lt;/span&gt; (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function updateCustomPolicyAsyncWithHttpInfo($body, $x_ebay_c_marketplace_id, $custom_policy_id)
    {
        $returnType = '';
        $request = $this->updateCustomPolicyRequest($body, $x_ebay_c_marketplace_id, $custom_policy_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
}
