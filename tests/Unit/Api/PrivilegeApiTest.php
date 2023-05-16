<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\PrivilegeApi;
use SapientPro\EbayAccountSDK\Models\Amount;
use SapientPro\EbayAccountSDK\Models\SellingLimit;
use SapientPro\EbayAccountSDK\Models\SellingPrivileges;
use SapientPro\EbayAccountSDK\Enums\CurrencyCodeEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * PrivilegeApiTest Class Doc Comment
 *
 * @category Class
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PrivilegeApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetPrivileges(): void
    {
        $mockResponseBody = <<<JSON
{
    "sellingLimit": {
        "amount": {
            "value": "100.0",
            "currency": "USD"
        },
        "quantity": 10
    },
    "sellerRegistrationCompleted": true
}
JSON;

        $expectedResponse = SellingPrivileges::fromArray([
            'sellingLimit' => SellingLimit::fromArray([
                'amount' => Amount::fromArray([
                    'value' => '100.0',
                    'currency' => CurrencyCodeEnum::USD
                ]),
                'quantity' => 10,
            ]),
            'sellerRegistrationCompleted' => true,
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(PrivilegeApi::class, $client);

        $result = $api->getPrivileges();

        $this->assertEquals($expectedResponse, $result);
    }
}
