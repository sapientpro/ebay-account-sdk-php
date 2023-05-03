# Region

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**region_name** | **string** | A string that indicates the name of a region, as defined by eBay. A \&quot;region\&quot; can be either a &#x27;world region&#x27; (e.g., the \&quot;Middle East\&quot; or \&quot;Southeast Asia\&quot;), a country (represented with a two-letter country code), a state or province (represented with a two-letter code), or a special domestic region within a country. The &lt;b&gt;GeteBayDetails&lt;/b&gt; call in the Trading API can be used to retrieve the world regions and special domestic regions within a specific country. To get these enumeration values, call &lt;b&gt;GeteBayDetails&lt;/b&gt;with the &lt;b&gt;DetailName&lt;/b&gt; value set to &lt;b&gt;ExcludeShippingLocationDetails&lt;/b&gt;. | [optional] 
**region_type** | **string** | Reserved for future use. &lt;!--The region&#x27;s type, which can be one of the following: &#x27;COUNTRY&#x27;, &#x27;COUNTRY_REGION&#x27;, &#x27;STATE_OR_PROVINCE&#x27;, &#x27;WORLD_REGION&#x27;, or &#x27;WORLDWIDE&#x27;.--&gt; For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/account/types/ba:RegionTypeEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

