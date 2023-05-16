<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CustomPolicyTypeEnum;

/**
 * This container defines a seller's custom policy identified by policy ID for the selected eBay marketplace.
 * A successful call returns the requested policy information.
 */
class CustomPolicy implements EbayModelInterface
{
    use FillsModel;

    /**
     * The unique custom policy identifier for a policy.
     * <span class="tablenote"><strong>Note:</strong>
     * This value is automatically assigned by the system when the policy is created.
     * </span>
     */
    public string $customPolicyId;

    /**
     * Details of the seller's specific policy and terms associated with the policy.
     * Buyers access this information from the View Item page for items to which the policy has been applied.
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
     * Specifies the type of Custom Policy.
     * Two Custom Policy types are supported:
     * <ul><li>Product Compliance (PRODUCT_COMPLIANCE)</li>
     * <li>Takeback (TAKE_BACK)</li></ul>
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/account/types/api:CustomPolicyTypeEnum
     *
     * @var CustomPolicyTypeEnum
     */
    public CustomPolicyTypeEnum $policyType;
}
