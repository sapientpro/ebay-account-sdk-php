<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * The base response type of the getOptedInPrograms method.
 */
class Programs implements EbayModelInterface
{
    use FillsModel;

    /**
     * An array of seller programs that the seller's account is opted in to.
     * @var Program[]
     */
    public ?array $programs;
}
