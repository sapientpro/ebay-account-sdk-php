<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CurrencyCodeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A complex type that describes the value of a monetary amount as represented by a global currency.
 * When passing in an amount in a request payload, both currency and value fields are required,
 * and both fields are also always returned for an amount in a response field.
 */
class Amount implements EbayModelInterface
{
    use FillsModel;

    /**
     * The base currency applied to the value field to establish a monetary amount.
     * The currency is represented as a 3-letter ISO 4217 currency code.
     * Default: The default currency of the eBay marketplace that hosts the listing.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/ba:CurrencyCodeEnum
     *
     * @var CurrencyCodeEnum|null
     */
    #[Assert\Type(CurrencyCodeEnum::class)]
    public ?CurrencyCodeEnum $currency = null;

    /**
     * The monetary amount in the specified currency.
     * @var string|null
     */
    #[Assert\Type('string')]
    public ?string $value = null;
}
