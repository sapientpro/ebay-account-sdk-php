<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This root container defines a seller's payment business policy for a specific marketplace and category group.
 * This type is used when creating or updating a payment business policy.
 */
class PaymentPolicyRequest implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is used to specify whether the payment business policy applies to motor vehicle listings,
     * or if it applies to non-motor vehicle listings.
     * @var CategoryType[]
     */
    public array $categoryTypes;

    /**
     * This container is used if the seller wants to require an initial deposit on a motor vehicle listing.
     * In this container, the seller sets the deposit amount and the due date for the deposit.
     * Because eBay controls all electronic payment methods,
     * sellers do not need to specify a payment method and the deposit.paymentMethods array is not needed.
     * <p class="tablenote">Note: The 'due date' specified in the deposit container will be overridden
     * if the payment business policy requires immediate payment (in this case, for the deposit),
     * and the buyer commits to purchase the motor vehicle through a fixed-price listing
     * or through the 'Buy it Now' option of an auction listing.</p>
     *
     * @var Deposit|null
     */
    public ?Deposit $deposit;

    /** A seller-defined description of the payment business policy. This description is only for the seller's use, and is not exposed on any eBay pages.  Max length: 250 */
    public ?string $description;

    /**
     * This container is used to specify the number of days that a buyer has to make their full payment to the seller
     * and close the remaining balance on a motor vehicle transaction.
     * This container must be specified for motor vehicles listings.
     * The period starts when the buyer commits to buy.
     * The valid values, as specified with TimeDuration, are:
     * <ul><li><code>3 DAYS</code></li>
     * <li><code>7 DAYS</code> (the default)</li>
     * <li><code>10 DAYS</code></li><li><code>14 DAYS</code>
     * </li></ul>
     * In order for a buyer to make a full payment on a motor vehicle,
     * at least one of the following paymentMethods values must be specified
     * for the corresponding payment business policy: <ul> <li><code>CASH_ON_PICKUP</code></li>
     * <li><code>CASHIER_CHECK</code></li>
     * <li><code>MONEY_ORDER</code></li>
     * <li><code>PERSONAL_CHECK</code></li></ul>
     *
     * Default: <code>7 DAYS</code>
     *
     * @var TimeDuration|null
     */
    public ?TimeDuration $fullPaymentDueIn;

    /** This field should be included and set to <code>true</code> if the seller wants to require immediate payment from the buyer for: <ul><li>A fixed-price item</li><li>An auction item where the buyer is using the 'Buy it Now' option</li><li>A deposit for a motor vehicle listing</li></ul>Default: False */
    public bool $immediatePay = false;

    /**
     * The ID of the eBay marketplace to which this payment business policy applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    public MarketplaceIdEnum $marketplaceId;

    /** A seller-defined name for this payment business policy. Names must be unique for policies assigned to the same marketplace.Max length: 64 */
    public string $name;

    /** <p class="tablenote">Note: DO NOT USE THIS FIELD. Payment instructions are no longer supported by payment business policies.</p>A free-form string field that allows sellers to add detailed payment instructions to their listings. */
    public ?string $paymentInstructions;

    /**
     * <p class="tablenote">Note: This field applies only when the seller needs to specify one or more offline payment methods.
     * eBay now manages the electronic payment options available to buyers to pay for the item.</p>
     * This array is used to specify one or more offline payment methods that will be accepted for payment that occurs off of eBay's platform.
     * @var PaymentMethod[]
     */
    public ?array $paymentMethods;
}
