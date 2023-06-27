<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnMethodEnum;
use SapientPro\EbayAccountSDK\Enums\ReturnShippingCostPayerEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\RefundMethodEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This root container defines a seller's return business policy for a specific marketplace and category group.
 * This type is used when creating or updating a return business policy.
 */
class ReturnPolicyRequest implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container indicates which category group that the return policy applies to.
     * <span class="tablenote">Note:
     * Return business policies are not applicable to motor vehicle listings,
     * so the categoryTypes.name value must be set to <code>ALL_EXCLUDING_MOTORS_VEHICLES</code>
     * for return business policies.</span>
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
     * This container is used by the seller to specify a separate international return policy.
     * If a separate international return policy is not defined by a seller,
     * all of the domestic return policy settings will also apply to international orders.
     *
     * @var InternationalReturnOverrideType|null
     */
    #[Assert\Type(InternationalReturnOverrideType::class)]
    public ?InternationalReturnOverrideType $internationalOverride = null;

    /**
     * The ID of the eBay marketplace to which this return business policy applies.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    #[Assert\Type(MarketplaceIdEnum::class)]
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this return business policy. Names must be unique for policies assigned to the same marketplace. Max length: 64 */
    #[Assert\Type('string')]
    public string $name;

    /**
     * This value indicates the refund method that will be used by the seller for buyer returns.
     * <p class="tablenote"><span  style="color: #dd1e31;">Important!</span>
     * If this field is not included in a return business policy, it will default to MONEY_BACK.</p>
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:RefundMethodEnum
     *
     * @var RefundMethodEnum|null
     */
    #[Assert\Type(RefundMethodEnum::class)]
    public ?RefundMethodEnum $refundMethod = null;

    /** <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is deprecated, since eBay no longer allows sellers to charge a restocking fee for buyer remorse returns. If this field is included, it is ignored.</p> */
    #[Assert\Type('string')]
    public ?string $restockingFeePercentage = null;

    /** This text-based field provides more details on seller-specified return instructions. <p class="tablenote"><span  style="color: #dd1e31;">Important!</span> This field is no longer supported on many eBay marketplaces. To see if a marketplace and eBay category does support this field, call <a href="/api-docs/sell/metadata/resources/marketplace/methods/getReturnPolicies">getReturnPolicies</a> method of the Metadata API. Then you will look for the policyDescriptionEnabled field with a value of <code>true</code> for the eBay category.</span></p>Max length: 5000 (8000 for DE) */
    #[Assert\Type('string')]
    public ?string $returnInstructions = null;

    /**
     * This field can be used if the seller is willing and able to offer
     * a replacement item as an alternative to 'Money Back'.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ReturnMethodEnum
     *
     * @var ReturnMethodEnum|null
     */
    #[Assert\Type(ReturnMethodEnum::class)]
    public ?ReturnMethodEnum $returnMethod = null;

    /**
     * This container is used to specify the number of days that the buyer has to return an item.
     * The return period begins when the item is marked "delivered" at the buyer's specified ship-to location.
     * You must set the value to one that's accepted by the marketplace and category where the item is listed.
     * Most categories support 30-day and 60-day return periods.
     * For a definitive list of return periods for one or more categories,
     * call "/api-docs/sell/metadata/resources/marketplace/methods/getReturnPolicies" method of the Metadata API.
     * The return period is set using the TimeDuration type,
     * where you set unit to <code>DAY</code> and value to either <code>30</code>
     * or <code>60</code> (or other value, as appropriate).
     * Note that this value cannot be modified if the listing has bids or sales, or if the listing ends within 12 hours.
     * <i>Required if </i> returnsAccepted is set to <code>true</code>.
     *
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $returnPeriod = null;

    /** If set to <code>true</code>, the seller accepts returns. <p><span class="tablenote"><strong>Note:</strong>Top-Rated sellers must accept item returns and the handlingTime should be set to zero days or one day for a listing to receive a Top-Rated Plus badge on the View Item or search result pages. For more information on eBay's Top-Rated seller program, see <a href="http://pages.ebay.com/help/sell/top-rated.html ">Becoming a Top Rated Seller and qualifying for Top Rated Plus benefits</a>.</span></p> */
    #[Assert\Type('bool')]
    public bool $returnsAccepted;

    /**
     * This field indicates who is responsible for paying for the shipping charges for returned items.
     * The field can be set to either <code>BUYER</code> or <code>SELLER</code>.
     * Depending on the return policy and specifics of the return,
     * either the buyer or the seller can be responsible for the return shipping costs.
     * Note that the seller is always responsible for return shipping costs for SNAD-related issues.
     * This field is conditionally required if returnsAccepted is set to <code>true</code>.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:ReturnShippingCostPayerEnum
     *
     * @var ReturnShippingCostPayerEnum
     */
    #[Assert\Type(ReturnShippingCostPayerEnum::class)]
    public ReturnShippingCostPayerEnum $returnShippingCostPayer;
}
