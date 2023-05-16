<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CountryCodeEnum;
use SapientPro\EbayAccountSDK\Enums\ShippingOptionTypeEnum;

/**
 * This type is used to provide details about each shipping rate table that is returned in the getRateTables response.
 */
class RateTable implements EbayModelInterface
{
    use FillsModel;

    /**
     * A two-letter ISO 3166 country code representing the eBay marketplace where the shipping rate table is defined.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:CountryCodeEnum
     *
     * @var CountryCodeEnum
     */
    public CountryCodeEnum $countryCode;

    /**
     * This enumeration value returned here indicates whether the shipping rate table
     * is a domestic or international shipping rate table.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:ShippingOptionTypeEnum
     *
     * @var ShippingOptionTypeEnum
     */
    public ShippingOptionTypeEnum $locality;

    /** The seller-defined name for the shipping rate table. */
    public string $name;

    /** A unique eBay-assigned ID for a seller's shipping rate table. These rateTableId values are used to associate shipping rate tables to fulfillment business policies or directly to listings through an add/revise/relist call in the Trading API. */
    public string $rateTableId;
}
