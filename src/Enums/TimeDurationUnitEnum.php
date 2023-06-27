<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum TimeDurationUnitEnum: string
{
    /** @var string This value indicates that the time measurement unit used is based on a number of years. This enum is not currently used by the Account API. */
    case YEAR = 'YEAR';

    /** @var string This value indicates that the time measurement unit used is based on a number of months. This enum is not currently used by the Account API. */
    case MONTH = 'MONTH';

    /** @var string This value indicates that the time measurement unit used is based on a number of days. This enum is used for handling time in fulfillment business policies, for fullPaymentDueIn field for motor vehicle listing payment business policies, and for the return period for return business policies. */
    case DAY = 'DAY';

    /** @var string This value indicates that the time measurement unit used is based on a number of hours. This enum is used for a motor vehicle deposit due date for motor vehicle listing payment business policies. */
    case HOUR = 'HOUR';

    /** @var string This value indicates that the time measurement unit used is based on a number of calendar days, including Saturday and Sunday. This time measurement unit does not exclude holidays. This enum is not currently used by the Account API. */
    case CALENDAR_DAY = 'CALENDAR_DAY';

    /** @var string This value indicates that the time measurement unit used is based on a number of business days or 'working days'. This generally excludes Sunday and all holidays (for the marketplace) in the time duration and, depending on the location, can include or exclude Saturday. This enum is not currently used by the Account API. */
    case BUSINESS_DAY = 'BUSINESS_DAY';

    /** @var string This value indicates that the time measurement unit used is based on a number of minutes. This enum is not currently used by the Account API. */
    case MINUTE = 'MINUTE';

    /** @var string This value indicates that the time measurement unit used is based on a number of seconds. This enum is not currently used by the Account API. */
    case SECOND = 'SECOND';

    /** @var string This value indicates that the time measurement unit used is based on a number of milliseconds. This enum is not currently used by the Account API. */
    case MILLISECOND = 'MILLISECOND';
}
