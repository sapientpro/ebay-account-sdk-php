<?php

namespace EBay\Account\Enums;

/**
 * This enumerated type lists the return options (other than 'money back') that a seller may offer to the buyer for a return request.
 */
final class ReturnMethodEnum
{
    /** @var string This value indicates that the seller offers an exchange item as an alternative to 'money back' when the buyer is returning an item. */
    public const EXCHANGE = 'EXCHANGE';
    /** @var string This value indicates that the seller offers a replacement (identical) item as an alternative to 'money back' when the buyer is returning an item. */
    public const REPLACEMENT = 'REPLACEMENT';
}
