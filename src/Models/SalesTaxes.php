<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This type is used by the root response of the getSalesTaxes method.
 */
class SalesTaxes implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of one or more sales tax rate entries for a specific marketplace
     * (or all applicable marketplaces if the country_code query parameter is not used.
     * If no sales tax rate entries are set up, no response payload is returned,
     * but only an HTTP status code of <code>204 No Content</code>.
     * @var SalesTax[]
     */
    public array $salesTaxes;
}
