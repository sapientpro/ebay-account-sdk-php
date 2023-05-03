<?php

namespace EBay\Account\Enums;

/**
 * The status of the present onboarding step.
 */
final class PaymentsProgramOnboardingStepStatus
{
    /** @var string This enumeration value indicates that the present step has not started. */
    public const NOT_STARTED = 'NOT_STARTED';
    /** @var string This enumeration value indicates that the present step has started but has not completed. */
    public const IN_PROGRESS = 'IN_PROGRESS';
    /** @var string This enumeration value indicates that the present step has completed. */
    public const COMPLETED = 'COMPLETED';
}
