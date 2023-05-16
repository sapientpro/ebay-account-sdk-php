<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This type is used to specify/indicate that an initial deposit is required for a motor vehicle listing.
 */
class Deposit implements EbayModelInterface
{
    use FillsModel;

    /**
     * This value indicates the initial deposit amount required from the buyer in order to purchase a motor vehicle.
     * This value can be as high as $2,000.00 if immediate payment is not required,
     * and up to $500.00 if immediate payment is required.
     * Max: <code>2000.0</code>
     *
     * @var Amount|null
     */
    public ?Amount $amount;

    /**
     * This value indicates the number of hours that the buyer has (after they commit to buy) to pay the initial deposit on a motor vehicle.
     * Valid dueIn times are 24, 48, and 72 hours.
     * <code>HOUR</code> is set as the unit value, and <code>24</code>, <code>48</code> or <code>72</code> are set in the value field.
     * <span class="tablenote">Note: The dueIn value is overridden if the seller has set the motor vehicle listing to require immediate payment.
     * If the listing requires immediate payment, the buyer must pay the deposit immediately in order to be eligible to purchase the motor vehicle.
     * </span>Min=24 (hours)Max=72 (hours), Default=48 (hours)
     *
     * @var TimeDuration|null
     */
    public ?TimeDuration $dueIn;

    /**
     * This array is no longer applicable and should not be used since eBay now manages the electronic payment options available to buyers to pay the deposit.
     * @var PaymentMethod[]
     */
    public array $paymentMethods;
}
