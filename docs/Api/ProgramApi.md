# EBay\Account\ProgramApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getOptedInPrograms**](ProgramApi.md#getoptedinprograms) | **GET** /program/get_opted_in_programs | 
[**optInToProgram**](ProgramApi.md#optintoprogram) | **POST** /program/opt_in | 
[**optOutOfProgram**](ProgramApi.md#optoutofprogram) | **POST** /program/opt_out | 

# **getOptedInPrograms**
> \EBay\Account\Model\Programs getOptedInPrograms()



This method gets a list of the seller programs that the seller has opted-in to.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: api_auth
$config = EBay\Account\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ProgramApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getOptedInPrograms();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProgramApi->getOptedInPrograms: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\EBay\Account\Model\Programs**](../Model/Programs.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optInToProgram**
> object optInToProgram($body)



This method opts the seller in to an eBay seller program. Refer to the <a href=\"/api-docs/sell/account/overview.html#opt-in\" target=\"_blank\">Account API overview</a> for information about available eBay seller programs.<br /><br /><span class=\"tablenote\"><b>Note:</b> It can take up to 24-hours for eBay to process your request to opt-in to a Seller Program. Use the <a href=\"/api-docs/sell/account/resources/program/methods/getOptedInPrograms\" target=\"_blank\">getOptedInPrograms</a> call to check the status of your request after the processing period has passed.</span>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: api_auth
$config = EBay\Account\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ProgramApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \EBay\Account\Model\Program(); // \EBay\Account\Model\Program | Program being opted-in to.

try {
    $result = $apiInstance->optInToProgram($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProgramApi->optInToProgram: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\EBay\Account\Model\Program**](../Model/Program.md)| Program being opted-in to. |

### Return type

**object**

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optOutOfProgram**
> object optOutOfProgram($body)



This method opts the seller out of a seller program to which you have previously opted-in to. Get a list of the seller programs you have opted-in to using the <b>getOptedInPrograms</b> call.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: api_auth
$config = EBay\Account\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ProgramApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \EBay\Account\Model\Program(); // \EBay\Account\Model\Program | Program being opted-out of.

try {
    $result = $apiInstance->optOutOfProgram($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProgramApi->optOutOfProgram: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\EBay\Account\Model\Program**](../Model/Program.md)| Program being opted-out of. |

### Return type

**object**

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

