<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\SubscriptionApi;
use SapientPro\EbayAccountSDK\Models\Subscription;
use SapientPro\EbayAccountSDK\Models\SubscriptionResponse;
use SapientPro\EbayAccountSDK\Models\TimeDuration;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\SubscriptionTypeEnum;
use SapientPro\EbayAccountSDK\Enums\TimeDurationUnitEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

class SubscriptionApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetSubscription(): void
    {
        $mockResponseBody = <<<JSON
{
    "total": 1,
    "subscriptions": [
        {
            "marketplaceId": "EBAY_US",
            "subscriptionId": "4********1",
            "subscriptionLevel": "Featured",
            "subscriptionType": "STORE_PLAN",
            "term": {
                "value": 12,
                "unit": "MONTH"
            }
        }
    ]
}
JSON;

        $expectedResponse = SubscriptionResponse::fromArray([
            'total' => 1,
            'subscriptions' => [
                Subscription::fromArray([
                    'marketplaceId' => MarketplaceIdEnum::EBAY_US,
                    'subscriptionId' => '4********1',
                    'subscriptionLevel' => 'Featured',
                    'subscriptionType' => SubscriptionTypeEnum::STORE_PLAN,
                    'term' => TimeDuration::fromArray([
                        'value' => 12,
                        'unit' => TimeDurationUnitEnum::MONTH,
                    ]),
                ]),
            ],
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(SubscriptionApi::class, $client);

        $response = $api->getSubscription();

        $this->assertEquals($expectedResponse, $response);
    }
}
