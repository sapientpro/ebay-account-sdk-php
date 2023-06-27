<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\ReturnShippingCostPayerEnum;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\RefundMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnMethodEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the returnPolicy response container,
 * a container which defines a seller's return business policy for a specific marketplace.
 */
class ReturnPolicy implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container indicates which category group that the return policy applies to.
     * <span class="tablenote">Note: Return business policies are not applicable to motor vehicle listings,
     * so the categoryTypes.name value will always be <code>ALL_EXCLUDING_MOTORS_VEHICLES</code>
     * for return business policies.
     * </span>
     * @var CategoryType[]
     */
    #[Assert\Type('array')]
    public array $categoryTypes;

    /** A seller-defined description of the return business policy. This description is only for the seller's use, and is not exposed on any eBay pages.  Max length: 250 */
    #[Assert\Type('string')]
    public ?string $description = null;

    /** <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is deprecated, since eBay no longer supports extended holiday returns. Any value supplied in this field is neither read nor returned.</p> */
    #[Assert\Type('bool')]
    public ?bool $extendedHolidayReturnsOffered = null;

    /**
     * This container shows the seller's international return policy settings.
     * This container is only returned if the seller has set
     * a separate international return policy for the business policies.
     * International return policies are optional, even if the seller ships to international locations.
     * If a separate international return policy is not set,
     * all of the domestic return policy settings also apply to international orders.
     *
     * @var InternationalReturnOverrideType|null
     */
    #[Assert\Type(InternationalReturnOverrideType::class)]
    public ?InternationalReturnOverrideType $internationalOverride = null;

    /**
     * The ID of the eBay marketplace to which this return business policy applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    #[Assert\Type(MarketplaceIdEnum::class)]
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this payment business policy. Names must be unique for policies assigned to the same marketplace.Max length: 64 */
    #[Assert\Type('string')]
    public string $name;

    /**
     * If a seller indicates that they will accept buyer returns,
     * this value will be set to <code>MONEY_BACK</code>.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:RefundMethodEnum
     *
     * @var RefundMethodEnum
     */
    #[Assert\Type(RefundMethodEnum::class)]
    public RefundMethodEnum $refundMethod;

    /** <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is deprecated, since eBay no longer allows sellers to charge a restocking fee for buyer remorse returns. If this field is included, it is ignored and it is no longer returned.</p> */
    #[Assert\Type('string')]
    public ?string $restockingFeePercentage = null;

    /** This text-based field provides more details on seller-specified return instructions. This field is only returned if set for the return business policy. <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is no longer supported on many eBay marketplaces. To see if a marketplace and eBay category does support this field, call <a href="/api-docs/sell/metadata/resources/marketplace/methods/getReturnPolicies">getReturnPolicies</a> method of the Metadata API. Then you will look for the policyDescriptionEnabled field with a value of <code>true</code> for the eBay category.</span></p>Max length: 5000 (8000 for DE) */
    #[Assert\Type('string')]
    public ?string $returnInstructions = null;

    /**
     * This field is only returned if the seller is willing to offer
     * a replacement item as an alternative to 'Money Back'.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ReturnMethodEnum
     *
     * @var ReturnMethodEnum|null
     */
    #[Assert\Type(ReturnMethodEnum::class)]
    public ?ReturnMethodEnum $returnMethod = null;

    /**
     * This container indicates the number of calendar days that the buyer has to return an item.
     * The return period begins when the item is marked "delivered" at the buyer's specified ship-to location.
     * Most categories support 30-day and 60-day return periods.
     * <span class="tablenote">Note: Unless the seller has set a separate international return policy
     * through the internationalOverride container,
     * this return period will be valid for domestic and international returns (if the seller ships internationally).
     * </span>
     *
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $returnPeriod = null;

    /** A unique eBay-assigned ID for a return business policy. This ID is generated when the policy is created. */
    #[Assert\Type('string')]
    public string $returnPolicyId;

    /** If this field is returned as <code>true</code>, the seller accepts returns. <span class="tablenote"><strong>Note:</strong>Top-Rated sellers must accept item returns and the handlingTime should be set to zero days or one day for a listing to receive a Top-Rated Plus badge on the View Item or search result pages. For more information on eBay's Top-Rated seller program, see <a href="https://pages.ebay.com/help/sell/top-rated.html ">Becoming a Top Rated Seller and qualifying for Top Rated Plus benefits</a>.</span> */
    #[Assert\Type('bool')]
    public bool $returnsAccepted;

    /**
     * This field indicates who is responsible for paying for the shipping charges for returned items.
     * The field can be set to either <code>BUYER</code> or <code>SELLER</code>.
     * Depending on the return policy and specifics of the return,
     * either the buyer or the seller can be responsible for the return shipping costs.
     * Note that the seller is always responsible for return shipping costs for SNAD-related issues.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:ReturnShippingCostPayerEnum
     *
     * @var ReturnShippingCostPayerEnum
     */
    #[Assert\Type(ReturnShippingCostPayerEnum::class)]
    public ReturnShippingCostPayerEnum $returnShippingCostPayer;
}
