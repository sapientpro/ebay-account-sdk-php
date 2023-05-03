<?php

namespace EBay\Account\Enums;

/**
 * An enumerated type used to define whether the corresponding shipping service options are domestic or international shipping service options. a region that is either domestic (within the country from where the item is listed or shipped) or international (a country outside the country from where the item is listed or shipped).
 */
final class ShippingOptionTypeEnum
{
    /** @var string This value indicates that the corresponding shipping service options are domestic shipping service options. */
    public const DOMESTIC = 'DOMESTIC';
    /** @var string This value indicates that the corresponding shipping service options are international shipping service options. */
    public const INTERNATIONAL = 'INTERNATIONAL';
}
