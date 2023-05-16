<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\RateTableApi;
use SapientPro\EbayAccountSDK\Models\RateTable;
use SapientPro\EbayAccountSDK\Models\RateTableResponse;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use SapientPro\EbayAccountSDK\Enums\ShippingOptionTypeEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RateTableApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetRateTables()
    {
        $mockResponseBody = <<<JSON
{
    "rateTables": [
        {
            "countryCode": "US",
            "rateTableId": "1********7",
            "name": "S********s",
            "locality": "DOMESTIC"
        },
        {
            "countryCode": "US",
            "rateTableId": "1********8",
            "name": "T********s",
            "locality": "DOMESTIC"
        },
        {
            "countryCode": "US",
            "rateTableId": "1********9",
            "name": "P********s",
            "locality": "DOMESTIC"
        },
        {
            "countryCode": "US",
            "rateTableId": "1********0",
            "name": "B********s",
            "locality": "INTERNATIONAL"
        },
        {
            "countryCode": "US",
            "rateTableId": "1********1",
            "name": "G********s",
            "locality": "INTERNATIONAL"
        }
    ]
}
JSON;

        $expectedResponse = RateTableResponse::fromArray([
            'rateTables' => [
                RateTable::fromArray([
                    'countryCode' => CountryCodeEnum::US,
                    'rateTableId' => '1********7',
                    'name' => 'S********s',
                    'locality' => ShippingOptionTypeEnum::DOMESTIC
                ]),
                RateTable::fromArray([
                    'countryCode' => CountryCodeEnum::US,
                    'rateTableId' => '1********8',
                    'name' => 'T********s',
                    'locality' => ShippingOptionTypeEnum::DOMESTIC
                ]),
                RateTable::fromArray([
                    'countryCode' => CountryCodeEnum::US,
                    'rateTableId' => '1********9',
                    'name' => 'P********s',
                    'locality' => ShippingOptionTypeEnum::DOMESTIC
                ]),
                RateTable::fromArray([
                    'countryCode' => CountryCodeEnum::US,
                    'rateTableId' => '1********0',
                    'name' => 'B********s',
                    'locality' => ShippingOptionTypeEnum::INTERNATIONAL
                ]),
                RateTable::fromArray([
                    'countryCode' => CountryCodeEnum::US,
                    'rateTableId' => '1********1',
                    'name' => 'G********s',
                    'locality' => ShippingOptionTypeEnum::INTERNATIONAL
                ]),
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(RateTableApi::class, $client);

        $result = $api->getRateTables();

        $this->assertEquals($expectedResponse, $result);
    }
}
