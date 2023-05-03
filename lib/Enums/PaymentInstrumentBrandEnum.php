<?php

namespace EBay\Account\Enums;

/**
 * An enum type defining the supported credit card brand names.
 */
final class PaymentInstrumentBrandEnum
{
    /** @var string  American Express */
    public const AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';
    /** @var string Discover card */
    public const DISCOVER = 'DISCOVER';
    /** @var string MasterCard */
    public const MASTERCARD = 'MASTERCARD';
    /** @var string Visa */
    public const VISA = 'VISA';
}
