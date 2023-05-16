<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This is the base response type of the getKYC method.
 *
 * @deprecated Will not be returned, see: https://developer.ebay.com/api-docs/sell/account/resources/kyc/methods/getKYC
 */
class KycResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This array contains one or more KYC checks required from a managed payments seller.
     * The seller may need to provide more documentation and/or information about themselves,
     * their company, or the bank account they are using for seller payouts.<br/><br/>
     * If no KYC checks are currently required from the seller, this array is not returned,
     * and the seller only receives a <code>204 No Content</code> HTTP status code.
     * @var KycCheck[]
     */
    public array $kycChecks;
}
