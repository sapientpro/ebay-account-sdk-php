<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\RecipientAccountReferenceTypeEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * <span class="tablenote">Note: This type is no longer applicable.
 * eBay now controls all electronic payment methods available for a marketplace,
 * and a seller never has to specify any electronic payment methods.</span>
 */
class RecipientAccountReference implements EbayModelInterface
{
    use FillsModel;

    /** <span class="tablenote">Note: DO NOT USE THIS FIELD. eBay now controls all electronic payment methods available for a marketplace, and a seller never has to specify any electronic payment methods.</span> */
    public string $referenceId;

    /**
     * <span class="tablenote">Note: DO NOT USE THIS FIELD.
     * eBay now controls all electronic payment methods available for a marketplace,
     * and a seller never has to specify any electronic payment methods.
     * </span> For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:RecipientAccountReferenceTypeEnum
     *
     * @var RecipientAccountReferenceTypeEnum
     */
    public RecipientAccountReferenceTypeEnum $referenceType;
}
