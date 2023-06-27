<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\PaymentsProgramResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentsProgramApi implements ApiInterface
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
     * Operation getPaymentsProgram
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This path parameter specifies the eBay marketplace of the payments program for which you want to retrieve
     *  the seller&#x27;s status.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  This path parameter specifies the payments program whose status is returned by the call.
     *
     * @return PaymentsProgramResponse
     * @throws ApiException on non-2xx response
     */
    public function getPaymentsProgram(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): PaymentsProgramResponse {
        $response = $this->getPaymentsProgramWithHttpInfo($marketplaceId, $paymentsProgramType);

        return $response['data'];
    }

    /**
     * Operation getPaymentsProgramWithHttpInfo
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This path parameter specifies the eBay marketplace of the payments program for which
     *  you want to retrieve the seller&#x27;s status.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  This path parameter specifies the payments program whose status is returned by the call. (required)
     *
     * @return array of PaymentsProgramResponse, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getPaymentsProgramWithHttpInfo(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): array {
        $returnType = PaymentsProgramResponse::class;
        $request = $this->getPaymentsProgramRequest($marketplaceId, $paymentsProgramType);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getPaymentsProgram'
     *
     * @param  MarketplaceIdEnum  $marketplaceId
     *  This path parameter specifies the eBay marketplace of the payments program
     *  for which you want to retrieve the seller&#x27;s status.
     * @param  PaymentsProgramType  $paymentsProgramType
     *  This path parameter specifies the payments program whose status is returned by the call. (required)
     *
     * @return Request
     */
    protected function getPaymentsProgramRequest(
        MarketplaceIdEnum $marketplaceId,
        PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS
    ): Request {
        $resourcePath = '/payments_program/{marketplace_id}/{payments_program_type}';

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
