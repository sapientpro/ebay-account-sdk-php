<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

class CustomPolicyRequest implements EbayModelInterface
{
    use FillsModel;

    /**
     * Details of the seller's specific policy and terms for this policy.
     *  Max length: 15,000
     */
    public string $description;

    /** Customer-facing label shown on View Item pages for items to which the policy applies.
     * This seller-defined string is displayed as a system-generated hyperlink pointing to detailed policy information.
     *  Max length: 65
     */
    public string $label;

    /**
     * The seller-defined name for the custom policy.
     * Names must be unique for policies assigned to the same seller, policy type, and eBay marketplace.
     * <span class="tablenote"><strong>Note:</strong> This field is visible only to the seller. </span>
     * Max length: 65
     */
    public string $name;
}
