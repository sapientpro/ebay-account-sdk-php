<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\OnboardingApi;
use SapientPro\EbayAccountSDK\Models\PaymentsProgramOnboardingResponse;
use SapientPro\EbayAccountSDK\Models\PaymentsProgramOnboardingSteps;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramOnboardingStatus;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramOnboardingStepStatus;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * OnboardingApiTest Class Doc Comment
 *
 * @category Class
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OnboardingApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetPaymentsProgramOnboarding(): void
    {
        $mockResponseBody = <<<JSON
{
    "onboardingStatus": "ELIGIBLE_TO_ONBOARD",
    "steps": [
        {
            "name": "1. businessType",
            "status": "COMPLETED"
        },
        {
            "name": "2. accountInfo",
            "status": "IN_PROGRESS",
            "webUrl": "https://ebaypayonboardingweb.uk.vip.qa.ebay.com/validate-user"
        },
        {
            "name": "3. payoutInfo",
            "status": "NOT_STARTED"
        },
        {
            "name": "4. review",
            "status": "NOT_STARTED"
        }
    ]
}
JSON;

        $expectedResponse = PaymentsProgramOnboardingResponse::fromArray([
            'onboardingStatus' => PaymentsProgramOnboardingStatus::ELIGIBLE_TO_ONBOARD,
            'steps' => [
                PaymentsProgramOnboardingSteps::fromArray([
                    'name' => '1. businessType',
                    'status' => PaymentsProgramOnboardingStepStatus::COMPLETED,
                ]),
                PaymentsProgramOnboardingSteps::fromArray([
                    'name' => '2. accountInfo',
                    'status' => PaymentsProgramOnboardingStepStatus::IN_PROGRESS,
                    'webUrl' => 'https://ebaypayonboardingweb.uk.vip.qa.ebay.com/validate-user'
                ]),
                PaymentsProgramOnboardingSteps::fromArray([
                    'name' => '3. payoutInfo',
                    'status' => PaymentsProgramOnboardingStepStatus::NOT_STARTED
                ]),
                PaymentsProgramOnboardingSteps::fromArray([
                    'name' => '4. review',
                    'status' => PaymentsProgramOnboardingStepStatus::NOT_STARTED
                ]),
            ],
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OnboardingApi::class, $client);

        $result = $api->getPaymentsProgramOnboarding(MarketplaceIdEnum::EBAY_US);

        $this->assertEquals($expectedResponse, $result);
    }
}
