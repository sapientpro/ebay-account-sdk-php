# SapientPro\EbayAccountSDK\Api\PrivilegeApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                             | HTTP request       | Description |
|----------------------------------------------------|--------------------|-------------|
| [**getPrivileges**](PrivilegeApi.md#getprivileges) | **GET** /privilege |             |

# **getPrivileges**
> getPrivileges(): SellingPrivileges



This method retrieves the seller's current set of privileges, including whether or not the seller's eBay registration has been completed, as well as the details of their site-wide <b>sellingLimt</b> (the amount and quantity they can sell on a given day).

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PrivilegeApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new PrivilegeApi(
    config: $config
);

try {
    $result = $apiInstance->getPrivileges();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivilegeApi->getPrivileges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\SapientPro\EbayAccountSDK\Models\SellingPrivileges**](../Model/SellingPrivileges.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

