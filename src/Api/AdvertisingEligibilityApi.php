<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
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
        $returnType = SellerEligibilityMultiProgramResponse::class;
        $request = $this->getAdvertisingEligibilityRequest($xEbayCMarketplaceId, $programTypes);

        return $this->ebayClient->sendRequest($request, $returnType);
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
        $queryParams = null;

        if ($programTypes !== null) {
            $queryParams['program_types'] = Serializer::toQueryValue($programTypes);
        }

        return $this->ebayRequest->getRequest(
            $resourcePath,
            $queryParams,
            ['X-EBAY-C-MARKETPLACE-ID' => $xEbayCMarketplaceId->value]
        );
    }
}
