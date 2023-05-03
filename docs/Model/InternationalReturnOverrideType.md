# InternationalReturnOverrideType

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**return_method** | **string** | This field sets/indicates if the seller offers replacement or exchange items to the buyer in the case of an international return. The buyer must be willing to accept a replacement or exchange item; otherwise, the seller will need to issue a refund for a return. For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/account/types/api:ReturnMethodEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**return_period** | [**\EBay\Account\Model\TimeDuration**](TimeDuration.md) |  | [optional] 
**returns_accepted** | **bool** | If set to &lt;code&gt;true&lt;/code&gt;, the seller accepts international returns. If set to &lt;code&gt;false&lt;/code&gt;, the seller does not accept international returns.  &lt;br/&gt;&lt;br/&gt;This field is conditionally required if the seller chooses to have a separate international return policy. | [optional] 
**return_shipping_cost_payer** | **string** | This field indicates who is responsible for paying for the shipping charges for returned items. The field can be set to either &lt;code&gt;BUYER&lt;/code&gt; or &lt;code&gt;SELLER&lt;/code&gt;.  &lt;br/&gt;&lt;br/&gt;Depending on the return policy and specifics of the return, either the buyer or the seller can be responsible for the return shipping costs. Note that the seller is always responsible for return shipping costs for &#x27;significantly not as described&#x27; (SNAD) issues.  &lt;br/&gt;&lt;br/&gt;This field is conditionally required if the &lt;b&gt;internationalOverride.returnsAccepted&lt;/b&gt; field is set to &lt;code&gt;true&lt;/code&gt;. For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/account/types/api:ReturnShippingCostPayerEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

