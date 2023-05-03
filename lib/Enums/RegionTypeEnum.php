<?php

namespace EBay\Account\Enums;

/**
 * This enumerated type defines shipping region types.
 */
final class RegionTypeEnum
{
    /** @var string A single country. */
    public const COUNTRY = 'COUNTRY';
    /** @var string A domestic region or special location within a country. In the US, these domestic region/special location include 'Alaska/Hawaii' and 'PO Box'. */
    public const COUNTRY_REGION = 'COUNTRY_REGION';
    /** @var string A state or province, such as California (CA) or New York (NY) in the US, or British Columbia (BC) or Ontario (ON) in Canada. */
    public const STATE_OR_PROVINCE = 'STATE_OR_PROVINCE';
    /** @var string A world region, such as Europe, the Middle East, or Southeast Asia. */
    public const WORLD_REGION = 'WORLD_REGION';
    /** @var string The entire world as we know it. */
    public const WORLDWIDE = 'WORLDWIDE';
}
