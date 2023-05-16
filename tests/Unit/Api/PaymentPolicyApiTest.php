<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;
use SapientPro\EbayAccountSDK\Models\Amount;
use SapientPro\EbayAccountSDK\Models\Deposit;
use SapientPro\EbayAccountSDK\Models\PaymentPolicy;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyResponse;
use SapientPro\EbayAccountSDK\Models\TimeDuration;
use SapientPro\EbayAccountSDK\Enums\CurrencyCodeEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentInstrumentBrandEnum;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest;
use SapientPro\EbayAccountSDK\Models\RecipientAccountReference;
use SapientPro\EbayAccountSDK\Enums\CategoryTypeEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentMethodTypeEnum;
use SapientPro\EbayAccountSDK\Enums\RecipientAccountReferenceTypeEnum;
use SapientPro\EbayAccountSDK\Models\CategoryType;
use SapientPro\EbayAccountSDK\Models\PaymentMethod;
use SapientPro\EbayAccountSDK\Models\SetPaymentPolicyResponse;
use SapientPro\EbayAccountSDK\Enums\TimeDurationUnitEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentPolicyApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreatePaymentPolicy(): void
    {
        $paymentPolicyName = 'paym';
        $mockResponse = <<<JSON
{
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": true
        }
    ],
    "name": "paym",
    "description": "Standard payment policy, PP & CC payments",
    "marketplaceId": "EBAY_US",
    "immediatePay": false,
    "paymentMethods": [
        {
            "paymentMethodType": "PAYPAL",
            "recipientAccountReference": {
                "referenceId": "l*****e@p*****m",
                "referenceType": "PAYPAL_EMAIL"
            }
        },
        {
            "paymentMethodType": "CREDIT_CARD",
            "brands": [
                "AMERICAN_EXPRESS",
                "DISCOVER",
                "MASTERCARD",
                "VISA"
            ]
        }
    ]
}
JSON;
        $paymentPolicyArray = [
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'name' => $paymentPolicyName,
            'description' => 'Standard payment policy, PP & CC payments',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'immediatePay' => false,
            'paymentMethods' => [
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::PAYPAL,
                    'recipientAccountReference' => RecipientAccountReference::fromArray([
                        'referenceId' => 'l*****e@p*****m',
                        'referenceType' => RecipientAccountReferenceTypeEnum::PAYPAL_EMAIL
                    ])
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CREDIT_CARD,
                    'brands' => [
                        PaymentInstrumentBrandEnum::AMERICAN_EXPRESS,
                        PaymentInstrumentBrandEnum::DISCOVER,
                        PaymentInstrumentBrandEnum::MASTERCARD,
                        PaymentInstrumentBrandEnum::VISA
                    ]
                ])
            ]
        ];

        $body = PaymentPolicyRequest::fromArray($paymentPolicyArray);

        $expectedResponse = SetPaymentPolicyResponse::fromArray($paymentPolicyArray);

        $client = $this->prepareClientMock(201, $mockResponse, [
            'Location' => 'ebay.com/path_to_created_policy'
        ]);

        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $response = $api->createPaymentPolicy($body);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testDeletePaymentPolicy(): void
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $result = $api->deletePaymentPolicyWithHttpInfo('id23');

        $this->assertSame(['code' => 204], $result);
    }

    public function testGetPaymentPolicies()
    {
        $mockResponse = <<<JSON
{
    "total": 1,
    "paymentPolicies": [
    {
        "paymentPolicyId": "id22",
        "name": "V********t",
        "description": "Vehicle payment policy, $500 down, full in 7 days",
        "marketplaceId": "EBAY_US",
        "categoryTypes": [
            {
                "name": "MOTORS_VEHICLES",
                "default": true
            }
        ],
        "paymentMethods": [
            {
                "paymentMethodType": "MONEY_ORDER"
            },
            {
                "paymentMethodType": "CASHIER_CHECK"
            },
            {
                "paymentMethodType": "CASH_ON_PICKUP"
            }
        ],
        "paymentInstructions": "A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.",
        "fullPaymentDueIn": {
            "value": 7,
            "unit": "DAY"
        },
        "immediatePay": false,
        "deposit": {
            "amount": {
                "value": "500.0",
                "currency": "USD"
            },
            "dueIn": {
                "value": 48,
                "unit": "HOUR"
            },
            "paymentMethods": [
                {
                    "paymentMethodType": "PAYPAL",
                    "recipientAccountReference": {
                        "referenceType": "PAYPAL_EMAIL",
                        "referenceId": "l********e@e*****m"
                    }
                }
            ]
        }
    }
    ]
}
JSON;

        $expectedResult = PaymentPolicyResponse::fromArray([
            'total' => 1,
            'paymentPolicies' => [
                PaymentPolicy::fromArray([
                    'paymentPolicyId' => 'id22',
                    'name' => 'V********t',
                    'description' => 'Vehicle payment policy, $500 down, full in 7 days',
                    'marketplaceId' => MarketplaceIdEnum::EBAY_US,
                    'categoryTypes' => [
                        CategoryType::fromArray([
                            'name' => CategoryTypeEnum::MOTORS_VEHICLES,
                            'default' => true
                        ])
                    ],
                    'paymentMethods' => [
                        PaymentMethod::fromArray([
                            'paymentMethodType' => PaymentMethodTypeEnum::MONEY_ORDER
                        ]),
                        PaymentMethod::fromArray([
                            'paymentMethodType' => PaymentMethodTypeEnum::CASHIER_CHECK
                        ]),
                        PaymentMethod::fromArray([
                            'paymentMethodType' => PaymentMethodTypeEnum::CASH_ON_PICKUP
                        ])
                    ],
                    'paymentInstructions' => 'A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.',
                    'fullPaymentDueIn' => TimeDuration::fromArray([
                        'value' => 7,
                        'unit' => TimeDurationUnitEnum::DAY
                    ]),
                    'immediatePay' => false,
                    'deposit' => Deposit::fromArray([
                        'amount' => Amount::fromArray([
                            'value' => '500.0',
                            'currency' => CurrencyCodeEnum::USD
                        ]),
                        'dueIn' => TimeDuration::fromArray([
                            'value' => 48,
                            'unit' => TimeDurationUnitEnum::HOUR
                        ]),
                        'paymentMethods' => [
                            PaymentMethod::fromArray([
                                'paymentMethodType' => PaymentMethodTypeEnum::PAYPAL,
                                'recipientAccountReference' => RecipientAccountReference::fromArray([
                                    'referenceType' => RecipientAccountReferenceTypeEnum::PAYPAL_EMAIL,
                                    'referenceId' => 'l********e@e*****m'
                                ])
                            ])
                        ]
                    ])
                ])
            ]
            ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $result = $api->getPaymentPolicies(MarketplaceIdEnum::EBAY_US);

        $this->assertEquals($expectedResult, $result);
    }

    public function testGetPaymentPolicy(): void
    {
        $mockResponse = <<<JSON
{
    "name": "V********t",
    "description": "Vehicle payment policy, $500 down, full in 7 days",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "MOTORS_VEHICLES",
            "default": true
        }
    ],
    "paymentMethods": [
        {
            "paymentMethodType": "MONEY_ORDER"
        },
        {
            "paymentMethodType": "CASHIER_CHECK"
        },
        {
            "paymentMethodType": "CASH_ON_PICKUP"
        }
    ],
    "paymentInstructions": "A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.",
    "fullPaymentDueIn": {
        "value": 7,
        "unit": "DAY"
    },
    "immediatePay": false,
    "deposit": {
        "amount": {
            "value": "500.0",
            "currency": "USD"
        },
        "dueIn": {
            "value": 48,
            "unit": "HOUR"
        },
        "paymentMethods": [
            {
                "paymentMethodType": "PAYPAL",
                "recipientAccountReference": {
                    "referenceType": "PAYPAL_EMAIL",
                    "referenceId": "l********e@e*****m"
                }
            }
        ]
    },
    "paymentPolicyId": "id22"
}
JSON;

        $expectedResult = PaymentPolicy::fromArray([
            'name' => 'V********t',
            'description' => 'Vehicle payment policy, $500 down, full in 7 days',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'paymentMethods' => [
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::MONEY_ORDER
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CASHIER_CHECK
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CASH_ON_PICKUP
                ])
            ],
            'paymentInstructions' => 'A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.',
            'fullPaymentDueIn' => TimeDuration::fromArray([
                'value' => 7,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'immediatePay' => false,
            'deposit' => Deposit::fromArray([
                'amount' => Amount::fromArray([
                    'value' => '500.0',
                    'currency' => CurrencyCodeEnum::USD
                ]),
                'dueIn' => TimeDuration::fromArray([
                    'value' => 48,
                    'unit' => TimeDurationUnitEnum::HOUR
                ]),
                'paymentMethods' => [
                    PaymentMethod::fromArray([
                        'paymentMethodType' => PaymentMethodTypeEnum::PAYPAL,
                        'recipientAccountReference' => RecipientAccountReference::fromArray([
                            'referenceType' => RecipientAccountReferenceTypeEnum::PAYPAL_EMAIL,
                            'referenceId' => 'l********e@e*****m'
                        ])
                    ])
                ]
            ]),
            'paymentPolicyId' => 'id22'
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $result = $api->getPaymentPolicy('id22');

        $this->assertEquals($expectedResult, $result);
    }

    public function testGetPaymentPolicyByName(): void
    {
        $mockResponse = <<<JSON
{
    "name": "payment_policy_name",
    "description": "Vehicle payment policy, $500 down, full in 7 days",
    "marketplaceId": "EBAY_US",
    "categoryTypes": [
        {
            "name": "MOTORS_VEHICLES",
            "default": true
        }
    ],
    "paymentMethods": [
        {
            "paymentMethodType": "MONEY_ORDER"
        },
        {
            "paymentMethodType": "CASHIER_CHECK"
        },
        {
            "paymentMethodType": "CASH_ON_PICKUP"
        }
    ],
    "paymentInstructions": "A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.",
    "fullPaymentDueIn": {
        "value": 7,
        "unit": "DAY"
    },
    "immediatePay": false,
    "deposit": {
        "amount": {
            "value": "500.0",
            "currency": "USD"
        },
        "dueIn": {
            "value": 48,
            "unit": "HOUR"
        },
        "paymentMethods": [
            {
                "paymentMethodType": "PAYPAL",
                "recipientAccountReference": {
                    "referenceType": "PAYPAL_EMAIL",
                    "referenceId": "l********e@e*****m"
                }
            }
        ]
    },
    "paymentPolicyId": "id22"
}
JSON;

        $expectedResult = PaymentPolicy::fromArray([
            'name' => 'payment_policy_name',
            'description' => 'Vehicle payment policy, $500 down, full in 7 days',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'paymentMethods' => [
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::MONEY_ORDER
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CASHIER_CHECK
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CASH_ON_PICKUP
                ])
            ],
            'paymentInstructions' => 'A PayPal deposit of $500 is due in 48 hours, payment in full is due in 7 days.',
            'fullPaymentDueIn' => TimeDuration::fromArray([
                'value' => 7,
                'unit' => TimeDurationUnitEnum::DAY
            ]),
            'immediatePay' => false,
            'deposit' => Deposit::fromArray([
                'amount' => Amount::fromArray([
                    'value' => '500.0',
                    'currency' => CurrencyCodeEnum::USD
                ]),
                'dueIn' => TimeDuration::fromArray([
                    'value' => 48,
                    'unit' => TimeDurationUnitEnum::HOUR
                ]),
                'paymentMethods' => [
                    PaymentMethod::fromArray([
                        'paymentMethodType' => PaymentMethodTypeEnum::PAYPAL,
                        'recipientAccountReference' => RecipientAccountReference::fromArray([
                            'referenceType' => RecipientAccountReferenceTypeEnum::PAYPAL_EMAIL,
                            'referenceId' => 'l********e@e*****m'
                        ])
                    ])
                ]
            ]),
            'paymentPolicyId' => 'id22'
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $result = $api->getPaymentPolicyByName(MarketplaceIdEnum::EBAY_US, 'payment_policy_name');

        $this->assertEquals($expectedResult, $result);
    }

    public function testUpdatePaymentPolicy()
    {
        $mockResponse = <<<JSON
{
    "categoryTypes": [
        {
            "name": "ALL_EXCLUDING_MOTORS_VEHICLES",
            "default": true
        }
    ],
    "name": "paym",
    "description": "Standard payment policy, PP & CC payments",
    "marketplaceId": "EBAY_US",
    "immediatePay": false,
    "paymentMethods": [
        {
            "paymentMethodType": "PAYPAL",
            "recipientAccountReference": {
                "referenceId": "l*****e@p*****m",
                "referenceType": "PAYPAL_EMAIL"
            }
        },
        {
            "paymentMethodType": "CREDIT_CARD",
            "brands": [
                "AMERICAN_EXPRESS",
                "DISCOVER",
                "MASTERCARD",
                "VISA"
            ]
        }
    ],
    "paymentPolicyId": "id22",
    "warnings": [] 
}
JSON;
        $paymentPolicyArray = [
            'categoryTypes' => [
                CategoryType::fromArray([
                    'name' => CategoryTypeEnum::ALL_EXCLUDING_MOTORS_VEHICLES,
                    'default' => true
                ])
            ],
            'name' => 'paym',
            'description' => 'Standard payment policy, PP & CC payments',
            'marketplaceId' => MarketplaceIdEnum::EBAY_US,
            'immediatePay' => false,
            'paymentMethods' => [
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::PAYPAL,
                    'recipientAccountReference' => RecipientAccountReference::fromArray([
                        'referenceId' => 'l*****e@p*****m',
                        'referenceType' => RecipientAccountReferenceTypeEnum::PAYPAL_EMAIL
                    ])
                ]),
                PaymentMethod::fromArray([
                    'paymentMethodType' => PaymentMethodTypeEnum::CREDIT_CARD,
                    'brands' => [
                        PaymentInstrumentBrandEnum::AMERICAN_EXPRESS,
                        PaymentInstrumentBrandEnum::DISCOVER,
                        PaymentInstrumentBrandEnum::MASTERCARD,
                        PaymentInstrumentBrandEnum::VISA
                    ]
                ])
            ],
        ];

        $body = PaymentPolicyRequest::fromArray($paymentPolicyArray);

        $paymentPolicyArray['paymentPolicyId'] = 'id22';
        $paymentPolicyArray['warnings'] = [];

        $expectedResponse = SetPaymentPolicyResponse::fromArray($paymentPolicyArray);

        $client = $this->prepareClientMock(201, $mockResponse, [
            'Location' => 'ebay.com/path_to_created_policy'
        ]);

        $api = $this->createApi(PaymentPolicyApi::class, $client);

        $response = $api->updatePaymentPolicy($body, 'id22');

        $this->assertTrue($expectedResponse == $response);
    }
}
