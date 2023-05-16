<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

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
    public string $href;

    /** This field is for future use. */
    public int $limit;

    /** This field is for future use. */
    public string $next;

    /**
     * An array of subscriptions associated with the seller account.
     * @var Subscription[]
     */
    public array $subscriptions;

    /** The total number of subscriptions displayed on the current page of results. */
    public int $total;
}
