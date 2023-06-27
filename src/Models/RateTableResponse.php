<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is the base response of the getRateTables method.
 */
class RateTableResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of all shipping rate tables defined for a marketplace (or all marketplaces if no country_code query parameter is used).
     * This array will be returned as empty if the seller has no defined shipping rate tables for the specified marketplace.
     * @var RateTable[]
     */
    #[Assert\Type('array')]
    public array $rateTables;
}
