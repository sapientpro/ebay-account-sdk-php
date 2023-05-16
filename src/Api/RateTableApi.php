<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\RateTableResponse;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RateTableApi implements ApiInterface
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
     * Operation getRateTables
     *
     * @param  CountryCodeEnum|null  $countryCode
     *  This query parameter specifies the two-letter
     * https://www.iso.org/iso-3166-country-codes.html
     * code of country for which you want shipping rate table information.
     * If you do not specify a country code,
     * the request returns all of the seller's defined shipping rate tables for all eBay marketplaces.
     * For implementation help, refer to eBay API documentation at
     * https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return RateTableResponse
     * @throws ApiException on non-2xx response
     */
    public function getRateTables(CountryCodeEnum $countryCode = null): RateTableResponse
    {
        $response = $this->getRateTablesWithHttpInfo($countryCode);

        return $response['data'];
    }

    /**
     * Operation getRateTablesWithHttpInfo
     *
     * @param  CountryCodeEnum|null  $countryCode
     *  This query parameter specifies the two-letter ISO 3166 code of country
     * for which you want shipping rate table information.
     * If you do not specify a country code,
     * the request returns all of the seller's defined shipping rate tables for all eBay marketplaces.
     * For implementation help, refer to eBay API documentation at
     * https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return array of RateTableResponse, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getRateTablesWithHttpInfo(CountryCodeEnum $countryCode = null): array
    {
        $returnType = RateTableResponse::class;
        $request = $this->getRateTablesRequest($countryCode);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getRateTables'
     *
     * @param  CountryCodeEnum|null  $countryCode
     *  This query parameter specifies the two-letter ISO 3166 code of country
     * for which you want shipping rate table information.
     * If you do not specify a country code, the request returns all of
     * the seller's defined shipping rate tables for all eBay marketplaces.
     * For implementation help, refer to eBay API documentation at
     * https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return Request
     */
    protected function getRateTablesRequest(CountryCodeEnum $countryCode = null): Request
    {
        $resourcePath = '/rate_table';
        $queryParams = null;

        // query params
        if (null !== $countryCode) {
            $queryParams['country_code'] = Serializer::toQueryValue($countryCode->value);
        }

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }
}
