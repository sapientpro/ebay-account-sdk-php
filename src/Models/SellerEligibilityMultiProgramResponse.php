<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * The base response of the getAdvertisingEligibility method that contains the seller eligibility information for
 * one or more advertising programs.
 */
class SellerEligibilityMultiProgramResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of response fields that define the seller eligibility for eBay adverstising programs.
     * @var SellerEligibilityResponse[]
     */
    public array $advertisingEligibility;
}
