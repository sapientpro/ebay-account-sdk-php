<?php

namespace EBay\Account\Enums;

/**
 * An enumerated type defining the different possible statuses relating to whether or not a seller is opted-in to a payments program.
 */
final class PaymentsProgramStatus
{
    /** @var string Status indicating the seller is opted-in to the associated payment program. */
    public const OPTED_IN = 'OPTED_IN';
    /** @var string Status indicating the seller is not opted-in to the associated payment program. */
    public const NOT_OPTED_IN = 'NOT_OPTED_IN';
}
