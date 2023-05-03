<?php

namespace EBay\Account\Enums;

/**
 * An enumeration type that defines the supported types of Custom Policies.
 */
final class CustomPolicyTypeEnum
{
    /** @var string This enumeration value indicates that the custom policy is a product compliance policy. */
    public const PRODUCT_COMPLIANCE = 'PRODUCT_COMPLIANCE';
    /** @var string This enumeration value indicates that the custom policy is a product takeback policy. */
    public const TAKE_BACK = 'TAKE_BACK';
}
