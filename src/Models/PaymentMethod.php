<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Enums\PaymentInstrumentBrandEnum;
use SapientPro\EbayAccountSDK\Enums\PaymentMethodTypeEnum;
use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the paymentMethods container,
 * which is used by the seller to specify one or more offline payment methods.
 * <span class="tablenote">Note: eBay now controls all electronic payment methods available for a marketplace,
 * so a seller will no longer use this type to specify any electronic payment methods.</span>
 */
class PaymentMethod implements EbayModelInterface
{
    use FillsModel;

    /**
     * <span class="tablenote">Note: This array is no longer applicable and should not be used.
     * eBay now controls all electronic payment methods available for a marketplace,
     * and a seller never has to specify any electronic payment methods, including any credit card brands accepted.
     * </span>
     * @var array<PaymentInstrumentBrandEnum>|null
     */
    #[Assert\Type('array')]
    public ?array $brands = null;

    /**
     * eBay now controls all electronic payment methods available for a marketplace,
     * so only offline payment method enum values may be used in this field,
     * and offline payment methods will only be applicable to listings that require or support offline payments.
     * See the PaymentMethodTypeEnum type for supported offline payment method enum values.
     * </p> For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:PaymentMethodTypeEnum
     *
     * @var PaymentMethodTypeEnum|null
     */
    #[Assert\Type(PaymentMethodTypeEnum::class)]
    public ?PaymentMethodTypeEnum $paymentMethodType = null;

    /**
     * <span class="tablenote">Note: This container is no longer applicable and should not be used.
     * eBay now controls all electronic payment methods available for a marketplace,
     * and a seller never has to specify any electronic payment methods, including PayPal.
     * </span>
     *
     * @var RecipientAccountReference|null
     */
    #[Assert\Type(RecipientAccountReference::class)]
    public ?RecipientAccountReference $recipientAccountReference = null;
}
