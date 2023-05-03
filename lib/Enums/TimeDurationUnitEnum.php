<?php

namespace EBay\Account\Enums;

/**
 * An enumerated type that specifies the time-measurement unit that's used to express a time span.
 */
final class TimeDurationUnitEnum
{
    /** @var string This value indicates that the time measurement unit used is based on a number of years. This enum is not currently used by the Account API. */
    public const YEAR = 'YEAR';
    /** @var string This value indicates that the time measurement unit used is based on a number of months. This enum is not currently used by the Account API. */
    public const MONTH = 'MONTH';
    /** @var string This value indicates that the time measurement unit used is based on a number of days. This enum is used for handling time in fulfillment business policies, for fullPaymentDueIn field for motor vehicle listing payment business policies, and for the return period for return business policies. */
    public const DAY = 'DAY';
    /** @var string This value indicates that the time measurement unit used is based on a number of hours. This enum is used for a motor vehicle deposit due date for motor vehicle listing payment business policies. */
    public const HOUR = 'HOUR';
    /** @var string This value indicates that the time measurement unit used is based on a number of calendar days, including Saturday and Sunday. This time measurement unit does not exclude holidays. This enum is not currently used by the Account API. */
    public const CALENDAR_DAY = 'CALENDAR_DAY';
    /** @var string This value indicates that the time measurement unit used is based on a number of business days or 'working days'. This generally excludes Sunday and all holidays (for the marketplace) in the time duration and, depending on the location, can include or exclude Saturday. This enum is not currently used by the Account API. */
    public const BUSINESS_DAY = 'BUSINESS_DAY';
    /** @var string This value indicates that the time measurement unit used is based on a number of minutes. This enum is not currently used by the Account API. */
    public const MINUTE = 'MINUTE';
    /** @var string This value indicates that the time measurement unit used is based on a number of seconds. This enum is not currently used by the Account API. */
    public const SECOND = 'SECOND';
    /** @var string This value indicates that the time measurement unit used is based on a number of milliseconds. This enum is not currently used by the Account API. */
    public const MILLISECOND = 'MILLISECOND';
}
