<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\MarketplaceIdEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramStatus;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramType;

/**
 * The response object containing the sellers status with regards to the specified payment program.
 */
class PaymentsProgramResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * The ID of the eBay marketplace to which the payment program applies.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
     */
    public MarketplaceIdEnum $marketplaceId;

    /**
     * This parameter specifies the payment program whose status is returned by the call.
     * Currently the only supported payments program is <code>EBAY_PAYMENTS</code>.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramType
     */
    public PaymentsProgramType $paymentsProgramType;

    /**
     * The enumeration value returned in this field indicates whether or not
     * the seller's account is enabled for the payments program.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramStatus
     */
    public PaymentsProgramStatus $status;

    /** If returned as <code>true</code>, the seller was at one point opted-in to the associated payment program, but they later opted out of the program. A value of <code>false</code> indicates the seller never opted-in to the program or if they did opt-in to the program, they never opted-out of it.  It's important to note that the setting of this field does not indicate the seller's current status regarding the payment program. It is possible for this field to return <code>true</code> while the status field returns <code>OPTED_IN</code>. */
    public bool $wasPreviouslyOptedIn;
}
