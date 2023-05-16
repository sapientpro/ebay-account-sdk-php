<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum RefundMethodEnum: string
{
    /**
     * @var string This enumeration value indicates that the seller offers a store/merchandise credit option to the buyer in addition to the 'money back' option. A 'money back' option is always available to buyers, even if the seller sets this value as the refundMethod in a return business policy.
     * This option is only available for 'Click and Collect' and 'Buy Online, Pick up in Store' orders.
     */
    case MERCHANDISE_CREDIT = 'MERCHANDISE_CREDIT';

    /** @var string This enumeration value indicates that the buyer will get their money back (refund) for a returned item. */
    case MONEY_BACK = 'MONEY_BACK';
}
