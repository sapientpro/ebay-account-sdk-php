# SapientPro\EbayAccountSDK\Api\OnboardingApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                                            | HTTP request                                                                  | Description |
|-----------------------------------------------------------------------------------|-------------------------------------------------------------------------------|-------------|
| [**getPaymentsProgramOnboarding**](OnboardingApi.md#getpaymentsprogramonboarding) | **GET** /payments_program/{marketplace_id}/{payments_program_type}/onboarding |             |

# **getPaymentsProgramOnboarding**
> getPaymentsProgramOnboarding(MarketplaceIdEnum $marketplaceId, PaymentsProgramType $paymentsProgramType = PaymentsProgramType::EBAY_PAYMENTS): PaymentsProgramOnboardingResponse



<span class=\"tablenote\"><b>Note:</b> This method is no longer applicable, as all seller accounts globally have been enabled for the new eBay payment and checkout flow.</span><br/><br/>This method retrieves a seller's onboarding status for a payments program for a specified marketplace. The overall onboarding status of the seller and the status of each onboarding step is returned.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\OnboardingApi;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new OnboardingApi(
    config: $config
);

try {
    $result = $apiInstance->getPaymentsProgramOnboarding(
        MarketplaceIdEnum::EBAY_US,
        PaymentsProgramType::EBAY_PAYMENTS
    );
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->getPaymentsProgramOnboarding: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                    | Type                                                     | Description                                                                | Notes |
|-------------------------|----------------------------------------------------------|----------------------------------------------------------------------------|-------|
| **marketplaceId**       | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum**   | The eBay marketplace ID associated with the onboarding status to retrieve. |       |
| **paymentsProgramType** | **\SapientPro\EbayAccountSDK\Enums\PaymentsProgramType** | The type of payments program whose status is returned by the method.       |       |

### Return type

[**\SapientPro\EbayAccountSDK\Models\PaymentsProgramOnboardingResponse**](../Model/PaymentsProgramOnboardingResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

