<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\PaymentsProgramOnboardingResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OnboardingApi implements ApiInterface
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
     * Operation getPaymentsProgramOnboarding
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  The eBay marketplace ID associated with the onboarding status to retrieve.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  The type of payments program whose status is returned by the method.
     *
     * @return PaymentsProgramOnboardingResponse
     * @throws ApiException on non-2xx response
     *
     * @deprecated This method is no longer applicable,
     * as all seller accounts globally have been enabled for the new eBay payment and checkout flow.
     */
    public function getPaymentsProgramOnboarding(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): PaymentsProgramOnboardingResponse {
        $response = $this->getPaymentsProgramOnboardingWithHttpInfo($marketplaceId, $paymentsProgramType);

        return $response['data'];
    }

    /**
     * Operation getPaymentsProgramOnboardingWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  The eBay marketplace ID associated with the onboarding status to retrieve.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  The type of payments program whose status is returned by the method.
     *
     * @return array of PaymentsProgramOnboardingResponse, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getPaymentsProgramOnboardingWithHttpInfo(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): array {
        $returnType = PaymentsProgramOnboardingResponse::class;
        $request = $this->getPaymentsProgramOnboardingRequest($marketplaceId, $paymentsProgramType);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getPaymentsProgramOnboarding'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  The eBay marketplace ID associated with the onboarding status to retrieve.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  The type of payments program whose status is returned by the method.
     *
     * @return Request
     */
    protected function getPaymentsProgramOnboardingRequest(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): Request {
        $resourcePath = '/payments_program/{marketplace_id}/{payments_program_type}/onboarding';

        $resourcePath = str_replace(
            [
                '{' . 'marketplace_id' . '}',
                '{' . 'payments_program_type' . '}'
            ],
            [
                Serializer::toPathValue($marketplaceId->value),
                Serializer::toPathValue($paymentsProgramType->value)
            ],
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }
}
