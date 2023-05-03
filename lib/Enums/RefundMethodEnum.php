<?php

namespace EBay\Account\Enums;

/**
 * An enumerated defining the supported refund types for buyer returnes
 */
final class RefundMethodEnum
{
    /**
     * @var string This enumeration value indicates that the seller offers a store/merchandise credit option to the buyer in addition to the 'money back' option. A 'money back' option is always available to buyers, even if the seller sets this value as the refundMethod in a return business policy.
     * This option is only available for 'Click and Collect' and 'Buy Online, Pick up in Store' orders.
     */
    public const MERCHANDISE_CREDIT = 'MERCHANDISE_CREDIT';

    /** @var string This enumeration value indicates that the buyer will get their money back (refund) for a returned item. */
    public const MONEY_BACK = 'MONEY_BACK';
}
