<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\RegionTypeEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to define specific shipping regions.
 * There are four 'levels' of shipping regions, including large geographical regions
 * (like 'Asia', 'Europe', or 'Middle East'), individual countries, US states or Canadian provinces,
 * and special locations/domestic regions within a country (like 'Alaska/Hawaii' or 'PO Box').
 */
class Region implements EbayModelInterface
{
    use FillsModel;

    /** A string that indicates the name of a region, as defined by eBay. A "region" can be either a 'world region' (e.g., the "Middle East" or "Southeast Asia"), a country (represented with a two-letter country code), a state or province (represented with a two-letter code), or a special domestic region within a country. The GeteBayDetails call in the Trading API can be used to retrieve the world regions and special domestic regions within a specific country. To get these enumeration values, call GeteBayDetails with the DetailName value set to ExcludeShippingLocationDetails. */
    #[Assert\Type('string')]
    public ?string $regionName = null;

    /** Reserved for future use.
     * The region's type, which can be one of the following:
     * 'COUNTRY', 'COUNTRY_REGION', 'STATE_OR_PROVINCE', 'WORLD_REGION', or 'WORLDWIDE'.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:RegionTypeEnum
     *
     * @var RegionTypeEnum|null
     */
    #[Assert\Type(RegionTypeEnum::class)]
    public ?RegionTypeEnum $regionType = null;
}
