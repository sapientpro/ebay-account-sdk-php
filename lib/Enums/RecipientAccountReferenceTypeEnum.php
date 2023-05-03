<?php

namespace EBay\Account\Enums;

/**
 * Note: This type is no longer applicable. eBay now controls all electronic payment methods available for a marketplace, and a seller never has to specify any electronic payment methods, including PayPal.
 */
final class RecipientAccountReferenceTypeEnum
{
    /** @var string The PayPal email address of the seller. */
    public const PAYPAL_EMAIL = 'PAYPAL_EMAIL';
}
