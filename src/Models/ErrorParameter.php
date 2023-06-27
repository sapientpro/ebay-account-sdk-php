<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A complex type that indicates a parameter that caused an error and the value of the parameter which caused the error.
 */
class ErrorParameter implements EbayModelInterface
{
    use FillsModel;

    /**
     * Name of the parameter that caused the error.
     */
    #[Assert\Type('string')]
    public ?string $name = null;

    /**
     * The value of the parameter that caused the error.
     */
    #[Assert\Type('string')]
    public ?string $value = null;
}
