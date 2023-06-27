<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\SellerEligibilityMultiProgramResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   SapientPro
 * @link     https://sapient.pro/
 */
class AdvertisingEligibilityApi implements ApiInterface
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
     * Operation getAdvertisingEligibility
     * This method allows developers to check the seller eligibility status for eBay advertising programs.
     *
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId
     * @param  string|null  $programTypes
     * @return SellerEligibilityMultiProgramResponse
     * @throws ApiException
     */
    public function getAdvertisingEligibility(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $programTypes = null
    ): SellerEligibilityMultiProgramResponse {
        $response = $this->getAdvertisingEligibilityWithHttpInfo($xEbayCMarketplaceId, $programTypes);

        return $response['data'];
    }

    /**
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId
     * @param  string|null  $programTypes
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function getAdvertisingEligibilityWithHttpInfo(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $programTypes = null
    ): array {
        $request = $this->getAdvertisingEligibilityRequest($xEbayCMarketplaceId, $programTypes);

        return $this->ebayClient->sendRequest($request, returnType: SellerEligibilityMultiProgramResponse::class);
    }

    /**
     * @param  MarketplaceIdEnum  $xEbayCMarketplaceId
     * @param  string|null  $programTypes
     * @return Request
     */
    public function getAdvertisingEligibilityRequest(
        MarketplaceIdEnum $xEbayCMarketplaceId,
        string $programTypes = null
    ): Request {
        $resourcePath = '/advertising_eligibility';
        $queryParams['program_types'] = $programTypes;

        return $this->ebayRequest->getRequest(
            $resourcePath,
            $queryParams,
            ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }
}
