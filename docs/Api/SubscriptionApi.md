# SapientPro\EbayAccountSDK\Api\SubscriptionApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                    | HTTP request          | Description |
|-----------------------------------------------------------|-----------------------|-------------|
| [**getSubscription**](SubscriptionApi.md#getSubscription) | **GET** /subscription |             |

# **getSubscription**
> getSubscription(string $limit = null, string $continuationToken = null): SubscriptionResponse

This method retrieves the seller's current set of privileges, including whether or not the seller's eBay registration has been completed, as well as the details of their site-wide <b>sellingLimt</b> (the amount and quantity they can sell on a given day).

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\SubscriptionApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new SubscriptionApi(
    config: $config
);

try {
    $result = $apiInstance->getSubscription();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivilegeApi->getPrivileges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name                  | Type       | Description                   | Notes                        |
|-----------------------|------------|-------------------------------|------------------------------|
| **limit**             | **string** | This field is for future use. | [optional] [default to null] |
| **continuationToken** | string     | This field is for future use. | [optional] [default to null] |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SubscriptionResponse**](../Model/SubscriptionResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

