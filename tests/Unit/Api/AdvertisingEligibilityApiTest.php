<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\AdvertisingEligibilityApi;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Models\SellerEligibilityMultiProgramResponse;
use SapientPro\EbayAccountSDK\Models\SellerEligibilityResponse;
use SapientPro\EbayAccountSDK\Enums\AdvertisingProgramEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\SellerEligibilityEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

class AdvertisingEligibilityApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetAdvertisingEligibility()
    {
        $mockResponseBody = <<<JSON
{
    "advertisingEligibility": [
        {
            "programType": "PROMOTED_LISTINGS_STANDARD",
            "status": "ELIGIBLE"
        },
        {
            "programType": "PROMOTED_LISTINGS_ADVANCED",
            "status": "ELIGIBLE"
        }
    ]
}
JSON;

        $expectedResponse = SellerEligibilityMultiProgramResponse::fromArray([
            'advertisingEligibility' => [
                SellerEligibilityResponse::fromArray([
                        'programType' => AdvertisingProgramEnum::PROMOTED_LISTINGS_STANDARD,
                        'status' => SellerEligibilityEnum::ELIGIBLE,
                ]),
                SellerEligibilityResponse::fromArray([
                    'programType' => AdvertisingProgramEnum::PROMOTED_LISTINGS_ADVANCED,
                    'status' => SellerEligibilityEnum::ELIGIBLE,
                ])
            ],
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(AdvertisingEligibilityApi::class, $client);

        $response = $api->getAdvertisingEligibility(MarketplaceIdEnum::EBAY_US);

        $this->assertEquals($expectedResponse, $response);
    }
}
