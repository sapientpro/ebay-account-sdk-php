<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;
use SapientPro\EbayAccountSDK\Models\CategoryType;
use SapientPro\EbayAccountSDK\Models\InternationalReturnOverrideType;
use SapientPro\EbayAccountSDK\Models\ReturnPolicy;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyResponse;
use SapientPro\EbayAccountSDK\Models\SetReturnPolicyResponse;
use SapientPro\EbayAccountSDK\Models\TimeDuration;
use SapientPro\EbayAccountSDK\Enums\CategoryTypeEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\RefundMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnShippingCostPayerEnum;
use SapientPro\EbayAccountSDK\Enums\TimeDurationUnitEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ReturnPolicyApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateReturnPolicy(): void
    {
        $mockResponse = <<<JSON
{
    "name": "m********e",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": true
        }
    ],
    "returnsAccepted": true,
    "returnPeriod": {
        "value": 30,
        "unit": "DAY"
    },
    "refundMethod": "MONEY_BACK",
    "returnShippingCostPayer": "SELLER",
    "returnPolicyId": "5********0",
    "warnings": []
}
JSON;

        $expectedResponse = SetReturnPolicyResponse::fromArray([
            "name" => "m********e",
            "marketplaceId" => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            "returnsAccepted" => true,
            "returnPeriod" => TimeDuration::fromArray([
                "value" => 30,
                "unit" => TimeDurationUnitEnum::DAY
            ]),
            "refundMethod" => RefundMethodEnum::MONEY_BACK,
            "returnShippingCostPayer" => ReturnShippingCostPayerEnum::SELLER,
            "returnPolicyId" => "5********0",
            "warnings" => []
        ]);

        $body = ReturnPolicyRequest::fromArray([
            'name' => 'm********e',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'refundMethod' => RefundMethodEnum::MONEY_BACK,
            'returnsAccepted' => true,
            'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
            'returnPeriod' => TimeDuration::fromArray([
                'value' => 30,
                'unit' => TimeDurationUnitEnum::DAY
            ])
        ]);


        $client = $this->prepareClientMock(201, $mockResponse, [
            'Location' => 'path_to_policy/5********0'
        ]);

        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->createReturnPolicy($body);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testDeleteReturnPolicy(): void
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->deleteReturnPolicyWithHttpInfo('id23');

        $this->assertSame(['code' => 204], $result);
    }

    public function testGetReturnPolicies(): void
    {
        $mockResponse = <<<JSON
{
    "total": 3,
    "returnPolicies": [
        {
            "name": "3********y",
            "description": "Policy specifies an international return policy in addition to the domestic return policy.",
            "marketplaceId": "EBAY_US",
            "categoryTypes": [
                {
                    "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
                    "default": true
                }
            ],
            "returnsAccepted": true,
            "returnPeriod": {
                "value": 30,
                "unit": "DAY"
            },
            "refundMethod": "MONEY_BACK",
            "returnMethod": "REPLACEMENT",
            "returnShippingCostPayer": "SELLER",
            "internationalOverride": {
                "returnsAccepted": true,
                "returnPeriod": {
                    "value": 60,
                    "unit": "DAY"
                },
                "returnShippingCostPayer": "BUYER"
            },
            "returnPolicyId": "5********0"
        },
        {
            "name": "n********y",
            "marketplaceId": "EBAY_US",
            "categoryTypes": [
                {
                    "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
                    "default": false
                }
            ],
            "returnsAccepted": false,
            "returnPolicyId": "5********0"
        }
    ]
}
JSON;

        $expectedResponse = ReturnPolicyResponse::fromArray([
            'total' => 3,
            'returnPolicies' => [
                ReturnPolicy::fromArray([
                    'name' => '3********y',
                    'description' => 'Policy specifies an international return policy in addition to the domestic return policy.',
                    'marketplaceId' => MarketplaceIdEnum::EBAY_US,
                    'categoryTypes' => [
                        CategoryType::fromArray([
                            'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                            'default' => true
                        ])
                    ],
                    'returnsAccepted' => true,
                    'returnPeriod' => TimeDuration::fromArray([
                        'value' => 30,
                        'unit' => TimeDurationUnitEnum::DAY
                    ]),
                    'refundMethod' => RefundMethodEnum::MONEY_BACK,
                    'returnMethod' => ReturnMethodEnum::REPLACEMENT,
                    'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
                    'internationalOverride' => InternationalReturnOverrideType::fromArray([
                        'returnsAccepted' => true,
                        'returnPeriod' => TimeDuration::fromArray([
                            'value' => 60,
                            'unit' => TimeDurationUnitEnum::DAY
                        ]),
                        'returnShippingCostPayer' => ReturnShippingCostPayerEnum::BUYER
                    ]),
                    'returnPolicyId' => '5********0'
                ]),
                ReturnPolicy::fromArray([
                    'name' => 'n********y',
                    'marketplaceId' => MarketplaceIdEnum::EBAY_US,
                    'categoryTypes' => [
                        CategoryType::fromArray([
                            'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                            'default' => false
                        ])
                    ],
                    'returnsAccepted' => false,
                    'returnPolicyId' => '5********0'
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->getReturnPolicies(MarketplaceIdEnum::EBAY_US);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testGetReturnPolicy(): void
    {
        $mockResponse = <<<JSON
{
    "name": "3********y",
    "description": "Policy specifies an international return policy in addition to the domestic return policy.",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": true
        }
    ],
    "returnsAccepted": true,
    "returnPeriod": {
        "value": 30,
        "unit": "DAY"
    },
    "refundMethod": "MONEY_BACK",
    "returnMethod": "REPLACEMENT",
    "returnShippingCostPayer": "SELLER",
    "internationalOverride": {
        "returnsAccepted": true,
        "returnPeriod": {
            "value": 60,
            "unit": "DAY"
        },
        "returnShippingCostPayer": "BUYER"
    },
    "returnPolicyId": "5********0"
}
JSON;

        $expectedResponse = ReturnPolicy::fromArray([
            'name' => '3********y',
            'description' => 'Policy specifies an international return policy in addition to the domestic return policy.',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'returnsAccepted' => true,
            'returnPeriod' => TimeDuration::fromArray([
                'value' => 30,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'refundMethod' => RefundMethodEnum::MONEY_BACK,
            'returnMethod' => ReturnMethodEnum::REPLACEMENT,
            'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
            'internationalOverride' => InternationalReturnOverrideType::fromArray([
                'returnsAccepted' => true,
                'returnPeriod' => TimeDuration::fromArray([
                    'value' => 60,
                    'unit' => TimeDurationUnitEnum::DAY
                ]),
                'returnShippingCostPayer' => ReturnShippingCostPayerEnum::BUYER
            ]),
            'returnPolicyId' => '5********0'
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->getReturnPolicy('5********0');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testGetReturnPolicyByName(): void
    {
        $mockResponse = <<<JSON
{
    "name": "m********e",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": false
        }
    ],
    "returnsAccepted": true,
    "returnPeriod": {
        "value": 30,
        "unit": "DAY"
    },
    "refundMethod": "MONEY_BACK",
    "returnShippingCostPayer": "SELLER",
    "returnPolicyId": "5********0"
}
JSON;

        $expectedResponse = ReturnPolicy::fromArray([
            'name' => 'm********e',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => false
                ])
            ],
            'returnsAccepted' => true,
            'returnPeriod' => TimeDuration::fromArray([
                'value' => 30,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'refundMethod' => RefundMethodEnum::MONEY_BACK,
            'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
            'returnPolicyId' => '5********0'
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->getReturnPolicyByName(MarketplaceIdEnum::EBAY_US, 'm********e');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testUpdateReturnPolicy()
    {
        $body = ReturnPolicyRequest::fromArray([
            'name' => '3********y',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'description' => 'Policy specifies an international return policy in addition to the domestic return policy.',
            'refundMethod' => RefundMethodEnum::MONEY_BACK,
            'returnsAccepted' => true,
            'returnMethod' => ReturnMethodEnum::REPLACEMENT,
            'returnPeriod' => TimeDuration::fromArray([
                'value' => 30,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
            'internationalOverride' => InternationalReturnOverrideType::fromArray([
                'returnsAccepted' => true,
                'returnPeriod' => TimeDuration::fromArray([
                    'value' => 60,
                    'unit' => TimeDurationUnitEnum::DAY
                ]),
                'returnShippingCostPayer' => ReturnShippingCostPayerEnum::BUYER
            ])
        ]);

        $mockResponse = <<<JSON
{
    "name": "3********y",
    "description": "Policy specifies an international return policy in addition to the domestic return policy.",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": true
        }
    ],
    "returnsAccepted": true,
    "returnPeriod": {
        "value": 30,
        "unit": "DAY"
    },
    "refundMethod": "MONEY_BACK",
    "returnMethod": "REPLACEMENT",
    "returnShippingCostPayer": "SELLER",
    "internationalOverride": {
        "returnsAccepted": true,
        "returnPeriod": {
            "value": 60,
            "unit": "DAY"
        },
        "returnShippingCostPayer": "BUYER"
    },
    "returnPolicyId": "5********0",
    "warnings": []
}
JSON;

        $expectedResponse = SetReturnPolicyResponse::fromArray([
            'name' => '3********y',
            'description' => 'Policy specifies an international return policy in addition to the domestic return policy.',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'returnsAccepted' => true,
            'returnPeriod' => TimeDuration::fromArray([
                'value' => 30,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'refundMethod' => RefundMethodEnum::MONEY_BACK,
            'returnMethod' => ReturnMethodEnum::REPLACEMENT,
            'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
            'internationalOverride' => InternationalReturnOverrideType::fromArray([
                'returnsAccepted' => true,
                'returnPeriod' => TimeDuration::fromArray([
                    'value' => 60,
                    'unit' => TimeDurationUnitEnum::DAY
                ]),
                'returnShippingCostPayer' => ReturnShippingCostPayerEnum::BUYER
            ]),
            'returnPolicyId' => '5********0',
            'warnings' => []
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(ReturnPolicyApi::class, $client);

        $result = $api->updateReturnPolicy($body, '5********0');

        $this->assertEquals($expectedResponse, $result);
    }
}
