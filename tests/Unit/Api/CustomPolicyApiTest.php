<?php

namespace SapientPro\EbayAccountSDK\Tests;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\CustomPolicyApi;
use SapientPro\EbayAccountSDK\Enums\CustomPolicyTypeEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Models\CompactCustomPolicyResponse;
use SapientPro\EbayAccountSDK\Models\CustomPolicy;
use SapientPro\EbayAccountSDK\Models\CustomPolicyCreateRequest;
use SapientPro\EbayAccountSDK\Models\CustomPolicyRequest;
use SapientPro\EbayAccountSDK\Models\CustomPolicyResponse;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * CustomPolicyApiTest
 *
 * @category Class
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CustomPolicyApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateCustomPolicy()
    {
        $client = $this->prepareClientMock(201, responseHeaders: [
            'Location' => 'ebay.com/path_to_created_policy'
        ]);

        $api = $this->createApi(CustomPolicyApi::class, $client);

        /** @var CustomPolicyCreateRequest $body */
        $body = CustomPolicyCreateRequest::fromArray([
            "description" => "Take Back POlict",
            "label" => "policy_label",
            "name" => "policy_name",
            "policyType" => "TAKE_BACK"
        ]);

        $expectedResult = [
            'code' => 201,
            'headers' => [
                'Location' => ['ebay.com/path_to_created_policy']
            ]
        ];

        $result = $api->createCustomPolicyWithHttpInfo($body, MarketplaceIdEnum::EBAY_CA);

        $this->assertSame($expectedResult, $result);
    }

    public function testGetCustomPolicies()
    {
        $mockBody = '
        {
            "customPolicies": [
                {
                    "customPolicyId": "2********7",
                    "label": "Product Compliance Policy",
                    "name": "Product_Compliance_Policy_01",
                    "policyType": "PRODUCT_COMPLIANCE"
                },
                {
                    "customPolicyId": "2********4",
                    "label": "Take-back Policy",
                    "name": "Take_Back_Policy_01",
                    "policyType": "TAKE_BACK"
                }
            ]
        }';

        $expectedResponse = CustomPolicyResponse::fromArray([
            'customPolicies' => [
                CompactCustomPolicyResponse::fromArray([
                    'customPolicyId' => "2********7",
                    'label' => 'Product Compliance Policy',
                    'name' => 'Product_Compliance_Policy_01',
                    'policyType' => CustomPolicyTypeEnum::PRODUCT_COMPLIANCE
                ]),
                CompactCustomPolicyResponse::fromArray([
                    'customPolicyId' => "2********4",
                    'label' => 'Take-back Policy',
                    'name' => 'Take_Back_Policy_01',
                    'policyType' => CustomPolicyTypeEnum::TAKE_BACK
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockBody);

        $api = $this->createApi(CustomPolicyApi::class, $client);

        $result = $api->getCustomPolicies(MarketplaceIdEnum::EBAY_CA);

        $this->assertTrue($expectedResponse == $result);
    }

    public function testGetCustomPolicy(): void
    {
        $mockBody = '
        {
            "customPolicyId": "id24",
            "description": "Description",
            "label": "Take-back Policy",
            "name": "Take_Back_Policy_01",
            "policyType": "TAKE_BACK"
        }';

        $expectedResponse = CustomPolicy::fromArray([
            'customPolicyId' => "id24",
            'description' => "Description",
            'label' => 'Take-back Policy',
            'name' => 'Take_Back_Policy_01',
            'policyType' => CustomPolicyTypeEnum::TAKE_BACK
        ]);

        $client = $this->prepareClientMock(200, $mockBody);

        $api = $this->createApi(CustomPolicyApi::class, $client);

        $result = $api->getCustomPolicy('id24', MarketplaceIdEnum::EBAY_CA);

        $this->assertTrue($expectedResponse == $result);
    }

    public function testUpdateCustomPolicy()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(CustomPolicyApi::class, $client);

        /** @var CustomPolicyRequest $body */
        $body = CustomPolicyRequest::fromArray([
            "description" => "Take Back POlict",
            "label" => "policy_label",
            "name" => "policy_name",
        ]);

        $expectedResult = [
            'code' => 204
        ];

        $result = $api->updateCustomPolicyWithHttpInfo(
            $body,
            MarketplaceIdEnum::EBAY_CA,
            'custom_id'
        );

        $this->assertSame($expectedResult, $result);
    }
}
