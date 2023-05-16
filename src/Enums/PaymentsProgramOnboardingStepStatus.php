<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum PaymentsProgramOnboardingStepStatus: string
{
    /** @var string This enumeration value indicates that the present step has not started. */
    case NOT_STARTED = 'NOT_STARTED';

    /** @var string This enumeration value indicates that the present step has started but has not completed. */
    case IN_PROGRESS = 'IN_PROGRESS';

    /** @var string This enumeration value indicates that the present step has completed. */
    case COMPLETED = 'COMPLETED';
}
