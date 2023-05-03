<?php

namespace EBay\Account\Enums;

/**
 * An enumerated type defining the shipping cost models.
 */
final class ShippingCostTypeEnum
{
    /** @var string This value indicates that calculated shipping is used by the seller. With calculated shipping, the shipping cost varies according to the shipping location and the size and weight of the package. */
    public const CALCULATED = 'CALCULATED';
    /** @var string This value indicates that flat-rate shipping is used by the seller. With flat-rate shipping, the shipping cost will be the same for all buyers, or buyers within a specified region if the seller uses shipping rate tables. */
    public const FLAT_RATE = 'FLAT_RATE';
    /** @var string This value indicates that the shipping cost type has not been specified */
    public const NOT_SPECIFIED = 'NOT_SPECIFIED';
}
