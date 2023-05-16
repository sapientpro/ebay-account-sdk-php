<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * The response payload for the getFulfillmentPolicies method.
 * <span class="tablenote">Note: Pagination has not yet been enabled for getFulfillmentPolicies,
 * so all of the pagination-related fields are for future use.</span>
 */
class FulfillmentPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * A list of all of the seller's fulfillment policies defined for the specified marketplace.
     * This array will be returned as empty if no fulfillment policies are defined for the specified marketplace.
     * @var FulfillmentPolicy[]
     */
    public array $fulfillmentPolicies;

    /**
     * This field is for future use.
     */
    public ?string $href;

    /**
     * This field is for future use.
     */
    public ?int $limit;

    /**
     * This field is for future use.
     */
    public ?string $next;

    /**
     * This field is for future use.
     */
    public ?int $offset;

    /**
     * This field is for future use.
     */
    public ?string $prev;

    /**
     * The total number of fulfillment policies retrieved in the result set.
     * If no fulfillment policies are defined for the specified marketplace,
     * this field is returned with a value of <code>0</code>.
     */
    public ?int $total;
}
