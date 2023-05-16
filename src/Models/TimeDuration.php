<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\TimeDurationUnitEnum;

/**
 * A type used to specify a period of time using a specified time-measurement unit.
 * Payment, return, and fulfillment business policies all use this type to specify time windows.
 * Whenever a container that uses this type is used in a request, both of these fields are required.
 * Similarly, whenever a container that uses this type is returned in a response,
 * both of these fields are always returned.
 */
class TimeDuration implements EbayModelInterface
{
    use FillsModel;

    /**
     * These enum values represent the time measurement unit, such as <code>DAY</code>.
     * A span of time is defined when you apply the value specified in the value field to the value specified for unit.
     * See TimeDurationUnitEnum for a complete list of possible time-measurement units.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:TimeDurationUnitEnum
     *
     * @var TimeDurationUnitEnum
     */
    public TimeDurationUnitEnum $unit;

    /** An integer that represents an amount of time, as measured by the time-measurement unit specified in the unit field. */
    public int $value;
}
