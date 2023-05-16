# SapientPro\EbayAccountSDK\Api\KycApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                         | HTTP request | Description |
|--------------------------------|--------------|-------------|
| [**getKYC**](KycApi.md#getkyc) | **GET** /kyc |             |

# **getKYC**
>  getKYC(): void

<span class=\"tablenote\"><b>Note:</b>This method was originally created to see which onboarding requirements were still pending for sellers being onboarded for eBay managed payments, but now that all seller accounts are onboarded globally, this method should now just returne an empty payload with a <code>204 No Content</code> HTTP status code. </span>

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\KycApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new KycApi(
    config: $config
);

try {
    $result = $apiInstance->getKYC();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KycApi->getKYC: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

**void**

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

