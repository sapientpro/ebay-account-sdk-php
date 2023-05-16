<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum ReturnShippingCostPayerEnum: string
{
    /** @var string Return shipping cost paid by BUYER. */
    case BUYER = 'BUYER';

    /** @var string Return shipping cost paid by SELLER. */
    case SELLER = 'SELLER';
}
