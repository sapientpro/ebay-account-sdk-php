<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum ReturnMethodEnum: string
{
    /** @var string This value indicates that the seller offers an exchange item as an alternative to 'money back' when the buyer is returning an item. */
    case EXCHANGE = 'EXCHANGE';

    /** @var string This value indicates that the seller offers a replacement (identical) item as an alternative to 'money back' when the buyer is returning an item. */
    case REPLACEMENT = 'REPLACEMENT';
}
