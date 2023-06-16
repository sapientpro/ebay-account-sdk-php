<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\PaymentPolicy;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyResponse;
use SapientPro\EbayAccountSDK\Models\SetPaymentPolicyResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentPolicyApi implements ApiInterface
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
     * Operation createPaymentPolicy
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request (required)
     *
     * @return SetPaymentPolicyResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createPaymentPolicy(PaymentPolicyRequest $body): SetPaymentPolicyResponse
    {
        $response = $this->createPaymentPolicyWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation createPaymentPolicyWithHttpInfo
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request (required)
     *
     * @return array of SetPaymentPolicyResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createPaymentPolicyWithHttpInfo(PaymentPolicyRequest $body): array
    {
        $returnType = SetPaymentPolicyResponse::class;
        $request = $this->createPaymentPolicyRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createPaymentPolicy'
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createPaymentPolicyRequest(PaymentPolicyRequest $body): Request
    {
        $resourcePath = '/payment_policy';

        return $this->ebayRequest->postRequest($body, $resourcePath);
    }

    /**
     * Operation deletePaymentPolicy
     *
     * @param  string  $paymentPolicyId  This path parameter specifies the ID of the payment policy you want to delete.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deletePaymentPolicy(string $paymentPolicyId): void
    {
        $this->deletePaymentPolicyWithHttpInfo($paymentPolicyId);
    }

    /**
     * Operation deletePaymentPolicyWithHttpInfo
     *
     * @param  string  $paymentPolicyId  This path parameter specifies the ID of the payment policy you want to delete.
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deletePaymentPolicyWithHttpInfo(string $paymentPolicyId): array
    {
        $request = $this->deletePaymentPolicyRequest($paymentPolicyId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deletePaymentPolicy'
     *
     * @param  string  $paymentPolicyId  This path parameter specifies the ID of the payment policy you want to delete.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deletePaymentPolicyRequest(string $paymentPolicyId): Request
    {
        $resourcePath = '/payment_policy/{payment_policy_id}';

        $resourcePath = str_replace(
            '{' . 'payment_policy_id' . '}',
            Serializer::toPathValue($paymentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getPaymentPolicies
     *
     * @param  MarketplaceIdEnum  $marketPlaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return PaymentPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function getPaymentPolicies(MarketplaceIdEnum $marketPlaceId): PaymentPolicyResponse
    {
        $response = $this->getPaymentPoliciesWithHttpInfo($marketPlaceId);

        return $response['data'];
    }

    /**
     * Operation getPaymentPoliciesWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return array of PaymentPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function getPaymentPoliciesWithHttpInfo(MarketplaceIdEnum $marketplaceId): array
    {
        $returnType = PaymentPolicyResponse::class;
        $request = $this->getPaymentPoliciesRequest($marketplaceId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getPaymentPolicies'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policies you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @return Request
     */
    protected function getPaymentPoliciesRequest(MarketplaceIdEnum $marketplaceId): Request
    {
        $resourcePath = '/payment_policy';
        $queryParams['marketplace_id'] = Serializer::toQueryValue($marketplaceId->value);

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation getPaymentPolicy
     *
     * @param  string  $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to retrieve.
     *
     * @return PaymentPolicy
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getPaymentPolicy(string $paymentPolicyId): PaymentPolicy
    {
        $response = $this->getPaymentPolicyWithHttpInfo($paymentPolicyId);

        return $response['data'];
    }

    /**
     * Operation getPaymentPolicyWithHttpInfo
     *
     * @param  string  $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to retrieve.
     *
     * @return array of PaymentPolicy, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getPaymentPolicyWithHttpInfo(string $paymentPolicyId): array
    {
        $returnType = PaymentPolicy::class;
        $request = $this->getPaymentPolicyRequest($paymentPolicyId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getPaymentPolicy'
     *
     * @param  string  $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to retrieve.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getPaymentPolicyRequest(string $paymentPolicyId): Request
    {
        $resourcePath = '/payment_policy/{payment_policy_id}';

        $resourcePath = str_replace(
            '{' . 'payment_policy_id' . '}',
            Serializer::toPathValue($paymentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getPaymentPolicyByName
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the payment policy you want to retrieve.
     *
     * @return PaymentPolicy
     * @throws ApiException on non-2xx response
     */
    public function getPaymentPolicyByName(MarketplaceIdEnum $marketplaceId, string $name): PaymentPolicy
    {
        $response = $this->getPaymentPolicyByNameWithHttpInfo($marketplaceId, $name);

        return $response['data'];
    }

    /**
     * Operation getPaymentPolicyByNameWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the payment policy you want to retrieve. (required)
     *
     * @return array of PaymentPolicy, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     */
    public function getPaymentPolicyByNameWithHttpInfo(MarketplaceIdEnum $marketplaceId, string $name): array
    {
        $returnType = PaymentPolicy::class;
        $request = $this->getPaymentPolicyByNameRequest($marketplaceId, $name);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getPaymentPolicyByName'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This query parameter specifies the eBay marketplace of the policy you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     * @param  string  $name
     *  This query parameter specifies the seller-defined name of the payment policy you want to retrieve.
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getPaymentPolicyByNameRequest(MarketplaceIdEnum $marketplaceId, string $name): Request
    {
        $resourcePath = '/payment_policy/get_by_policy_name';
        $queryParams['marketplace_id'] = Serializer::toQueryValue($marketplaceId->value);
        $queryParams['name'] = Serializer::toQueryValue($name);

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation updatePaymentPolicy
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request (required)
     * @param  string  $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to update.
     *
     * @return SetPaymentPolicyResponse
     * @throws ApiException on non-2xx response
     */
    public function updatePaymentPolicy(PaymentPolicyRequest $body, string $paymentPolicyId): SetPaymentPolicyResponse
    {
        $response = $this->updatePaymentPolicyWithHttpInfo($body, $paymentPolicyId);

        return $response['data'];
    }

    /**
     * Operation updatePaymentPolicyWithHttpInfo
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request
     * @param $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to update.
     *
     * @return array of SetPaymentPolicyResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function updatePaymentPolicyWithHttpInfo(PaymentPolicyRequest $body, $paymentPolicyId): array
    {
        $returnType = SetPaymentPolicyResponse::class;
        $request = $this->updatePaymentPolicyRequest($body, $paymentPolicyId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'updatePaymentPolicy'
     *
     * @param  PaymentPolicyRequest  $body  Payment policy request
     * @param  string  $paymentPolicyId
     *  This path parameter specifies the ID of the payment policy you want to update.
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updatePaymentPolicyRequest(PaymentPolicyRequest $body, string $paymentPolicyId): Request
    {
        $resourcePath = '/payment_policy/{payment_policy_id}';
        $resourcePath = str_replace(
            '{' . 'payment_policy_id' . '}',
            Serializer::toPathValue($paymentPolicyId),
            $resourcePath
        );

        return $this->ebayRequest->putRequest($body, $resourcePath);
    }
}
