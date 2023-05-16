<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\FulfillmentPolicyApi;
use SapientPro\EbayAccountSDK\Models\Amount;
use SapientPro\EbayAccountSDK\Models\EbayModelInterface;
use SapientPro\EbayAccountSDK\Enums\CategoryTypeEnum;
use SapientPro\EbayAccountSDK\Enums\CurrencyCodeEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\ShippingCostTypeEnum;
use SapientPro\EbayAccountSDK\Enums\ShippingOptionTypeEnum;
use SapientPro\EbayAccountSDK\Enums\TimeDurationUnitEnum;
use SapientPro\EbayAccountSDK\Models\CategoryType;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicy;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicyRequest;
use SapientPro\EbayAccountSDK\Models\FulfillmentPolicyResponse;
use SapientPro\EbayAccountSDK\Models\SetFulfillmentPolicyResponse;
use SapientPro\EbayAccountSDK\Models\ShippingOption;
use SapientPro\EbayAccountSDK\Models\ShippingService;
use SapientPro\EbayAccountSDK\Models\TimeDuration;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FulfillmentPolicyApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateFulfillmentPolicy(): void
    {
        $mockResponseBody = <<<JSON
        {
          "categoryTypes": [
            {
              "name": "MOTORS_VEHICLES"
            }
          ],
          "freightShipping": false,
          "fulfillmentPolicyId": "id24",
          "globalShipping": false,
          "localPickup": false,
          "marketplaceId": "EBAY_US",
          "name": "testName",
          "pickupDropOff": false,
          "warnings": []
        }
JSON;

        $client = $this->prepareClientMock(201, responseBody: $mockResponseBody, responseHeaders: [
            'Location' => 'ebay.com/path_to_created_policy'
        ]);

        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $body = FulfillmentPolicyRequest::fromArray([
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES
                ])
            ],
            'name' => 'testName',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US
        ]);

        $expectedResponse = SetFulfillmentPolicyResponse::fromArray([
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES
                ])
            ],
            'name' => 'testName',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'fulfillmentPolicyId' => 'id24',
            'warnings' => []
        ]);

        $result = $api->createFulfillmentPolicy($body);

        $this->assertTrue($expectedResponse == $result);
    }

    public function testDeleteFulfillmentPolicy(): void
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $result = $api->deleteFulfillmentPolicyWithHttpInfo('id23');

        $this->assertSame(['code' => 204], $result);
    }

    public function testGetFulfillmentPolicies(): void
    {
        $fulfillmentPolicyId = '5********0';

        $mockResponse = <<<JSON
        {
            "total": 1,
            "fulfillmentPolicies": [
            {
                "name": "D********g",
                "marketplaceId": "EBAY_US",
                "categoryTypes": [
                    {
                        "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
                        "default": false
                    }
                ],
                "handlingTime": {
                    "value": 1,
                    "unit": "DAY"
                },
                "shippingOptions": [
                    {
                        "optionType": "DOMESTIC",
                        "costType": "FLAT_RATE",
                        "shippingServices": [
                            {
                                "sortOrder": 1,
                                "shippingCarrierCode": "USPS",
                                "shippingServiceCode": "USPSPriorityFlatRateBox",
                                "shippingCost": {
                                    "value": "0.0",
                                    "currency": "USD"
                                },
                                "additionalShippingCost": {
                                    "value": "0.0",
                                    "currency": "USD"
                                },
                                "freeShipping": true,
                                "buyerResponsibleForShipping": false,
                                "buyerResponsibleForPickup": false
                            }
                        ],
                        "insuranceFee": {
                            "value": "0.0",
                            "currency": "USD"
                        }
                    }
                ],
                "globalShipping": false,
                "pickupDropOff": false,
                "freightShipping": false,
                "fulfillmentPolicyId": "5********0"
            }]
        }
JSON;

        $expectedResponse = FulfillmentPolicyResponse::fromArray(
            [
                'total' => 1,
                'fulfillmentPolicies' => [
                    FulfillmentPolicy::fromArray([
                        'name' => 'D********g',
                        'marketplaceId' => MarketplaceIdEnum::EBAY_US,
                        'categoryTypes' => [
                            CategoryType::fromArray([
                                'default' => false,
                                'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES
                            ])
                        ],
                        'fulfillmentPolicyId' => $fulfillmentPolicyId,
                        'handlingTime' => TimeDuration::fromArray([
                            'unit' => TimeDurationUnitEnum::DAY,
                            'value' => 1
                        ]),
                        'shippingOptions' => [
                            ShippingOption::fromArray([
                                'costType' => ShippingCostTypeEnum::FLAT_RATE,
                                'insuranceFee' => $this->createDefaultAmount(),
                                'optionType' => ShippingOptionTypeEnum::DOMESTIC,
                                'shippingServices' => [
                                    ShippingService::fromArray([
                                        'additionalShippingCost' => $this->createDefaultAmount(),
                                        'freeShipping' => true,
                                        'shippingCarrierCode' => 'USPS',
                                        'shippingCost' => $this->createDefaultAmount(),
                                        'shippingServiceCode' => 'USPSPriorityFlatRateBox',
                                        'sortOrder' => 1
                                    ])
                                ]
                            ])
                        ]
                    ])
                ]
                ]
        );

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $result = $api->getFulfillmentPolicies(MarketplaceIdEnum::EBAY_US);

        $this->assertTrue($expectedResponse == $result);
    }


    public function testGetFulfillmentPolicy(): void
    {
        $fulfillmentPolicyId = '5********0';
        $mockResponse = <<<JSON
        {
            "name": "D********g",
            "marketplaceId": "EBAY_US",
            "categoryTypes": [
                {
                    "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
                    "default": false
                }
            ],
            "handlingTime": {
                "value": 1,
                "unit": "DAY"
            },
            "shippingOptions": [
                {
                    "optionType": "DOMESTIC",
                    "costType": "FLAT_RATE",
                    "shippingServices": [
                        {
                            "sortOrder": 1,
                            "shippingCarrierCode": "USPS",
                            "shippingServiceCode": "USPSPriorityFlatRateBox",
                            "shippingCost": {
                                "value": "0.0",
                                "currency": "USD"
                            },
                            "additionalShippingCost": {
                                "value": "0.0",
                                "currency": "USD"
                            },
                            "freeShipping": true,
                            "buyerResponsibleForShipping": false,
                            "buyerResponsibleForPickup": false
                        }
                    ],
                    "insuranceFee": {
                        "value": "0.0",
                        "currency": "USD"
                    }
                }
            ],
            "globalShipping": false,
            "pickupDropOff": false,
            "freightShipping": false,
            "fulfillmentPolicyId": "5********0"
        }
JSON;

        $expectedResponse = FulfillmentPolicy::fromArray([
            'name' => 'D********g',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'default' => false,
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES
                ])
            ],
            'fulfillmentPolicyId' => $fulfillmentPolicyId,
            'handlingTime' => TimeDuration::fromArray([
                'unit' => TimeDurationUnitEnum::DAY,
                'value' => 1
            ]),
            'shippingOptions' => [
                ShippingOption::fromArray([
                    'costType' => ShippingCostTypeEnum::FLAT_RATE,
                    'insuranceFee' => $this->createDefaultAmount(),
                    'optionType' => ShippingOptionTypeEnum::DOMESTIC,
                    'shippingServices' => [
                        ShippingService::fromArray([
                            'additionalShippingCost' => $this->createDefaultAmount(),
                            'freeShipping' => true,
                            'shippingCarrierCode' => 'USPS',
                            'shippingCost' => $this->createDefaultAmount(),
                            'shippingServiceCode' => 'USPSPriorityFlatRateBox',
                            'sortOrder' => 1
                        ])
                    ]
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $result = $api->getFulfillmentPolicy($fulfillmentPolicyId);

        $this->assertTrue($expectedResponse == $result);
    }

    public function testGetFulfillmentPolicyByName(): void
    {
        $fulfillmentPolicyId = '5********0';
        $mockResponse = <<<JSON
        {
            "name": "ful_fil_pol",
            "marketplaceId": "EBAY_US",
            "categoryTypes": [
                {
                    "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
                    "default": false
                }
            ],
            "handlingTime": {
                "value": 1,
                "unit": "DAY"
            },
            "shippingOptions": [
                {
                    "optionType": "DOMESTIC",
                    "costType": "FLAT_RATE",
                    "shippingServices": [
                        {
                            "sortOrder": 1,
                            "shippingCarrierCode": "USPS",
                            "shippingServiceCode": "USPSPriorityFlatRateBox",
                            "shippingCost": {
                                "value": "0.0",
                                "currency": "USD"
                            },
                            "additionalShippingCost": {
                                "value": "0.0",
                                "currency": "USD"
                            },
                            "freeShipping": true,
                            "buyerResponsibleForShipping": false,
                            "buyerResponsibleForPickup": false
                        }
                    ],
                    "insuranceFee": {
                        "value": "0.0",
                        "currency": "USD"
                    }
                }
            ],
            "globalShipping": false,
            "pickupDropOff": false,
            "freightShipping": false,
            "fulfillmentPolicyId": "5********0"
        }
JSON;

        $expectedResponse = FulfillmentPolicy::fromArray([
            'name' => 'ful_fil_pol',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'default' => false,
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES
                ])
            ],
            'fulfillmentPolicyId' => $fulfillmentPolicyId,
            'handlingTime' => TimeDuration::fromArray([
                'unit' => TimeDurationUnitEnum::DAY,
                'value' => 1
            ]),
            'shippingOptions' => [
                ShippingOption::fromArray([
                    'costType' => ShippingCostTypeEnum::FLAT_RATE,
                    'insuranceFee' => $this->createDefaultAmount(),
                    'optionType' => ShippingOptionTypeEnum::DOMESTIC,
                    'shippingServices' => [
                        ShippingService::fromArray([
                            'additionalShippingCost' => $this->createDefaultAmount(),
                            'freeShipping' => true,
                            'shippingCarrierCode' => 'USPS',
                            'shippingCost' => $this->createDefaultAmount(),
                            'shippingServiceCode' => 'USPSPriorityFlatRateBox',
                            'sortOrder' => 1
                        ])
                    ]
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $result = $api->getFulfillmentPolicyByName(MarketplaceIdEnum::EBAY_US, 'ful_fil_pol');

        $this->assertTrue($expectedResponse == $result);
    }


    public function testUpdateFulfillmentPolicy(): void
    {
        $mockResponseBody = <<<JSON
        {
          "categoryTypes": [
            {
              "name": "MOTORS_VEHICLES"
            }
          ],
          "freightShipping": false,
          "fulfillmentPolicyId": "id24",
          "globalShipping": false,
          "localPickup": false,
          "marketplaceId": "EBAY_US",
          "name": "testName",
          "pickupDropOff": false,
          "warnings": []
        }
JSON;

        $client = $this->prepareClientMock(200, responseBody: $mockResponseBody);

        $api = $this->createApi(FulfillmentPolicyApi::class, $client);

        $body = FulfillmentPolicyRequest::fromArray([
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES
                ])
            ],
            'name' => 'testName',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US
        ]);

        $expectedResponse = SetFulfillmentPolicyResponse::fromArray([
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES
                ])
            ],
            'name' => 'testName',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'fulfillmentPolicyId' => 'id24',
            'warnings' => []
        ]);

        $result = $api->updateFulfillmentPolicy($body, 'id24');

        $this->assertTrue($expectedResponse == $result);
    }

    private function createDefaultAmount(): EbayModelInterface
    {
        return Amount::fromArray([
            'currency' => CurrencyCodeEnum::USD,
            'value' => '0.0'
        ]);
    }
}
