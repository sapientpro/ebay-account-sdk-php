<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the paymentPolicy response container,
 * a container which defines a seller's payment business policy for a specific marketplace.
 */
class PaymentPolicy implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container indicates whether the fulfillment policy applies to motor vehicle listings,
     * or if it applies to non-motor vehicle listings.
     * @var CategoryType[]
     */
    #[Assert\Type('array')]
    public array $categoryTypes;

    /**
     * This container is applicable only if the categoryTypes.name field is set to
     * <code>MOTORS_VEHICLES</code>,
     * and is only returned if the seller requires an initial deposit on motor vehicles.
     * The container shows the amount due for the deposit and when it is due
     * (within 1-3 days after commitment to purchase, unless the listing requires immediate payment).
     * <p class="tablenote">Note: The due date that is specified in the deposit container
     * will be overridden if the payment business policy requires immediate payment
     * (in this case, for the deposit),
     * and the buyer commits to purchasing the motor vehicle through a fixed-price listing
     * or through the 'Buy it Now' option of an auction listing. </p>
     *
     * @var Deposit|null
     */
    #[Assert\Type(Deposit::class)]
    public ?Deposit $deposit = null;

    /** A seller-defined description of the payment policy. This description is only for the seller's use, and is not exposed on any eBay pages.  Max length: 250 */
    #[Assert\Type('string')]
    public ?string $description = null;

    /**
     * This container applies to motor vehicles listings only and indicates when a final payment for the vehicle is due.
     * This value is always returned if categoryTypes is set to <code>MOTORS_VEHICLES</code>.
     * This container indicates the number of days that a buyer has to make their full payment to the seller
     * and close the remaining balance on a motor vehicle transaction.
     * The period starts when the buyer commits to buy.
     * The valid values, as specified with TimeDuration, are:
     * <ul><li>3 DAYS</li>
     * <li>7 DAYS (the default)</li>
     * <li>10 DAYS</li>
     * <li>14 DAYS</li></ul>
     * A <code>MOTORS_VEHICLES</code>) payment business policy must specify
     * at least one of the following paymentMethods values for the final payment:
     * <ul> <li>CASH_ON_PICKUP
     * <span class="tablenote">Note: This payment method is only available to sellers outside the US.</span>
     * </li> <li>CASHIER_CHECK</li>
     * <li>MONEY_ORDER</li>
     * <li>PERSONAL_CHECK</li></ul>
     *
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $fullPaymentDueIn = null;

    /** If this field is returned as <code>true</code>, immediate payment is required from the buyer for: <ul><li>A fixed-price item</li><li>An auction item where the buyer uses the 'Buy it Now' option</li><li>A deposit for a motor vehicle listing</li></ul>It is possible for the seller to set this field as <code>true</code> in the payment business policy, but it will not apply in some scenarios. For example, immediate payment is not applicable for auction listings that have a winning bidder, for buyer purchases that involve the Best Offer feature, or for transactions that happen offline between the buyer and seller. */
    #[Assert\Type('bool')]
    public bool $immediatePay;

    /** The ID of the eBay marketplace to which the payment business policy applies. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum'>eBay API documentation</a> */
    #[Assert\Type(MarketplaceIdEnum::class)]
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this fulfillment policy. Names must be unique for policies assigned to the same marketplace. Max length: 64 */
    #[Assert\Type('string')]
    public string $name;

    /** Although this field may be returned for some older payment business policies, payment instructions are no longer supported by payment business policies. If this field is returned, it can be ignored and these payment instructions will not appear in any listings that use the corresponding business policy. Max length: 1000 */
    #[Assert\Type('string')]
    public ?string $paymentInstructions = null;

    /**
     * This container is returned to show the payment methods that are accepted for the payment business policy.
     * Sellers do not have to specify any electronic payment methods for listings,
     * so this array will often be returned empty unless the payment business policy is intended
     * for motor vehicle listings or other items in categories where offline payments are required or supported.
     * @var PaymentMethod[]
     */
    #[Assert\Type('array')]
    public array $paymentMethods;

    /** A unique eBay-assigned ID for a payment business policy. This ID is generated when the policy is created. */
    #[Assert\Type('string')]
    public string $paymentPolicyId;
}
