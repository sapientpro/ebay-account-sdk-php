<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base request of the createOrReplaceSalesTax.
 */
class SalesTaxBase implements EbayModelInterface
{
    use FillsModel;

    /** This field is used to set the sales tax rate for the tax jurisdiction set in the call URI. When applicable to an order, this sales tax rate will be applied to sales price. The shippingAndHandlingTaxed value will indicate whether or not sales tax is also applied to shipping and handling chargesAlthough it is a string, a percentage value is set here, such as <code>7.75</code>. */
    public string $salesTaxPercentage;

    /** This field is set to <code>true</code> if the seller wishes to apply sales tax to shipping and handling charges, and not just the total sales price of the order. Otherwise, this field's value should be set to <code>false</code>. */
    public bool $shippingAndHandlingTaxed;
}
