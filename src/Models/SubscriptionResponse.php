<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the response payload for the getSubscription method.
 * <span class="tablenote">Note:
 * Pagination has not yet been enabled for getSubscription,
 * so all of the pagination-related fields are for future use.</span>
 */
class SubscriptionResponse implements EbayModelInterface
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

    /**
     * An array of subscriptions associated with the seller account.
     * @var Subscription[]
     */
    #[Assert\Type('array')]
    public array $subscriptions;

    /** The total number of subscriptions displayed on the current page of results. */
    #[Assert\Type('int')]
    public int $total;
}
