<?php

namespace SapientPro\EbayAccountSDK\Models;

/**
 * A complex type that indicates a parameter that caused an error and the value of the parameter which caused the error.
 */
class ErrorParameter implements EbayModelInterface
{
    /**
     * Name of the parameter that caused the error.
     */
    public string $name;

    /**
     * The value of the parameter that caused the error.
     */
    public string $value;
}
