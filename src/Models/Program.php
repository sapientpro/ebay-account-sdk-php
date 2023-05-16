<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\ProgramTypeEnum;

/**
 * A seller program in to which a seller can opt-in.
 */
class Program implements EbayModelInterface
{
    use FillsModel;

    /**
     * A seller program in to which a seller can opt-in.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:ProgramTypeEnum
     *
     * @var ProgramTypeEnum|null
     */
    public ?ProgramTypeEnum $programType;
}
