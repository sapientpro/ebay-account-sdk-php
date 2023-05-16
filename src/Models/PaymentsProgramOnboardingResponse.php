<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramOnboardingStatus;

/**
 * Type used by the payments program onboarding response
 */
class PaymentsProgramOnboardingResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This enumeration value indicates the eligibility of payment onboarding for the registered site.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramOnboardingStatus
     *
     * @var PaymentsProgramOnboardingStatus
     */
    public PaymentsProgramOnboardingStatus $onboardingStatus;

    /**
     * An array of the active process steps for payment onboarding and the status of each step.
     * This array includes the
     * step <strong>name</strong>,
     * step <strong>status</strong>,
     * and a <strong>webUrl</strong> to the <code>IN_PROGRESS</code> step.
     * The step names are returned in sequential order.
     * @var PaymentsProgramOnboardingSteps[]
     */
    public array $steps;
}
