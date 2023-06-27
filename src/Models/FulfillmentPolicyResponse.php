<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

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
    #[Assert\Type('array')]
    public array $fulfillmentPolicies;

    /**
     * This field is for future use.
     */
    #[Assert\Type('string')]
    public ?string $href = null;

    /**
     * This field is for future use.
     */
    #[Assert\Type('int')]
    public ?int $limit = null;

    /**
     * This field is for future use.
     */
    #[Assert\Type('string')]
    public ?string $next = null;

    /**
     * This field is for future use.
     */
    #[Assert\Type('int')]
    public ?int $offset = null;

    /**
     * This field is for future use.
     */
    #[Assert\Type('string')]
    public ?string $prev = null;

    /**
     * The total number of fulfillment policies retrieved in the result set.
     * If no fulfillment policies are defined for the specified marketplace,
     * this field is returned with a value of <code>0</code>.
     */
    #[Assert\Type('int')]
    public ?int $total = null;
}
