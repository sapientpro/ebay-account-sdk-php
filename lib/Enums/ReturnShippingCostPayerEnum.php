<?php

namespace EBay\Account\Enums;

/**
 * An enumerated type that is used to indicate who is responsible for the return shipping cost. Note that the seller is always responsible for the return shipping cost of SNAD-related returns.
 */
final class ReturnShippingCostPayerEnum
{
    /** @var string Return shipping cost paid by BUYER. */
    public const BUYER = 'BUYER';
    /** @var string Return shipping cost paid by SELLER. */
    public const SELLER = 'SELLER';
}
