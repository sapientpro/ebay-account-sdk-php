# SapientPro\EbayAccountSDK\Api\PaymentsProgramApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                             | HTTP request                                                       | Description |
|--------------------------------------------------------------------|--------------------------------------------------------------------|-------------|
| [**getPaymentsProgram**](PaymentsProgramApi.md#getpaymentsprogram) | **GET** /payments_program/{marketplace_id}/{payments_program_type} |             |

# **getPaymentsProgram**
> getPaymentsProgram(MarketplaceIdEnum $marketplaceId, PaymentsProgramType $paymentsProgramType): PaymentsProgramResponse

<span class=\"tablenote\"><b>Note:</b> This method is no longer applicable, as all seller accounts globally have been enabled for the new eBay payment and checkout flow.</span><br/><br/>This method returns whether or not the user is opted-in to the specified payments program. Sellers opt-in to payments programs by marketplace and you use the <b>marketplace_id</b> path parameter to specify the marketplace of the status flag you want returned.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\PaymentsProgramApi;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use \SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new EBay\Account\Api\PaymentsProgramApi(
    config: $config
);

try {
    $result = $apiInstance->getPaymentsProgram(MarketplaceIdEnum::EBAY_US, PaymentsProgramType::EBAY_PAYMENTS);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsProgramApi->getPaymentsProgram: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                    | Type                                                     | Description                                                                                                                         | Notes |
|-------------------------|----------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------|-------|
| **marketplaceId**       | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum**   | This path parameter specifies the eBay marketplace of the payments program for which you want to retrieve the seller&#x27;s status. |       |
| **paymentsProgramType** | **\SapientPro\EbayAccountSDK\Enums\PaymentsProgramType** | This path parameter specifies the payments program whose status is returned by the call.                                            |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\PaymentsProgramResponse**](../Model/PaymentsProgramResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

