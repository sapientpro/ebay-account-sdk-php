<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum PaymentsProgramStatus: string
{
    /** @var string Status indicating the seller is opted-in to the associated payment program. */
    case OPTED_IN = 'OPTED_IN';

    /** @var string Status indicating the seller is not opted-in to the associated payment program. */
    case NOT_OPTED_IN = 'NOT_OPTED_IN';
}
