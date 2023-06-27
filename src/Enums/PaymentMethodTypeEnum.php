<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum PaymentMethodTypeEnum: string
{
    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur in-person. */
    case CASH_IN_PERSON = 'CASH_IN_PERSON';

    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur after the item is delivered to the buyer. */
    case CASH_ON_DELIVERY = 'CASH_ON_DELIVERY';

    /** @var string This enumeration value indicates that the payment method will be cash, and the transaction will occur when the buyer picks up the item. */
    case CASH_ON_PICKUP = 'CASH_ON_PICKUP';

    /** @var string This enumeration value indicates that the payment method will be a Cashier Check. */
    case CASHIER_CHECK = 'CASHIER_CHECK';

    /** @var string This payment method is no longer valid. */
    case CREDIT_CARD = 'CREDIT_CARD';

    /** @var string This enumeration value indicates that escrow was used as the payment method to pay for the order. This form of payment is used for high-value orders. */
    case ESCROW = 'ESCROW';

    /** @var string This payment method is no longer valid. */
    case INTEGRATED_MERCHANT_CREDIT_CARD = 'INTEGRATED_MERCHANT_CREDIT_CARD';

    /** @var string This payment method is no longer valid. */
    case LOAN_CHECK = 'LOAN_CHECK';

    /** @var string This enumeration value indicates that the payment method will be by a Money Order. */
    case MONEY_ORDER = 'MONEY_ORDER';

    /** @var string This payment method is no longer valid. */
    case PAISA_PAY = 'PAISA_PAY';

    /** @var string This payment method is no longer valid. */
    case PAISA_PAY_ESCROW = 'PAISA_PAY_ESCROW';

    /** @var string This payment method is no longer valid. */
    case PAISA_PAY_ESCROW_EMI = 'PAISA_PAY_ESCROW_EMI';

    /** @var string This payment method is no longer valid. */
    case PAYPAL = 'PAYPAL';

    /** @var string This enumeration value indicates that the payment method will be a Personal check. */
    case PERSONAL_CHECK = 'PERSONAL_CHECK';

    /** @var string This enumeration value indicates that the seller is offering an offline payment method not otherwise covered. */
    case OTHER = 'OTHER';
}
