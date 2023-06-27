<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\AdvertisingProgramEnum;
use SapientPro\EbayAccountSDK\Enums\SellerEligibilityEnum;
use SapientPro\EbayAccountSDK\Enums\SellerIneligibleReasonEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A type that is used to provide the seller's eligibility status for an eBay advertising program.
 */
class SellerEligibilityResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * The eBay advertising program for which a seller may be eligible.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/plser:AdvertisingProgramEnum
     *
     * @var AdvertisingProgramEnum
     */
    #[Assert\Type(AdvertisingProgramEnum::class)]
    public AdvertisingProgramEnum $programType;

    /**
     * The reason why a seller is ineligible for the specified eBay advertising program.
     * <br /><br />This field is only returned if the seller is ineligible for the eBay advertising program.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/plser:SellerIneligibleReasonEnum
     *
     * @var SellerIneligibleReasonEnum|null
     */
    #[Assert\Type(SellerIneligibleReasonEnum::class)]
    public ?SellerIneligibleReasonEnum $reason = null;

    /**
     * The seller elibibilty status for the specified eBay advertising program.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/cmlib:SellerEligibilityEnum
     *
     * @var SellerEligibilityEnum
     */
    #[Assert\Type(SellerEligibilityEnum::class)]
    public SellerEligibilityEnum $status;
}
