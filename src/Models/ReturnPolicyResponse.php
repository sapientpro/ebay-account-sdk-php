<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The response payload for the getReturnPolicies method.
 * <span class="tablenote">Note: Pagination has not yet been enabled for getReturnPolicies,
 * so all of the pagination-related fields are for future use.</span>
 */
class ReturnPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /** This field is for future use. */
    #[Assert\Type('string')]
    public ?string $href = null;

    /** This field is for future use. */
    #[Assert\Type('int')]
    public ?int $limit = null;

    /** This field is for future use. */
    #[Assert\Type('string')]
    public ?string $next = null;

    /** This field is for future use. */
    #[Assert\Type('int')]
    public ?int $offset = null;

    /** This field is for future use. */
    #[Assert\Type('string')]
    public ?string $prev = null;

    /**
     * A list of all of the seller's return business policies defined for the specified marketplace.
     * This array will be returned as empty if no return business policies are defined for the specified marketplace.
     * @var ReturnPolicy[]
     */
    #[Assert\Type('array')]
    public array $returnPolicies;

    /** The total number of return business policies retrieved in the result set.  If no return business policies are defined for the specified marketplace, this field is returned with a value of <code>0</code>. */
    #[Assert\Type('int')]
    public int $total;
}
