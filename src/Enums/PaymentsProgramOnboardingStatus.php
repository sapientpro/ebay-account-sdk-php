<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum PaymentsProgramOnboardingStatus: string
{
    /** @var string This enumeration value indicates that the seller can start or continue the onboarding process. When starting the onboarding process, the first step in the registration process is returned in the steps array with a status of NOT_STARTED. A link in the webUrl field opens a page for the seller to complete the first step. When the seller has completed all steps, the payments capability becomes available to the seller. */
    case ELIGIBLE_TO_ONBOARD = 'ELIGIBLE_TO_ONBOARD';

    /** @var string This enumeration value indicates that the seller's marketplace supports eBay managed payments, but the seller is not yet eligible. Eligibility is determined by eBay daily. Check onboardingStatus regularly. */
    case NOT_ELIGIBLE = 'NOT_ELIGIBLE';

    /** @var string This enumeration value indicates that the seller has completed all the necessary onboarding steps for eBay managed payments. The seller must wait for eBay to activate eBay managed payments for their account. */
    case PREBOARDED = 'PREBOARDED';

    /** @var string This enumeration value indicates that the seller is fully onboarded and that eBay managed payments has been activated on the seller's account. */
    case ONBOARDED = 'ONBOARDED';
}
