<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum RegionTypeEnum: string
{
    /** @var string A single country. */
    case COUNTRY = 'COUNTRY';

    /** @var string A domestic region or special location within a country. In the US, these domestic region/special location include 'Alaska/Hawaii' and 'PO Box'. */
    case COUNTRY_REGION = 'COUNTRY_REGION';

    /** @var string A state or province, such as California (CA) or New York (NY) in the US, or British Columbia (BC) or Ontario (ON) in Canada. */
    case STATE_OR_PROVINCE = 'STATE_OR_PROVINCE';

    /** @var string A world region, such as Europe, the Middle East, or Southeast Asia. */
    case WORLD_REGION = 'WORLD_REGION';

    /** @var string The entire world as we know it. */
    case WORLDWIDE = 'WORLDWIDE';
}
