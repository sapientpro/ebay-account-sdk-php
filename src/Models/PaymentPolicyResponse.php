<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * The response payload for the getPaymentPolicies method.
 * <span class="tablenote">Note: Pagination has not yet been enabled for getPaymentPolicies,
 * so all of the pagination-related fields are for future use.</span>
 */
class PaymentPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /** This field is for future use. */
    public string $href;

    /** This field is for future use. */
    public int $limit;

    /** This field is for future use. */
    public string $next;

    /** This field is for future use. */
    public int $offset;

    /**
     * A list of all of the seller's payment business policies defined for the specified marketplace.
     * This array will be returned as empty if no payment business policies are defined for the specified marketplace.
     * @var PaymentPolicy[]
     */
    public array $paymentPolicies;

    /** This field is for future use. */
    public string $prev;

    /** The total number of payment business policies retrieved in the result set.  If no payment business policies are defined for the specified marketplace, this field is returned with a value of <code>0</code>. */
    public int $total;
}
