<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
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
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentsProgramApi implements ApiInterface
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
