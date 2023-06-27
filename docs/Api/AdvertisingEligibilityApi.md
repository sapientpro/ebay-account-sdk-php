# SapientPro\EbayAccountSDK\Api\AdvertisingEligibilityApi

All URIs are relative to *https://api.ebay.com/sell/account/v1*

| Method                                                                                  | HTTP request                     | Description |
|-----------------------------------------------------------------------------------------|----------------------------------|-------------|
| [**getAdvertisingEligibility**](AdvertisingEligibilityApi.md#getAdvertisingEligibility) | **GET** /advertising_eligibility |             |

# **getAdvertisingEligibility**
> getAdvertisingEligibility(MarketplaceIdEnum $xEbayCMarketplaceId, string $programTypes = null): SellerEligibilityMultiProgramResponse

This method allows developers to check the seller eligibility status for eBay advertising programs.

### Example
```php
<?php
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\Api\AdvertisingEligibilityApi;
use \SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new AdvertisingEligibilityApi(
    config: $config
);

try {
    $result = $apiInstance->getAdvertisingEligibility(\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum::EBAY_US);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivilegeApi->getPrivileges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name              | Type                                                   | Description                                                                                                                                                                                     | Notes                        |
|-------------------|--------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------|
| **marketplaceId** | **\SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum** |                                                                                                                                                                                                 |                              |
| **programTypes**  | string                                                 | A comma-separated list of eBay advertising programs. Tip: See the AdvertisingProgramEnum type for possible values. If no programs are specified, the results will be returned for all programs. | [optional] [default to null] |

### Return type

[**\SapientPro\EbayAccountSDK\Models\SellerEligibilityMultiProgramResponse**](../Model/SellerEligibilityMultiProgramResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

