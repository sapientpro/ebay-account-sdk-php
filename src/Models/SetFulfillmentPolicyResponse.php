<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;

/**
 * Complex type that that gets populated with a response containing a fulfillment policy.
 */
class SetFulfillmentPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container indicates whether the fulfillment business policy applies to motor vehicle listings,
     * or if it applies to non-motor vehicle listings.
     *
     * @var CategoryType[]
     */
    public array $categoryTypes;

    /** A seller-defined description of the fulfillment policy. This description is only for the seller's use, and is not exposed on any eBay pages. This field is returned if set for the policy. Max length: 250 */
    public ?string $description;

    /** If returned as <code>true</code>, the seller offers freight shipping. Freight shipping can be used for large items over 150 lbs. */
    public bool $freightShipping = false;

    /** A unique eBay-assigned ID for a fulfillment business policy. This ID is generated when the policy is created. */
    public string $fulfillmentPolicyId;

    /** If returned as <code>true</code>, the eBay Global Shipping Program will be used by the seller to ship items to international locations.<span class="tablenote">Note: On the US marketplace, the <em>Global Shipping Program</em> is scheduled to be replaced by a new intermediated international shipping program called <em>eBay International Shipping</em>. US sellers who are opted in to the Global Shipping Program will be automatically opted in to eBay International Shipping when it becomes available to them. All US sellers will be migrated by March 31, 2023. eBay International Shipping is an account level setting, and no field needs to be set in a Fulfillment business policy to enable it. As long as the US seller's account is opted in to eBay International Shipping, this shipping option will be enabled automatically for all listings where international shipping is available. A US seller who is opted in to eBay International Shipping can also specify individual international shipping service options for a Fulfillment business policy.</span> */
    public bool $globalShipping = false;

    /**
     * Specifies the maximum number of business days the seller commits to for preparing and shipping an order after receiving a cleared payment for the order.
     * This time does not include the transit time it takes the shipping carrier to deliver the order. <p>If only local pickup or freight shipping is available for the item, this container may not get returned.</p>
     *
     * @var TimeDuration|null
     */
    public ?TimeDuration $handlingTime;

    /** If returned as <code>true</code>, local pickup is available for this policy. */
    public bool $localPickup = false;

    /**
     * The ID of the eBay marketplace to which this fulfillment business policy applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this fulfillment business policy. Names must be unique for policies assigned to the same marketplace. Max length: 64 */
    public string $name;

    /** If returned as <code>true</code>, the seller offers the "Click and Collect" option. Currently, "Click and Collect" is available only to large retail merchants the eBay AU and UK marketplaces. */
    public bool $pickupDropOff = false;

    /**
     * This array is used to provide detailed information on the domestic and international shipping options
     * available for the policy.
     * A separate ShippingOption object covers domestic shipping service options
     * and international shipping service options (if the seller ships to international locations).
     * The optionType field indicates whether the ShippingOption object applies to domestic or international shipping,
     * and the costType field indicates whether flat-rate shipping or calculated shipping will be used.
     * <p>A separate ShippingServices object is used to specify cost and other details
     * for every available domestic and international shipping service option. </p>
     *
     * @var ShippingOption[]
     */
    public ?array $shippingOptions;

    /**
     * This container consists of the regionIncluded and regionExcluded containers,
     * which define the geographical regions/countries/states or provinces/domestic regions
     * where the seller does and doesn't ship to with this fulfillment policy.
     *
     * @var RegionSet|null
     */
    public ?RegionSet $shipToLocations;

    /**
     * An array of one or more errors or warnings that were generated during the processing of the request.
     * If there were no issues with the request, this array will return empty.
     *
     * @var Error[]
     */
    public array $warnings;
}
