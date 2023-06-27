<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to provide sales tax settings for a specific tax jurisdiction.
 */
class SalesTax implements EbayModelInterface
{
    use FillsModel;

    /**
     * The country code enumeration value identifies the country to which this sales tax rate applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @var CountryCodeEnum|null
     */
    #[Assert\Type(CountryCodeEnum::class)]
    public ?CountryCodeEnum $countryCode = null;

    /** A unique ID that identifies the sales tax jurisdiction to which the sales tax rate applies (for example, a state within the United States). */
    #[Assert\Type('string')]
    public ?string $salesTaxJurisdictionId = null;

    /** The sales tax rate that will be applied to sales price. The shippingAndHandlingTaxed value will indicate whether or not sales tax is also applied to shipping and handling chargesAlthough it is a string, a percentage value is returned here, such as <code>7.75</code> */
    #[Assert\Type('string')]
    public ?string $salesTaxPercentage = null;

    /** If returned as <code>true</code>, sales tax is also applied to shipping and handling charges, and not just the total sales price of the order. */
    #[Assert\Type('bool')]
    public ?bool $shippingAndHandlingTaxed = null;
}
