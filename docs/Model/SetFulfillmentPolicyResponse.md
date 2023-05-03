# SetFulfillmentPolicyResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**category_types** | [**\EBay\Account\Model\CategoryType[]**](CategoryType.md) | This container indicates whether the fulfillment business policy applies to motor vehicle listings, or if it applies to non-motor vehicle listings. | [optional] 
**description** | **string** | A seller-defined description of the fulfillment policy. This description is only for the seller&#x27;s use, and is not exposed on any eBay pages. This field is returned if set for the policy. &lt;br/&gt;&lt;br/&gt;&lt;b&gt;Max length&lt;/b&gt;: 250 | [optional] 
**freight_shipping** | **bool** | If returned as &lt;code&gt;true&lt;/code&gt;, the seller offers freight shipping. Freight shipping can be used for large items over 150 lbs. | [optional] 
**fulfillment_policy_id** | **string** | A unique eBay-assigned ID for a fulfillment business policy. This ID is generated when the policy is created. | [optional] 
**global_shipping** | **bool** | If returned as &lt;code&gt;true&lt;/code&gt;, eBay&#x27;s Global Shipping Program will be used by the seller to ship items to international locations. | [optional] 
**handling_time** | [**\EBay\Account\Model\TimeDuration**](TimeDuration.md) |  | [optional] 
**local_pickup** | **bool** | If returned as &lt;code&gt;true&lt;/code&gt;, local pickup is available for this policy. | [optional] 
**marketplace_id** | **string** | The ID of the eBay marketplace to which this fulfillment business policy applies. For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**name** | **string** | A seller-defined name for this fulfillment business policy. Names must be unique for policies assigned to the same marketplace. &lt;br/&gt;&lt;br/&gt;&lt;b&gt;Max length&lt;/b&gt;: 64 | [optional] 
**pickup_drop_off** | **bool** | If returned as &lt;code&gt;true&lt;/code&gt;, the seller offers the \&quot;Click and Collect\&quot; option. &lt;br/&gt;&lt;br/&gt;Currently, \&quot;Click and Collect\&quot; is available only to large retail merchants the eBay AU and UK marketplaces. | [optional] 
**shipping_options** | [**\EBay\Account\Model\ShippingOption[]**](ShippingOption.md) | This array is used to provide detailed information on the domestic and international shipping options available for the policy. A separate &lt;b&gt;ShippingOption&lt;/b&gt; object covers domestic shipping service options and international shipping service options (if the seller ships to international locations). The &lt;b&gt;optionType&lt;/b&gt; field indicates whether the &lt;b&gt;ShippingOption&lt;/b&gt; object applies to domestic or international shipping, and the &lt;b&gt;costType&lt;/b&gt; field indicates whether flat-rate shipping or calculated shipping will be used. &lt;p&gt;A separate &lt;b&gt;ShippingServices&lt;/b&gt; object is used to specify cost and other details for every available domestic and international shipping service option. &lt;/p&gt; | [optional] 
**ship_to_locations** | [**\EBay\Account\Model\RegionSet**](RegionSet.md) |  | [optional] 
**warnings** | [**\EBay\Account\Model\Error[]**](Error.md) | An array of one or more errors or warnings that were generated during the processing of the request. If there were no issues with the request, this array will return empty. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)
