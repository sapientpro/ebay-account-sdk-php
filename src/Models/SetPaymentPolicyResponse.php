<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Complex type that that gets populated with a response containing a payment policy.
 */
class SetPaymentPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container indicates whether the payment business policy applies to motor vehicle listings,
     * or if it applies to non-motor vehicle listings.
     * @var CategoryType[]
     */
    #[Assert\Type('array')]
    public array $categoryTypes;

    /**
     * This container is only returned if the seller just created or updated a motor vehicles payment business policy
     * and requires buyers to pay an initial deposit after they commit to buying a motor vehicle.
     *
     * @var Deposit|null
     */
    #[Assert\Type(Deposit::class)]
    public ?Deposit $deposit = null;

    /** A seller-defined description of the payment business policy. This description is only for the seller's use, and is not exposed on any eBay pages. This field is returned if set for the policy. Max length: 250 */
    #[Assert\Type('string')]
    public ?string $description = null;

    /**
     * The number of days (after the buyer commits to buy)
     * that a buyer has to pay the remaining balance of a motor vehicle transaction.
     * Sellers can set this value to 3, 7, 10, or 14 days.
     * <p class="tablenote">Note: This value is always returned if categoryTypes is set to <code>MOTORS_VEHICLES</code>.
     * </p>
     *
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $fullPaymentDueIn = null;

    /** The value returned in this field will reflect the value set by the seller in the immediatePay request field. A value of <code>true</code> indicates that immediate payment is required from the buyer for: <ul><li>A fixed-price item</li><li>An auction item where the buyer is using the 'Buy it Now' option</li><li>A deposit for a motor vehicle listing</li></ul>It is possible for the seller to set this field as <code>true</code> in the payment business policy, but it will not apply in some scenarios. For example, immediate payment is not applicable for auction listings that have a winning bidder, for buyer purchases that involve the Best Offer feature, or for transactions that happen offline between the buyer and seller. */
    #[Assert\Type('bool')]
    public bool $immediatePay;

    /**
     * The ID of the eBay marketplace to which this payment business policy applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    #[Assert\Type(MarketplaceIdEnum::class)]
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this payment business policy. Names must be unique for policies assigned to the same marketplace.Max length: 64 */
    #[Assert\Type('string')]
    public string $name;

    /** <p class="tablenote">Note: NO LONGER SUPPORTED. Although this field may be returned for some older payment business policies, payment instructions are no longer supported by payment business policies. If this field is returned, it can be ignored and these payment instructions will not appear in any listings that use the corresponding business policy.</p>A free-form string field that allows sellers to add detailed payment instructions to their listings. */
    #[Assert\Type('string')]
    public ?string $paymentInstructions = null;

    /**
     * This array shows the available payment methods that the seller has set for the payment business policy.
     * Sellers do not have to specify any electronic payment methods for listings,
     * so this array will often be returned empty unless the payment business policy is intended for
     * motor vehicle listings or other items in categories where offline payments are required or supported.
     * @var PaymentMethod[]
     */
    #[Assert\Type('array')]
    public array $paymentMethods;

    /** A unique eBay-assigned ID for a payment business policy. This ID is generated when the policy is created. */
    #[Assert\Type('string')]
    public string $paymentPolicyId;

    /**
     * An array of one or more errors or warnings that were generated during the processing of the request.
     * If there were no issues with the request, this array will return empty.
     * @var Error[]
     */
    #[Assert\Type('array')]
    public array $warnings;
}
