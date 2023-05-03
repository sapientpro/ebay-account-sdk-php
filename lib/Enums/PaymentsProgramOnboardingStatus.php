<?php

namespace EBay\Account\Enums;

/**
 * This enumeration value indicates the eligibility of payment onboarding for the registered site.
 */
final class PaymentsProgramOnboardingStatus
{
    /** @var string This enumeration value indicates that the seller can start or continue the onboarding process. When starting the onboarding process, the first step in the registration process is returned in the steps array with a status of NOT_STARTED. A link in the webUrl field opens a page for the seller to complete the first step. When the seller has completed all steps, the payments capability becomes available to the seller. */
    public const ELIGIBLE_TO_ONBOARD = 'ELIGIBLE_TO_ONBOARD';
    /** @var string This enumeration value indicates that the seller's marketplace supports eBay managed payments, but the seller is not yet eligible. Eligibility is determined by eBay daily. Check onboardingStatus regularly. */
    public const NOT_ELIGIBLE = 'NOT_ELIGIBLE';
    /** @var string This enumeration value indicates that the seller has completed all the necessary onboarding steps for eBay managed payments. The seller must wait for eBay to activate eBay managed payments for their account. */
    public const PREBOARDED = 'PREBOARDED';
    /** @var string This enumeration value indicates that the seller is fully onboarded and that eBay managed payments has been activated on the seller's account. */
    public const ONBOARDED = 'ONBOARDED';
}
