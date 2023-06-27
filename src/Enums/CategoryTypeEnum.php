<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum CategoryTypeEnum: string
{
    /** @var string This values indicates that the business policy applies to motor vehicle listings. */
    case MOTORS_VEHICLES = 'MOTORS_VEHICLES';

    /** @var string This values indicates that the business policy applies to all listings besides motor vehicle listings. */
    case ALL_EXCLUDING_MOTORS_VEHICLES = 'ALL_EXCLUDING_MOTORS_VEHICLES';
}
