# SapientPro\EbayAccountSDK\Api\PaymentPolicyApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                                   | HTTP request                                   | Description |
|--------------------------------------------------------------------------|------------------------------------------------|-------------|
| [**createPaymentPolicy**](PaymentPolicyApi.md#createpaymentpolicy)       | **POST** /payment_policy                       |             |
| [**deletePaymentPolicy**](PaymentPolicyApi.md#deletepaymentpolicy)       | **DELETE** /payment_policy/{payment_policy_id} |             |
| [**getPaymentPolicies**](PaymentPolicyApi.md#getpaymentpolicies)         | **GET** /payment_policy                        |             |
| [**getPaymentPolicy**](PaymentPolicyApi.md#getpaymentpolicy)             | **GET** /payment_policy/{payment_policy_id}    |             |
| [**getPaymentPolicyByName**](PaymentPolicyApi.md#getpaymentpolicybyname) | **GET** /payment_policy/get_by_policy_name     |             |
| [**updatePaymentPolicy**](PaymentPolicyApi.md#updatepaymentpolicy)       | **PUT** /payment_policy/{payment_policy_id}    |             |

# **createPaymentPolicy**
> SetPaymentPolicyResponse createPaymentPolicy(PaymentPolicyRequest $body): SetPaymentPolicyResponse



This method creates a new payment policy where the policy encapsulates seller's terms for order payments.  <br/><br/>Each policy targets a specific eBay marketplace and category group, and you can create multiple policies for each combination.  <br/><br/>A successful request returns the <b>getPaymentPolicy</b> URI to the new policy in the <b>Location</b> response header and the ID for the new policy is returned in the response payload.  <p class=\"tablenote\"><b>Tip:</b> For details on creating and using the business policies supported by the Account API, see <a href=\"/api-docs/sell/static/seller-accounts/business-policies.html\">eBay business policies</a>.</p>

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new PaymentPolicyApi(
    config: $config
);
$body = PaymentPolicyRequest::fromArray([
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
]);

try {
    $result = $apiInstance->createPaymentPolicy($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->createPaymentPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name     | Type                                                                                           | Description            | Notes |
|----------|------------------------------------------------------------------------------------------------|------------------------|-------|
| **body** | [**\SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest**](../Model/PaymentPolicyRequest.md) | Payment policy request |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SetPaymentPolicyResponse**](../Model/SetPaymentPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletePaymentPolicy**
> deletePaymentPolicy($paymentPolicyId): void

This method deletes a payment policy. Supply the ID of the policy you want to delete in the <b>paymentPolicyId</b> path parameter.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new PaymentPolicyApi(
    config: $config
);
$paymentPolicyId = "payment_policy_id_example"; // string | This path parameter specifies the ID of the payment policy you want to delete.

try {
    $apiInstance->deletePaymentPolicy($paymentPolicyId);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->deletePaymentPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                | Type       | Description                                                                    | Notes |
|---------------------|------------|--------------------------------------------------------------------------------|-------|
| **paymentPolicyId** | **string** | This path parameter specifies the ID of the payment policy you want to delete. |       |

### Return type

void (empty response body)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPaymentPolicies**
> getPaymentPolicies(MarketplaceIdEnum $marketplaceId): PaymentPolicyResponse

This method retrieves all the payment policies configured for the marketplace you specify using the <code>marketplace_id</code> query parameter.  <br/><br/><b>Marketplaces and locales</b>  <br/><br/>Get the correct policies for a marketplace that supports multiple locales using the <code>Content-Language</code> request header. For example, get the policies for the French locale of the Canadian marketplace by specifying <code>fr-CA</code> for the <code>Content-Language</code> header. Likewise, target the Dutch locale of the Belgium marketplace by setting <code>Content-Language: nl-BE</code>. For details on header values, see <a href=\"/api-docs/static/rest-request-components.html#HTTP\" target=\"_blank\">HTTP request headers</a>.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new PaymentPolicyApi(
    config: $config
);

try {
    $result = $apiInstance->getPaymentPolicies(MarketplaceIdEnum::EBAY_US);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->getPaymentPolicies: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name              | Type                                                   | Description                                                                                                                                                                                                                       | Notes |
|-------------------|--------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------|
| **marketplaceId** | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum** | This query parameter specifies the eBay marketplace of the policies you want to retrieve. For implementation help, refer to eBay API documentation at https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\PaymentPolicyResponse**](../Model/PaymentPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPaymentPolicy**
> getPaymentPolicy(string $paymentPolicyId): PaymentPolicy

This method retrieves the complete details of a payment policy. Supply the ID of the policy you want to retrieve using the <b>paymentPolicyId</b> path parameter.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = PaymentPolicyApi(
    config: $config
);
$paymentPolicyId = "payment_policy_id_example"; // string | This path parameter specifies the ID of the payment policy you want to retrieve.

try {
    $result = $apiInstance->getPaymentPolicy($paymentPolicyId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->getPaymentPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                | Type       | Description                                                                      | Notes |
|---------------------|------------|----------------------------------------------------------------------------------|-------|
| **paymentPolicyId** | **string** | This path parameter specifies the ID of the payment policy you want to retrieve. |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\PaymentPolicy**](../Model/PaymentPolicy.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPaymentPolicyByName**
> getPaymentPolicyByName(MarketplaceIdEnum $marketplaceId, string $name): PaymentPolicy

This method retrieves the details of a specific payment policy. Supply both the policy <code>name</code> and its associated <code>marketplace_id</code> in the request query parameters.   <br/><br/><b>Marketplaces and locales</b>  <br/><br/>Get the correct policy for a marketplace that supports multiple locales using the <code>Content-Language</code> request header. For example, get a policy for the French locale of the Canadian marketplace by specifying <code>fr-CA</code> for the <code>Content-Language</code> header. Likewise, target the Dutch locale of the Belgium marketplace by setting <code>Content-Language: nl-BE</code>. For details on header values, see <a href=\"/api-docs/static/rest-request-components.html#HTTP\">HTTP request headers</a>.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new PaymentPolicyApi(
    config: $config
);
$name = "name_example"; // string | This query parameter specifies the seller-defined name of the payment policy you want to retrieve.

try {
    $result = $apiInstance->getPaymentPolicyByName(MarketplaceIdEnum::EBAY_US, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->getPaymentPolicyByName: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name              | Type                                                   | Description                                                                                                                                                                                                                     | Notes |
|-------------------|--------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------|
| **marketplaceId** | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum** | This query parameter specifies the eBay marketplace of the policy you want to retrieve. For implementation help, refer to eBay API documentation at https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum |       |
| **name**          | **string**                                             | This query parameter specifies the seller-defined name of the payment policy you want to retrieve.                                                                                                                              |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\PaymentPolicy**](../Model/PaymentPolicy.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatePaymentPolicy**
> updatePaymentPolicy(PaymentPolicyRequest $body, string $paymentPolicyId): SetPaymentPolicyResponse

This method updates an existing payment policy. Specify the policy you want to update using the <b>payment_policy_id</b> path parameter. Supply a complete policy payload with the updates you want to make; this call overwrites the existing policy with the new details specified in the payload.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentPolicyApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\PaymentPolicyApi(
    config: $config
);
$body = new PaymentPolicyRequest::fromArray([
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
]);
$paymentPolicyId = "payment_policy_id_example";

try {
    $result = $apiInstance->updatePaymentPolicy($body, $paymentPolicyId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentPolicyApi->updatePaymentPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                | Type                                                                                           | Description                                                                    | Notes |
|---------------------|------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------|-------|
| **body**            | [**\SapientPro\EbayAccountSDK\Models\PaymentPolicyRequest**](../Model/PaymentPolicyRequest.md) | Payment policy request                                                         |       |
| **paymentPolicyId** | **string**                                                                                     | This path parameter specifies the ID of the payment policy you want to update. |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SetPaymentPolicyResponse**](../Model/SetPaymentPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

