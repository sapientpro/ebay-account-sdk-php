<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\SalesTax;
use SapientPro\EbayAccountSDK\Models\SalesTaxBase;
use SapientPro\EbayAccountSDK\Models\SalesTaxes;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SalesTaxApi implements ApiInterface
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
     * Operation createOrReplaceSalesTax
     *
     * @param  SalesTaxBase  $body  A container that describes the how the sales tax is calculated. (required)
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country for which you want to create a sales tax table entry.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the tax jurisdiction for the table entry you want to create.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceSalesTax(
        SalesTaxBase $body,
        CountryCodeEnum $countryCode,
        string $jurisdictionId
    ): void {
        $this->createOrReplaceSalesTaxWithHttpInfo($body, $countryCode, $jurisdictionId);
    }

    /**
     * Operation createOrReplaceSalesTaxWithHttpInfo
     *
     * @param  SalesTaxBase  $body  A container that describes the how the sales tax is calculated. (required)
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country for which you want to create a sales tax table entry.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the tax jurisdiction for the table entry you want to create.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceSalesTaxWithHttpInfo(
        SalesTaxBase $body,
        CountryCodeEnum $countryCode,
        string $jurisdictionId
    ): array {
        $request = $this->createOrReplaceSalesTaxRequest($body, $countryCode, $jurisdictionId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'createOrReplaceSalesTax'
     *
     * @param  SalesTaxBase  $body  A container that describes the how the sales tax is calculated. (required)
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country for which you want to create a sales tax table entry.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the tax jurisdiction for the table entry you want to create.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return Request
     */
    protected function createOrReplaceSalesTaxRequest(
        SalesTaxBase $body,
        CountryCodeEnum $countryCode,
        string $jurisdictionId
    ): Request {
        $resourcePath = '/sales_tax/{countryCode}/{jurisdictionId}';

        $resourcePath = str_replace(
            [
                '{' . 'countryCode' . '}',
                '{' . 'jurisdictionId' . '}'
            ],
            [
                Serializer::toPathValue($countryCode->value),
                Serializer::toPathValue($jurisdictionId)
            ],
            $resourcePath
        );

        return $this->ebayRequest->putRequest($body, $resourcePath);
    }

    /**
     * Operation deleteSalesTax
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table entry you want to delete.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction whose table entry you want to delete.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function deleteSalesTax(CountryCodeEnum $countryCode, string $jurisdictionId): void
    {
        $this->deleteSalesTaxWithHttpInfo($countryCode, $jurisdictionId);
    }

    /**
     * Operation deleteSalesTaxWithHttpInfo
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table entry you want to delete.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction whose table entry you want to delete.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function deleteSalesTaxWithHttpInfo(CountryCodeEnum $countryCode, string $jurisdictionId): array
    {
        $request = $this->deleteSalesTaxRequest($countryCode, $jurisdictionId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteSalesTax'
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table entry you want to delete.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction whose table entry you want to delete.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return Request
     */
    protected function deleteSalesTaxRequest(CountryCodeEnum $countryCode, string $jurisdictionId): Request
    {
        $resourcePath = '/sales_tax/{countryCode}/{jurisdictionId}';

        $resourcePath = str_replace(
            [
                '{' . 'countryCode' . '}',
                '{' . 'jurisdictionId' . '}'
            ],
            [
                Serializer::toPathValue($countryCode->value),
                Serializer::toPathValue($jurisdictionId)
            ],
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getSalesTax
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table you want to retrieve.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction for the tax table entry you want to retrieve.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return SalesTax
     * @throws ApiException on non-2xx response
     */
    public function getSalesTax(CountryCodeEnum $countryCode, string $jurisdictionId): SalesTax
    {
        $response = $this->getSalesTaxWithHttpInfo($countryCode, $jurisdictionId);

        return $response['data'];
    }

    /**
     * Operation getSalesTaxWithHttpInfo
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table you want to retrieve.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction for the tax table entry you want to retrieve.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return array of SalesTax, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     */
    public function getSalesTaxWithHttpInfo(CountryCodeEnum $countryCode, string $jurisdictionId): array
    {
        $returnType = SalesTax::class;
        $request = $this->getSalesTaxRequest($countryCode, $jurisdictionId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getSalesTax'
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose sales tax table you want to retrieve.
     * @param  string  $jurisdictionId
     *  This path parameter specifies the ID of the sales tax jurisdiction for the tax table entry you want to retrieve.
     *  Retrieve valid jurisdiction IDs using &lt;b&gt;getSalesTaxJurisdictions&lt;/b&gt; in the Metadata API.
     *
     * @return Request
     */
    protected function getSalesTaxRequest(CountryCodeEnum $countryCode, string $jurisdictionId): Request
    {
        $resourcePath = '/sales_tax/{countryCode}/{jurisdictionId}';

        $resourcePath = str_replace(
            [
                '{' . 'countryCode' . '}',
                '{' . 'jurisdictionId' . '}'
            ],
            [
                Serializer::toPathValue($countryCode->value),
                Serializer::toPathValue($jurisdictionId)
            ],
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getSalesTaxes
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose tax table you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return SalesTaxes
     * @throws ApiException on non-2xx response
     */
    public function getSalesTaxes(CountryCodeEnum $countryCode): SalesTaxes
    {
        $response = $this->getSalesTaxesWithHttpInfo($countryCode);

        return $response['data'];
    }

    /**
     * Operation getSalesTaxesWithHttpInfo
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose tax table you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return array of SalesTaxes, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     */
    public function getSalesTaxesWithHttpInfo(CountryCodeEnum $countryCode): array
    {
        $returnType = SalesTaxes::class;
        $request = $this->getSalesTaxesRequest($countryCode);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getSalesTaxes'
     *
     * @param  CountryCodeEnum  $countryCode
     *  This path parameter specifies the two-letter &lt;a href&#x3D;\&quot;
     *  https://www.iso.org/iso-3166-country-codes.html\&quot; title&#x3D;\&quot;
     *  https://www.iso.org\&quot; target&#x3D;\&quot;_blank\&quot;&gt;ISO 3166&lt;/a&gt;
     *  code for the country whose tax table you want to retrieve.
     *  For implementation help, refer to eBay API documentation at
     *  https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @return Request
     */
    protected function getSalesTaxesRequest(CountryCodeEnum $countryCode): Request
    {
        $resourcePath = '/sales_tax';

        $queryParams['country_code'] = Serializer::toQueryValue($countryCode->value);

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }
}
