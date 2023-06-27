<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Type used by the sellingLimit container,
 * a container that lists the monthly cap for the quantity of items sold
 * and total sales amount allowed for the seller's account.
 */
class SellingLimit implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container shows the monthly cap for total sales amount allowed for the seller's account.
     * This container may not be returned if a seller does not have a monthly cap for total sales amount.
     *
     * @var Amount|null
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $amount = null;

    /** This field shows the monthly cap for total quantity sold allowed for the seller's account. This container may not be returned if a seller does not have a monthly cap for total quantity sold. */
    #[Assert\Type('int')]
    public ?int $quantity = null;
}
