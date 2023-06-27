<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type consists of the regionIncluded and regionExcluded arrays, which indicate the areas to where the seller does and doesn't ship.
 */
class RegionSet implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of one or more regionName values that specify the areas to where a seller does not ship.
     * A regionExcluded list should only be set in the top-level shipToLocations container
     * and not within the shippingServices.shipToLocations container used to specify which shipping regions are serviced by each available shipping service option.
     * <p>Many sellers are willing to ship to many international locations,
     * but they may want to exclude some world regions or some countries as places they are willing to ship to.
     * This array will be returned as empty if no shipping regions are excluded with the fulfillment business policy.
     * <span class="tablenote">Note:
     * The regionExcluded array is not applicable for motor vehicle business policies on the US, CA, or UK marketplaces.
     * If this array is used in a createFulfillmentPolicy or updateFulfillmentPolicy request, it will be ignored.</span>
     * @var Region[]
     */
    #[Assert\Type('array')]
    public array $regionExcluded;

    /**
     * An array of one or more regionName fields that specify the areas to where a seller ships.
     * Each eBay marketplace supports its own set of allowable shipping locations.
     * <span class="tablenote">Note:
     * The regionIncluded array is not applicable for motor vehicle business policies on the US, CA, or UK marketplaces.
     * If this array is used in a createFulfillmentPolicy or updateFulfillmentPolicy request, it will be ignored.</span>
     * @var Region[]
     */
    #[Assert\Type('array')]
    public array $regionIncluded;
}
