<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramOnboardingStepStatus;

/**
 * The payments program onboarding steps, status, and link.
 */
class PaymentsProgramOnboardingSteps implements EbayModelInterface
{
    use FillsModel;

    /** The name of the step in the steps array. Over time, these names are subject to change as processes change. The output sample contains example step names. Review an actual call response for updated step names. */
    public ?string $name;

    /**
     * This enumeration value indicates the status of the associated step.
     * <p> <span class="tablenote"><strong>Note:</strong> Only one step can be <code>IN_PROGRESS</code> at a time.
     * </span></p>
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramOnboardingStepStatus
     *
     * @var PaymentsProgramOnboardingStepStatus|null
     */
    public ?PaymentsProgramOnboardingStepStatus $status;

    /** This URL provides access to the <code>IN_PROGRESS</code> step. */
    public string $webUrl;
}
