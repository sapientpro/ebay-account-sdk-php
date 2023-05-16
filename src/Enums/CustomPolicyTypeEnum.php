<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum CustomPolicyTypeEnum: string
{
    /** @var string This enumeration value indicates that the custom policy is a product compliance policy. */
    case PRODUCT_COMPLIANCE = 'PRODUCT_COMPLIANCE';

    /** @var string This enumeration value indicates that the custom policy is a product takeback policy. */
    case TAKE_BACK = 'TAKE_BACK';
}
