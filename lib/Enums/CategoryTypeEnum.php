<?php

namespace EBay\Account\Enums;

/**
 * An enum type that describes the category type (motor vehicles or non-motor vehicles).
 */
final class CategoryTypeEnum
{
    /** @var string This values indicates that the business policy applies to motor vehicle listings. */
    public const MOTORS_VEHICLES = 'MOTORS_VEHICLES';
    /** @var string This values indicates that the business policy applies to all listings besides motor vehicle listings. */
    public const ALL_EXCLUDING_MOTORS_VEHICLES = 'ALL_EXCLUDING_MOTORS_VEHICLES';
}
