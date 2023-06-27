<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the shippingServices array,
 * an array that provides details about every domestic and international shipping service option
 * that is defined for the policy.
 */
class ShippingService implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is used by the seller to cover the use case when a single buyer purchases
     * multiple quantities of the same line item. This cost cannot exceed the corresponding shippingCost value.
     * A seller will generally set this field when he/she wants to pass on a shipping discount to the buyer if that buyer purchases multiple quantities of a line item.
     * The seller can ship multiple quantities of the line item in the same package and pass on the shipping savings to the buyer.
     * If this field is not set, and a buyer purchases multiple quantities of an item, the seller can technically charge the same cost set in the shippingCost container for each individual item, but in general, it behooves both the seller and the buyer (and saves both parties money) if they discuss combined shipping.This field is not applicable to auction listings or single-quantity, fixed-price listings.
     * This container is returned if set.
     *
     * @var Amount|null
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $additionalShippingCost = null;

    /** This field should be included and set to <code>true</code> for a motor vehicle listing if it will be the buyer's responsibility to pick up the purchased motor vehicle after full payment is made. This field is only applicable to motor vehicle listings. In the majority of motor vehicle listings, the seller does make the buyer responsible for pickup or shipment of the vehicle. This field is returned if set.Default: false */
    #[Assert\Type('bool')]
    public bool $buyerResponsibleForPickup = false;

    /** This field should be included and set to <code>true</code> for a motor vehicle listing if it will be the buyer's responsibility to arrange for shipment of a purchased motor vehicle after full payment is made. This field is only applicable to motor vehicle listings. In the majority of motor vehicle listings, the seller does make the buyer responsible for pickup or shipment of the vehicle. This field is returned if set.Default: false */
    #[Assert\Type('bool')]
    public bool $buyerResponsibleForShipping = false;

    /**
     * @var Amount
     * This container is used if the seller charges a Cash on Delivery (COD) fee. <ul><li>This fee will only be applicable in the case of a 'local pickup', and if one of the specified offline payment methods is a 'cash on pickup' or 'cash on delivery' option. </li><li>This fee is added to the total cost of the item, and the total cost is due from the buyer upon the delivery of the item.</li></ul>This container is returned if set.
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $cashOnDeliveryFee = null;

    /** This field is included and set to <code>true</code> if the seller offers a free shipping option to the buyer. This field can only be included and set to <code>true</code> for the first domestic shipping service option specified in the shippingServices container (it is ignored if set for subsequent shipping services or for any international shipping service option). The first specified shipping service option has a sortOrder value of <code>1</code> or if the sortOrderId field is not used, it is the shipping service option that's specified first in the shippingServices container.This container is returned if set. */
    #[Assert\Type('bool')]
    public ?bool $freeShipping = null;

    /** This field sets/indicates the shipping carrier, such as <code>USPS</code>, <code>FedEx</code>, or <code>UPS</code>. Although this field uses the string type, the seller must pass in a pre-defined enumeration value here. For a full list of shipping carrier enum values for a specified eBay marketplace, the GeteBayDetails call of the Trading API can be used, and the DetailName field's value should be set to <code>ShippingCarrierDetails</code>. The enum values for each shipping carriers can be found in each ShippingCarrierDetails.ShippingCarrier field in the response payload. This field is actually optional, as the shipping carrier is also tied into the shippingServiceCode enum value, and that field is required for every specified shipping service option.This field is returned if set. */
    #[Assert\Type('string')]
    public ?string $shippingCarrierCode = null;

    /**
     * @var Amount|null
     * This container is used to set the shipping cost to ship one item using the corresponding shipping service option. This container is conditionally required if the seller is using flat-rate shipping and is not using a domestic or international shipping rate table. This container is not necessary for calculated shipping, since eBay will calculate the shipping cost and display it in the View Item page based off of the potential buyer's ship-to location.This value is automatically set to <code>0.0</code> for the first specified domestic shipping service option and if the corresponding freeShipping field is set to <code>true</code>.  This container is returned if set for the policy.
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $shippingCost = null;

    /** This field sets/indicates the domestic or international shipping service option, such as <code>USPSPriority</code>, <code>FedEx2Day</code>, or <code>UPS3rdDay</code>. Although this field uses the string type, the seller must pass in a pre-defined enumeration value here. For a full list of shipping service option enum values for a specified eBay marketplace, the GeteBayDetails call of the Trading API can be used, and the DetailName field's value should be set to <code>ShippingServiceDetails</code>. The enum values for each shipping service option can be found in each ShippingServiceDetails.ShippingService field in the response payload. The seller must make sure that the shipping service option is still valid, which is indicated by a <code>true</code> value in the corresponding ValidForSellingFlow boolean field. International shipping service options are typically returned at the top of the response payload, and are indicated by an InternationalService boolean field that reads <code>true</code>. The InternationalService boolean field is not returned at all for domestic shipping service options.  This field is required for every specified shipping service option.This field is returned if set. */
    #[Assert\Type('string')]
    public ?string $shippingServiceCode = null;

    /** This container is used to set the ship-to locations applicable to the corresponding shipping service option. Although the regionExcluded container is defined for RegionSet type and could technically be used here, it is recommened that only the regionIncluded container be used at the shipping service level. The excluded shipping regions (if any) can instead be set up in the top-level regionExcluded container. The regionIncluded and regionExcluded containers define the geographical regions/countries/states or provinces/domestic regions where the seller does and doesn't ship to with this fulfillment policy.To retrieve the valid geographical shipping region values, two-digit country values, or special domestic regions for an eBay marketplace, call GeteBayDetails with DetailName value set to <code>ExcludeShippingLocationDetails</code>, then review the ExcludeShippingLocationDetails containers in the response for the strings you use in the regionIncluded.regionName field. <ul><li>For valid geographical region names, look for the <code>ExcludeShippingLocationDetails</code> containers in the GeteBayDetails response where the Region value is <code>Worldwide</code>, and the valid values will be shown in the corresponding Location fields.</li> <li>For valid two-digit country codes, look for <code>ExcludeShippingLocationDetails</code> in the GeteBayDetails response where the Region value is one of the defined geographical regions, and the valid values will be shown in the corresponding Location fields. Alternatively, you can find the two-digit country code values in the <a href="/api-docs/sell/account/types/ba:CountryCodeEnum">CountryCodeEnum</a> type definition.</li>  <li>For valid domestic region values, look for <code>ExcludeShippingLocationDetails</code> in the GeteBayDetails response where the Region value is either <code>Domestic Location</code> or <code>Additional Locations</code>, and the valid values will be shown in the corresponding Location fields.</li></ul> The <code>STATE_OR_PROVINCE</code> region type is only applicable to the US and Canada, and valid values for US states are the same <a href="https://about.usps.com/who-we-are/postal-history/state-abbreviations.htm ">two-digit abbreviations</a> used by the United States Postal Service, and valid values for Canadian provinces and territories are the same <a href="https://www.canadapost-postescanada.ca/cpc/en/support/articles/addressing-guidelines/symbols-and-abbreviations.page ">two-digit abbreviations</a> used by the Canada Post. */
    #[Assert\Type(RegionSet::class)]
    public ?RegionSet $shipToLocations = null;

    /** The integer value set in this field controls the order of the corresponding domestic or international shipping service option in the View Item and Checkout pages. Sellers can specify up to four domestic shipping services (in four separate shippingService containers), so valid values are 1, 2, 3, and 4. A shipping service option with a sortOrder value of <code>1</code> appears at the top of View Item and Checkout pages. Conversely, a shipping service option with a sortOrder value of <code>1</code> appears at the bottom of the list. Sellers can specify up to five international shipping services (in five separate shippingService containers), so valid values for international shipping services are 1, 2, 3, 4, and 5. Similarly to domestic shipping service options, the sortOrder value of a international shipping service option controls the placement of that shipping service option in the View Item and Checkout pages. If the sortOrder field is not supplied, the order of domestic and international shipping service options is determined by the order in which they are listed in the API call. Min: 1. Max: 4 (for domestic shipping service) or 5 (for international shipping service). */
    #[Assert\Type('int')]
    public ?int $sortOrder = null;

    /** <span class="tablenote"> <strong>Note:</strong> DO NOT USE THIS FIELD. Shipping surcharges for domestic shipping service options can no longer be set with fulfillment business policies, except through shipping rate tables. To do this, a seller would set up a surcharge-based shipping rate table and specify the surcharge in that table. Then, the seller would need to associate this shipping rate table to the fulfillment business policy by specifying the unique ID of the shipping rate table through the shippingOptions.rateTableId field. </span>Shipping surcharges cannot be applied at all to international shipping service options. */
    #[Assert\Type(Amount::class)]
    public ?Amount $surcharge = null;
}
