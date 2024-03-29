# SapientPro\EbayAccountSDK\Api\ReturnPolicyApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                                | HTTP request                                 | Description |
|-----------------------------------------------------------------------|----------------------------------------------|-------------|
| [**createReturnPolicy**](ReturnPolicyApi.md#createreturnpolicy)       | **POST** /return_policy                      |             |
| [**deleteReturnPolicy**](ReturnPolicyApi.md#deletereturnpolicy)       | **DELETE** /return_policy/{return_policy_id} |             |
| [**getReturnPolicies**](ReturnPolicyApi.md#getreturnpolicies)         | **GET** /return_policy                       |             |
| [**getReturnPolicy**](ReturnPolicyApi.md#getreturnpolicy)             | **GET** /return_policy/{return_policy_id}    |             |
| [**getReturnPolicyByName**](ReturnPolicyApi.md#getreturnpolicybyname) | **GET** /return_policy/get_by_policy_name    |             |
| [**updateReturnPolicy**](ReturnPolicyApi.md#updatereturnpolicy)       | **PUT** /return_policy/{return_policy_id}    |             |

# **createReturnPolicy**
> createReturnPolicy(ReturnPolicyRequest $body): SetReturnPolicyResponse

This method creates a new return policy where the policy encapsulates seller's terms for returning items.  <br/><br/>Each policy targets a specific marketplace, and you can create multiple policies for each marketplace. Return policies are not applicable to motor-vehicle listings.<br/><br/>A successful request returns the <b>getReturnPolicy</b> URI to the new policy in the <b>Location</b> response header and the ID for the new policy is returned in the response payload.  <p class=\"tablenote\"><b>Tip:</b> For details on creating and using the business policies supported by the Account API, see <a href=\"/api-docs/sell/static/seller-accounts/business-policies.html\">eBay business policies</a>.</p>

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ReturnPolicyApi(
    config: $config
);
$body = ReturnPolicyRequest::fromArray(
'name' => 'm********e',
'marketplaceId' => MarketplaceIdEnum::EBAY_US,
'refundMethod' => RefundMethodEnum::MONEY_BACK,
'returnsAccepted' => true,
'returnShippingCostPayer' => ReturnShippingCostPayerEnum::SELLER,
'returnPeriod' => TimeDuration::fromArray([
    'value' => 30,
    'unit' => TimeDurationUnitEnum::DAY
])
);

try {
    $result = $apiInstance->createReturnPolicy($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->createReturnPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name     | Type                                                                                         | Description           | Notes |
|----------|----------------------------------------------------------------------------------------------|-----------------------|-------|
| **body** | [**\SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest**](../Model/ReturnPolicyRequest.md) | Return policy request |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SetReturnPolicyResponse**](../Model/SetReturnPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteReturnPolicy**
> deleteReturnPolicy(string $returnPolicyId): void

This method deletes a return policy. Supply the ID of the policy you want to delete in the <b>returnPolicyId</b> path parameter.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ReturnPolicyApi(
    config: $config
);
$returnPolicyId = "return_policy_id_example"; // string | This path parameter specifies the ID of the return policy you want to delete.

try {
    $apiInstance->deleteReturnPolicy($returnPolicyId);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->deleteReturnPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type       | Description                                                                   | Notes |
|--------------------|------------|-------------------------------------------------------------------------------|-------|
| **returnPolicyId** | **string** | This path parameter specifies the ID of the return policy you want to delete. |       |

### Return type

void

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReturnPolicies**
> getReturnPolicies(MarketplaceIdEnum $marketplaceId): ReturnPolicyResponse

This method retrieves all the return policies configured for the marketplace you specify using the <code>marketplace_id</code> query parameter.  <br/><br/><b>Marketplaces and locales</b>  <br/><br/>Get the correct policies for a marketplace that supports multiple locales using the <code>Content-Language</code> request header. For example, get the policies for the French locale of the Canadian marketplace by specifying <code>fr-CA</code> for the <code>Content-Language</code> header. Likewise, target the Dutch locale of the Belgium marketplace by setting <code>Content-Language: nl-BE</code>. For details on header values, see <a href=\"/api-docs/static/rest-request-components.html#HTTP\" target=\"_blank\">HTTP request headers</a>.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ReturnPolicyApi(
    config: $config
);

try {
    $result = $apiInstance->getReturnPolicies(MarketplaceIdEnum::EBAY_US);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->getReturnPolicies: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name              | Type                                                   | Description                                                                                                                                                                                                                               | Notes |
|-------------------|--------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------|
| **marketplaceId** | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum** | This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve. For implementation help, refer to eBay API documentation at https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\ReturnPolicyResponse**](../Model/ReturnPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReturnPolicy**
> getReturnPolicy(string $returnPolicyId): ReturnPolicy

This method retrieves the complete details of the return policy specified by the <b>returnPolicyId</b> path parameter.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ReturnPolicyApi(
    config: $config
);
$returnPolicyId = "return_policy_id_example"; // string | This path parameter specifies the of the return policy you want to retrieve.

try {
    $result = $apiInstance->getReturnPolicy($returnPolicyId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->getReturnPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type       | Description                                                                  | Notes |
|--------------------|------------|------------------------------------------------------------------------------|-------|
| **returnPolicyId** | **string** | This path parameter specifies the of the return policy you want to retrieve. |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\ReturnPolicy**](../Model/ReturnPolicy.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReturnPolicyByName**
> getReturnPolicyByName(MarketplaceIdEnum $marketplaceId, string $name): ReturnPolicy

This method retrieves the details of a specific return policy. Supply both the policy <code>name</code> and its associated <code>marketplace_id</code> in the request query parameters.   <br/><br/><b>Marketplaces and locales</b>  <br/><br/>Get the correct policy for a marketplace that supports multiple locales using the <code>Content-Language</code> request header. For example, get a policy for the French locale of the Canadian marketplace by specifying <code>fr-CA</code> for the <code>Content-Language</code> header. Likewise, target the Dutch locale of the Belgium marketplace by setting <code>Content-Language: nl-BE</code>. For details on header values, see <a href=\"/api-docs/static/rest-request-components.html#HTTP\">HTTP request headers</a>.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ReturnPolicyApi(
    config: $config
);
$name = "name_example"; // string | This query parameter specifies the seller-defined name of the return policy you want to retrieve.

try {
    $result = $apiInstance->getReturnPolicyByName(MarketplaceIdEnum::EBAY_US, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->getReturnPolicyByName: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name              | Type                                                   | Description                                                                                                                                                                                                                               | Notes |
|-------------------|--------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------|
| **marketplaceId** | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum** | This query parameter specifies the ID of the eBay marketplace of the policy you want to retrieve. For implementation help, refer to eBay API documentation at https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum |       |
| **name**          | **string**                                             | This query parameter specifies the seller-defined name of the return policy you want to retrieve.                                                                                                                                         |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\ReturnPolicy**](../Model/ReturnPolicy.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateReturnPolicy**
> updateReturnPolicy(ReturnPolicyRequest $body, string $returnPolicyId): SetReturnPolicyResponse

This method updates an existing return policy. Specify the policy you want to update using the <b>return_policy_id</b> path parameter. Supply a complete policy payload with the updates you want to make; this call overwrites the existing policy with the new details specified in the payload.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ReturnPolicyApi;
use SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ReturnPolicyApi(
    config: $config
);
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
$returnPolicyId = "return_policy_id_example"; // string | This path parameter specifies the ID of the return policy you want to update.

try {
    $result = $apiInstance->updateReturnPolicy($body, $returnPolicyId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnPolicyApi->updateReturnPolicy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                 | Type                                                                                         | Description                                                                   | Notes |
|----------------------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------|-------|
| **body**             | [**\SapientPro\EbayAccountSDK\Models\ReturnPolicyRequest**](../Model/ReturnPolicyRequest.md) | Container for a return policy request.                                        |       |
| **return_policy_id** | **string**                                                                                   | This path parameter specifies the ID of the return policy you want to update. |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SetReturnPolicyResponse**](../Model/SetReturnPolicyResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

