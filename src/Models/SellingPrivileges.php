<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the getPrivileges method.
 */
class SellingPrivileges implements EbayModelInterface
{
    use FillsModel;

    /** If this field is returned as <code>true</code>, the seller's registration is completed. If this field is returned as <code>false</code>, the registration process is not complete. */
    #[Assert\Type('bool')]
    public bool $sellerRegistrationCompleted;

    /** This container lists the monthly cap for the quantity of items sold and total sales amount allowed for the seller's account. This container may not be returned if a seller does not have a monthly cap for total quantity sold and total sales amount. */
    #[Assert\Type(SellingLimit::class)]
    public ?SellingLimit $sellingLimit = null;
}
