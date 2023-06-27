<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\ShippingCostTypeEnum;
use SapientPro\EbayAccountSDK\Enums\ShippingOptionTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the shippingOptions array,
 * which is used to provide detailed information on the domestic and international shipping options
 * available for the policy.
 * A separate ShippingOption object covers domestic shipping service options
 * and international shipping service options (if the seller ships to international locations).
 */
class ShippingOption implements EbayModelInterface
{
    use FillsModel;

    /**
     * This field defines whether the shipping cost model is <code>FLAT_RATE</code>
     * (the same rate for all buyers, or buyers within a region if shipping rate tables are used)
     * or <code>CALCULATED</code> (the shipping rate varies by the ship-to location and size and weight of the package).
     * This field is conditionally required if any shipping service options are specified.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ShippingCostTypeEnum
     *
     * @var ShippingCostTypeEnum|null
     */
    #[Assert\Type(ShippingCostTypeEnum::class)]
    public ?ShippingCostTypeEnum $costType = null;

    /**
     * This field has been deprecated.
     * Shipping insurance is offered only via a shipping carrier's shipping services
     * and is no longer available via eBay shipping policies.
     *
     * @var Amount|null
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $insuranceFee = null;

    /** This field has been deprecated. Shipping insurance is offered only via a shipping carrier's shipping services and is no longer available via eBay shipping policies. */
    #[Assert\Type('bool')]
    public ?bool $insuranceOffered = null;

    /**
     * This field is used to indicate if the corresponding shipping service options (under shippingServices array)
     * are domestic or international shipping service options.
     * This field is conditionally required if any shipping service options are specified.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ShippingOptionTypeEnum
     *
     * @var ShippingOptionTypeEnum|null
     */
    #[Assert\Type(ShippingOptionTypeEnum::class)]
    public ?ShippingOptionTypeEnum $optionType = null;

    /**
     * @var Amount|null
     * This container is used if the seller adds handling charges to domestic and/or international shipments. Sellers can not specify any domestic handling charges if they offered 'free shipping' in the policy.This container will only be returned if set for the policy.
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $packageHandlingCost = null;

    /** This field is used if the seller wants to associate a domestic or international shipping rate table to the fulfillment business policy. The <a href="/api-docs/sell/account/resources/rate_table/methods/getRateTables">getRateTables</a> method can be used to retrieve shipping rate table IDs.With domestic and international shipping rate tables, the seller can set different shipping costs based on shipping regions and shipping speed/level of service (one-day, expedited, standard, economy). There are also options to additional per-weight and handling charges.Sellers need to be careful that shipping rate tables match the corresponding shipping service options. In other words, a domestic shipping rate table must not be specified in the same container where international shipping service options are being specified, and vice versa, and the shipping speed/level of service of the provided shipping service options should match the shipping speed/level of service options that are defined in the shipping rate tables. For example, if the corresponding shipping rate table defines costs for one-day shipping services, there should be at least one one-day shipping service option specified under the shippingServices array.This field is returned if set. */
    #[Assert\Type('string')]
    public ?string $rateTableId = null;

    /** This field is the unique identifier of a seller's domestic or international shipping discount profile. If a buyer satisfies the requirements of the discount rule, this buyer will receive a shipping discount for the order. The seller can create and manage shipping discount profiles using (Get/Set) ShippingDiscountProfiles calls in the Trading API or through the Shipping Preferences in My eBay. <span class="tablenote">Note: Initially, shipping discount profiles in the Account API will <i>not</i> be available to all sellers.</span> */
    #[Assert\Type('string')]
    public ?string $shippingDiscountProfileId = null;

    /** This boolean indicates whether or not the seller has set up a promotional shipping discount that will be available to buyers who satisfy the requirements of the shipping discount rule. The seller can create and manage shipping promotional discounts using (Get/Set) ShippingDiscountProfiles calls in the Trading API or through the Shipping Preferences in My eBay. <span class="tablenote">Note: Initially, shipping discount profiles in the Account API will <i>not</i> be available to all sellers.</span> */
    #[Assert\Type('bool')]
    public ?bool $shippingPromotionOffered = null;

    /**
     * This array consists of the domestic or international shipping services options that are defined for the policy.
     * The shipping service options defined under this array should match what is set
     * in the corresponding shippingOptions.optionType field
     * (which controls whether domestic or international shipping service options are being defined).
     * If a shipping rate table is being used,
     * the specified shipping service options should also match the shipping rate table settings
     * (domestic or international, shipping speed/level of service, etc.)
     * Sellers can specify up to four domestic shipping services
     * and up to five international shipping service options by using separate shippingService containers for each.
     * If the seller is using the Global Shipping Program as an international option,
     * only a total of four international shipping service options (including GSP) can be offered.
     *  See "/api-docs/sell/static/seller-accounts/ht_shipping-setting-shipping-carrier-and-service-values.html".
     * To use the eBay standard envelope service (eSE),
     * see "/api-docs/sell/static/seller-accounts/using-the-ebay-standard-envelope-service.html"
     * This array is conditionally required
     * if the seller is offering one or more domestic and/or international shipping service options.
     * @var ShippingService[]
     */
    #[Assert\Type('array')]
    public ?array $shippingServices = null;
}
