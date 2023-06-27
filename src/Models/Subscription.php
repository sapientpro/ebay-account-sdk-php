<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\SubscriptionTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the <strong>getSubscription</strong> response container,
 * which defines the subscription types and levels for the seller account.
 */
class Subscription implements EbayModelInterface
{
    use FillsModel;

    /**
     * The marketplace with which the subscription is associated.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     *
     * @var MarketplaceIdEnum
     */
    #[Assert\Type(MarketplaceIdEnum::class)]
    public MarketplaceIdEnum $marketplaceId;

    /** The subscription ID. */
    #[Assert\Type('string')]
    public string $subscriptionId;

    /** The subscription level. For example, subscription levels for an eBay store include Starter, Basic, Featured, Anchor, and Enterprise levels. */
    #[Assert\Type('string')]
    public string $subscriptionLevel;

    /**
     * The kind of entity with which the subscription is associated, such as an eBay store.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:SubscriptionTypeEnum
     */
    #[Assert\Type(SubscriptionTypeEnum::class)]
    public SubscriptionTypeEnum $subscriptionType;

    /** The term of the subscription plan (typically in months). */
    #[Assert\Type(TimeDuration::class)]
    public TimeDuration $term;
}
