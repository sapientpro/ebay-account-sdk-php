<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The base response type of the getOptedInPrograms method.
 */
class Programs implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of seller programs that the seller's account is opted in to.
     * @var Program[]|null
     */
    #[Assert\Type('array')]
    public ?array $programs = null;
}
