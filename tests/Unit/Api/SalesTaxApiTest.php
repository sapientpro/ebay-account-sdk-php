<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\SalesTaxApi;
use SapientPro\EbayAccountSDK\Models\SalesTax;
use SapientPro\EbayAccountSDK\Models\SalesTaxBase;
use SapientPro\EbayAccountSDK\Models\SalesTaxes;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SalesTaxApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateOrReplaceSalesTax(): void
    {
        $requestBody = SalesTaxBase::fromArray([
            'salesTaxPercentage' => '7.75',
            'shippingAndHandlingTaxed' => true,
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(SalesTaxApi::class, $client);

        $result = $api->createOrReplaceSalesTaxWithHttpInfo(
            $requestBody,
            CountryCodeEnum::US,
            'NY'
        );

        $this->assertEquals(204, $result['code']);
    }

    public function testDeleteSalesTax(): void
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(SalesTaxApi::class, $client);

        $result = $api->deleteSalesTaxWithHttpInfo(CountryCodeEnum::US, 'NY');

        $this->assertSame(['code' => 204], $result);
    }

    public function testGetSalesTax()
    {
        $mockResponseBody = <<<JSON
{
    "salesTaxPercentage": "4.0",
    "shippingAndHandlingTaxed": true,
    "countryCode": "US",
    "salesTaxJurisdictionId": "NY"
}
JSON;

        $expectedResponse = SalesTax::fromArray([
            'salesTaxPercentage' => '4.0',
            'shippingAndHandlingTaxed' => true,
            'countryCode' => CountryCodeEnum::US,
            'salesTaxJurisdictionId' => 'NY',
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);

        $api = $this->createApi(SalesTaxApi::class, $client);

        $result = $api->getSalesTax(CountryCodeEnum::US, 'NY');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testGetSalesTaxes()
    {
        $mockResponseBody = <<<JSON
{
    "salesTaxes": [
        {
            "salesTaxPercentage": "3.75",
            "shippingAndHandlingTaxed": false,
            "countryCode": "US",
            "salesTaxJurisdictionId": "IL"
        },
        {
            "salesTaxPercentage": "4.0",
            "shippingAndHandlingTaxed": true,
            "countryCode": "US",
            "salesTaxJurisdictionId": "NY"
        }
    ]
}
JSON;

        $expectedResponse = SalesTaxes::fromArray([
            'salesTaxes' => [
                SalesTax::fromArray([
                    'salesTaxPercentage' => '3.75',
                    'shippingAndHandlingTaxed' => false,
                    'countryCode' => CountryCodeEnum::US,
                    'salesTaxJurisdictionId' => 'IL',
                ]),
                SalesTax::fromArray([
                    'salesTaxPercentage' => '4.0',
                    'shippingAndHandlingTaxed' => true,
                    'countryCode' => CountryCodeEnum::US,
                    'salesTaxJurisdictionId' => 'NY',
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);

        $api = $this->createApi(SalesTaxApi::class, $client);

        $result = $api->getSalesTaxes(CountryCodeEnum::US);

        $this->assertEquals($expectedResponse, $result);
    }
}
