<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\RefundMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnShippingCostPayerEnum;

/**
 * A complex type that is populated with a response containing a return policies.
 */
class SetReturnPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This field always returns <code>ALL_EXCLUDING_MOTORS_VEHICLES</code>
     * for return business policies, since return business policies are not applicable to motor vehicle listings.
     * @var CategoryType[]
     */
    public array $categoryTypes;

    /** A seller-defined description of the return business policy. This description is only for the seller's use, and is not exposed on any eBay pages. This field is returned if set for the policy. Max length: 250 */
    public ?string $description;

    /** <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is deprecated, since eBay no longer supports extended holiday returns. This field should no longer be returned.</p> */
    public ?bool $extendedHolidayReturnsOffered;

    /**
     * This container is used by the seller to specify a separate  international return policy,
     * and will only be returned if the seller has set a separate return policy for international orders.
     * If a separate international return policy is not defined by a seller,
     * all of the domestic return policy settings will also apply to international orders.
     *
     * @var InternationalReturnOverrideType|null
     */
    public ?InternationalReturnOverrideType $internationalOverride;

    /**
     * The ID of the eBay marketplace to which this return business policy applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this return business policy. Names must be unique for policies assigned to the same marketplace.Max length: 64 */
    public string $name;

    /**
     * If a seller indicates that they will accept buyer returns, this value will be <code>MONEY_BACK</code>.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:RefundMethodEnum
     *
     * @var RefundMethodEnum|null
     */
    public ?RefundMethodEnum $refundMethod;

    /** <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is deprecated, since eBay no longer allows sellers to charge a restocking fee for buyer remorse returns.</p> */
    public ?string $restockingFeePercentage;

    /** This text-based field provides more details on seller-specified return instructions. <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is no longer supported on many eBay marketplaces. To see if a marketplace and eBay category does support this field, call <a href="/api-docs/sell/metadata/resources/marketplace/methods/getReturnPolicies">getReturnPolicies</a> method of the Metadata API. Then you will look for the policyDescriptionEnabled field with a value of <code>true</code> for the eBay category.</span></p>Max length: 5000 (8000 for DE) */
    public ?string $returnInstructions;

    /**
     * This field will be returned if the seller is willing and able to offer a replacement item
     * as an alternative to 'Money Back'.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ReturnMethodEnum
     *
     * @var ReturnMethodEnum|null
     */
    public ?ReturnMethodEnum $returnMethod;

    /**
     * This container specifies the amount of days that the buyer has to return the item after receiving it.
     * The return period begins when the item is marked "delivered" at the buyer's specified ship-to location.
     * This container will be returned unless the business policy states that the seller does not accept returns.
     *
     * @var TimeDuration|null
     */
    public ?TimeDuration $returnPeriod;

    /** A unique eBay-assigned ID for a return business policy. This ID is generated when the policy is created. */
    public string $returnPolicyId;

    /** If set to <code>true</code>, the seller accepts returns. If set to <code>false</code>, this field indicates that the seller does not accept returns. */
    public bool $returnsAccepted;

    /**
     * This field indicates who is responsible for paying for the shipping charges for returned items.
     * The field can be set to either <code>BUYER</code> or <code>SELLER</code>.
     * Note that the seller is always responsible for return shipping costs for SNAD-related issues.
     * This container will be returned unless the business policy states that the seller does not accept returns.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:ReturnShippingCostPayerEnum
     */
    public ?ReturnShippingCostPayerEnum $returnShippingCostPayer;

    /**
     * An array of one or more errors or warnings that were generated during the processing of the request.
     * If there were no issues with the request, this array will return empty.
     * @var Error[]
     */
    public array $warnings;
}
