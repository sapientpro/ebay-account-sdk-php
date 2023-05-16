<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum SellerEligibilityEnum: string
{
    /**
     * This enum value indicates that the seller is eligible for the specified eBay advertising program.
     */
    case ELIGIBLE = 'ELIGIBLE';

    /**
     *
    This enum value indicates that the seller is ineligible for the specified eBay advertising program.
     */
    case INELIGIBLE = 'INELIGIBLE';
}
