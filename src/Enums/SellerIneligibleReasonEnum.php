<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum SellerIneligibleReasonEnum: string
{
    /**
     * This enum value indicates that the seller is ineligible for the eBay advertising program due to lack of activity.
     * New accounts take a few weeks to become eligible for eBay Promoted Listings.
     * If the seller account is in good standing (Above Standard or Top Rated),
     * the account should become eligible within a few weeks.
     */
    case NOT_ENOUGH_ACTIVITY = 'NOT_ENOUGH_ACTIVITY';

    /**
     * This enum value indicates that the seller is ineligible for the eBay advertising program
     * because their account is not currently in good standing.
     * Below Standard sellers cannot use eBay advertising programs to create new campaigns
     * or edit their existing campaigns. Existing campaigns will be paused by the system.
     */
    case NOT_IN_GOOD_STANDING = 'NOT_IN_GOOD_STANDING';

    /**
     * This enum value indicates that the seller is ineligible for the eBay advertising program because their account
     * is not currently approved for the restricted program.
     * eBay is currently testing an advanced ads program with a small invite-only group.
     * More information will be shared when the program is ready for expansion.
     */
    case RESTRICTED = 'RESTRICTED';
}
