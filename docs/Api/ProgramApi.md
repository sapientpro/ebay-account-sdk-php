# SapientPro\EbayAccountSDK\Api\ProgramApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                     | HTTP request                           | Description |
|------------------------------------------------------------|----------------------------------------|-------------|
| [**getOptedInPrograms**](ProgramApi.md#getoptedinprograms) | **GET** /program/get_opted_in_programs |             |
| [**optInToProgram**](ProgramApi.md#optintoprogram)         | **POST** /program/opt_in               |             |
| [**optOutOfProgram**](ProgramApi.md#optoutofprogram)       | **POST** /program/opt_out              |             |

# **getOptedInPrograms**
> getOptedInPrograms(): Programs

This method gets a list of the seller programs that the seller has opted-in to.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ProgramApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ProgramApi(
    config: $config
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

[**\SapientPro\EbayAccountSDK\Models\Programs**](../Model/Programs.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optInToProgram**
> object optInToProgram(Program $body): void

This method opts the seller in to an eBay seller program. Refer to the <a href=\"/api-docs/sell/account/overview.html#opt-in\" target=\"_blank\">Account API overview</a> for information about available eBay seller programs.<br /><br /><span class=\"tablenote\"><b>Note:</b> It can take up to 24-hours for eBay to process your request to opt-in to a Seller Program. Use the <a href=\"/api-docs/sell/account/resources/program/methods/getOptedInPrograms\" target=\"_blank\">getOptedInPrograms</a> call to check the status of your request after the processing period has passed.</span>

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ProgramApi;
use SapientPro\EbayAccountSDK\Models\Program;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ProgramApi(
    config: $config
);
$body = Program::fromArray([
'programType' => ProgramTypeEnum::OUT_OF_STOCK_CONTROL
]);

try {
    $result = $apiInstance->optInToProgram($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProgramApi->optInToProgram: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name     | Type                                                                 | Description                | Notes |
|----------|----------------------------------------------------------------------|----------------------------|-------|
| **body** | [**\SapientPro\EbayAccountSDK\Models\Program**](../Model/Program.md) | Program being opted-in to. |       |

### Return type

**void**

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
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\ProgramApi;
use SapientPro\EbayAccountSDK\Models\Program;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\ProgramApi(
    config: $config
);
$body = Program::fromArray([
'programType' => ProgramTypeEnum::OUT_OF_STOCK_CONTROL
]);
try {
    $result = $apiInstance->optOutOfProgram($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProgramApi->optOutOfProgram: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name     | Type                                                                 | Description                 | Notes |
|----------|----------------------------------------------------------------------|-----------------------------|-------|
| **body** | [**\SapientPro\EbayAccountSDK\Models\Program**](../Model/Program.md) | Program being opted-out of. |       |

### Return type

**void**

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

