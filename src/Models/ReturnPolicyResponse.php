<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * The response payload for the getReturnPolicies method.
 * <span class="tablenote">Note: Pagination has not yet been enabled for getReturnPolicies,
 * so all of the pagination-related fields are for future use.</span>
 */
class ReturnPolicyResponse implements EbayModelInterface
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

    /** This field is for future use. */
    public string $prev;

    /**
     * A list of all of the seller's return business policies defined for the specified marketplace.
     * This array will be returned as empty if no return business policies are defined for the specified marketplace.
     * @var ReturnPolicy[]
     */
    public array $returnPolicies;

    /** The total number of return business policies retrieved in the result set.  If no return business policies are defined for the specified marketplace, this field is returned with a value of <code>0</code>. */
    public int $total;
}
