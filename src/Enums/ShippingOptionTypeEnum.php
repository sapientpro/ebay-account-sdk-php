<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum ShippingOptionTypeEnum: string
{
    /** @var string This value indicates that the corresponding shipping service options are domestic shipping service options. */
    case DOMESTIC = 'DOMESTIC';

    /** @var string This value indicates that the corresponding shipping service options are international shipping service options. */
    case INTERNATIONAL = 'INTERNATIONAL';
}
