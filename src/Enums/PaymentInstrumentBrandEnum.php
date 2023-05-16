<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum PaymentInstrumentBrandEnum: string
{
    /** @var string  American Express */
    case AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';

    /** @var string Discover card */
    case DISCOVER = 'DISCOVER';

    /** @var string MasterCard */
    case MASTERCARD = 'MASTERCARD';

    /** @var string Visa */
    case VISA = 'VISA';
}
