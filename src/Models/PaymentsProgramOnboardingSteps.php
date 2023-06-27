<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\PaymentsProgramOnboardingStepStatus;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The payments program onboarding steps, status, and link.
 */
class PaymentsProgramOnboardingSteps implements EbayModelInterface
{
    use FillsModel;

    /** The name of the step in the steps array. Over time, these names are subject to change as processes change. The output sample contains example step names. Review an actual call response for updated step names. */
    #[Assert\Type('string')]
    public ?string $name = null;

    /**
     * This enumeration value indicates the status of the associated step.
     * <p> <span class="tablenote"><strong>Note:</strong> Only one step can be <code>IN_PROGRESS</code> at a time.
     * </span></p>
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramOnboardingStepStatus
     *
     * @var PaymentsProgramOnboardingStepStatus|null
     */
    #[Assert\Type(PaymentsProgramOnboardingStepStatus::class)]
    public ?PaymentsProgramOnboardingStepStatus $status = null;

    /** This URL provides access to the <code>IN_PROGRESS</code> step. */
    #[Assert\Type('string')]
    public string $webUrl;
}
