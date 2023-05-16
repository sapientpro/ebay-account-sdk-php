<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\PaymentsProgramApi;
use SapientPro\EbayAccountSDK\Models\PaymentsProgramResponse;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramStatus;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentsProgramApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetPaymentsProgram(): void
    {
        $mockResponseBody = <<<JSON
{
    "marketplaceId": "EBAY_US",
    "paymentsProgramType": "EBAY_PAYMENTS",
    "status": "OPTED_IN",
    "wasPreviouslyOptedIn": false
}
JSON;

        $expectedResponse = PaymentsProgramResponse::fromArray([
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'paymentsProgramType' => PaymentsProgramType::EBAY_PAYMENTS,
            'status' => PaymentsProgramStatus::OPTED_IN,
            'wasPreviouslyOptedIn' => false,
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(PaymentsProgramApi::class, $client);

        $result = $api->getPaymentsProgram(
            MarketplaceIdEnum::EBAY_US
        );

        $this->assertEquals($expectedResponse, $result);
    }
}
