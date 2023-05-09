<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

/**
 * This type is used by the request payload of the createCustomPolicy method
 * to define a new custom policy for a specific marketplace.
 */
class CustomPolicyCreateRequest implements EbayModelInterface
{
    use FillsModel;

    /**
     * Details of the seller's specific policy and terms for this policy.
     * Max length: 15,000
     */
    public string $description;

    /**
     * Customer-facing label shown on View Item pages for items to which the policy applies.
     * This seller-defined string is displayed as a system-generated hyperlink pointing to detailed policy information.
     * Max length: 65
     */
    public string $label;

    /**
     * The seller-defined name for the custom policy.
     * Names must be unique for policies assigned to the same seller, policy type, and eBay marketplace.
     * <span class="tablenote"><strong>Note:</strong> This field is visible only to the seller. </span>
     * Max length: 65
     */
    public string $name;

    /**
     * Specifies the type of custom policy being created.
     * Two Custom Policy types are supported:
     * <ul><li>Product Compliance (PRODUCT_COMPLIANCE)</li>
     * <li>Takeback (TAKE_BACK)</li></ul>
     * For implementation help,
     * refer to https://developer.ebay.com/api-docs/sell/account/types/api:CustomPolicyTypeEnum'
     */
    public string $policyType;
}
