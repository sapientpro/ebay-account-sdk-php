<?php

namespace EBay\Account\Enums;

/**
 * An enumeration type that defines the supported payment methods.
 */
final class PaymentMethodTypeEnum
{
    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur in-person. */
    public const CASH_IN_PERSON = 'CASH_IN_PERSON';
    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur after the item is delivered to the buyer. */
    public const CASH_ON_DELIVERY = 'CASH_ON_DELIVERY';
    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur when the buyer picks up the item. */
    public const CASH_ON_PICKUP = 'CASH_ON_PICKUP';
    /** @var string This enumeration value indicates that the payment method will be a Cashier Check. */
    public const CASHIER_CHECK = 'CASHIER_CHECK';
    /** @var string This payment method is no longer valid. */
    public const CREDIT_CARD = 'CREDIT_CARD';
    /** @var string This enumeration value indicates that escrow was used as the payment method to pay for the order. This form of payment is used for high-value orders. */
    public const ESCROW = 'ESCROW';
    /** @var string This payment method is no longer valid. */
    public const INTEGRATED_MERCHANT_CREDIT_CARD = 'INTEGRATED_MERCHANT_CREDIT_CARD';
    /** @var string This payment method is no longer valid. */
    public const LOAN_CHECK = 'LOAN_CHECK';
    /** @var string This enumeration value indicates that the payment method will be by a Money Order. */
    public const MONEY_ORDER = 'MONEY_ORDER';
    /** @var string This payment method is no longer valid. */
    public const PAISA_PAY = 'PAISA_PAY';
    /** @var string This payment method is no longer valid. */
    public const PAISA_PAY_ESCROW = 'PAISA_PAY_ESCROW';
    /** @var string This payment method is no longer valid. */
    public const PAISA_PAY_ESCROW_EMI = 'PAISA_PAY_ESCROW_EMI';
    /** @var string This payment method is no longer valid. */
    public const PAYPAL = 'PAYPAL';
    /** @var string This enumeration value indicates that the payment method will be a Personal check. */
    public const PERSONAL_CHECK = 'PERSONAL_CHECK';
    /** @var string This enumeration value indicates that the seller is offering an offline payment method not otherwise covered. */
    public const OTHER = 'OTHER';
}
