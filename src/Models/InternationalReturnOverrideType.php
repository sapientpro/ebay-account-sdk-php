<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\ReturnMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnShippingCostPayerEnum;

/**
 * This type defines the fields for a seller's international return policy.
 * Sellers have the ability to set separate domestic and international return policies,
 * but if an international return policy is not set,
 * the same return policy settings specified for the domestic return policy are also used
 * for returns for international buyers.
 */
class InternationalReturnOverrideType implements EbayModelInterface
{
    use FillsModel;

    /**
     * This field sets/indicates if the seller offers replacement items to the buyer
     * in the case of an international return.
     * The buyer must be willing to accept a replacement item; otherwise,
     * the seller will need to issue a refund for a return.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ReturnMethodEnum
     *
     * @var ReturnMethodEnum|null
     */
    public ?ReturnMethodEnum $returnMethod;

    /**
     * This container indicates the number of calendar days that the buyer has to return an item.
     * The return period begins when the item is marked "delivered" at the buyer's specified ship-to location.
     * You must set the value to one that's accepted by the marketplace and category where the item is listed.
     * Most categories support 30-day and 60-day return periods.
     * For a definitive list of return periods for one or more categories,
     * call "/api-docs/sell/metadata/resources/marketplace/methods/getReturnPolicies" method of the Metadata API.
     * The TimeDuration type is used to set/indicate the return period,
     * and you set the unit value to <code>DAY</code>
     * and the value field to either <code>30</code or <code>60</code> (or other value, as appropriate).
     * Note that this value cannot be modified if the listing has bids or sales, or if the listing ends within 12 hours.
     * This field is conditionally required if the internationalOverride.returnsAccepted field is set to true.
     *
     * @var TimeDuration|null
     */
    public ?TimeDuration $returnPeriod;

    /** If set to <code>true</code>, the seller accepts international returns. If set to <code>false</code>, the seller does not accept international returns.  This field is conditionally required if the seller chooses to have a separate international return policy. */
    public ?bool $returnsAccepted;

    /**
     * This field indicates who is responsible for paying for the shipping charges for returned items.
     * The field can be set to either <code>BUYER</code> or <code>SELLER</code>.
     * Depending on the return policy and specifics of the return,
     * either the buyer or the seller can be responsible for the return shipping costs.
     * Note that the seller is always responsible for return shipping costs for 'significantly not as described' issues.
     * This field is conditionally required if the internationalOverride.returnsAccepted field is set to true.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:ReturnShippingCostPayerEnum
     *
     * @var ReturnShippingCostPayerEnum|null
     */
    public ?ReturnShippingCostPayerEnum $returnShippingCostPayer;
}
