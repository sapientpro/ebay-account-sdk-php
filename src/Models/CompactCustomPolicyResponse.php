<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CustomPolicyTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The response payload for requests that return a list of custom policies.
 */
class CompactCustomPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * The unique custom policy identifier for the policy being returned.
     * <span class="tablenote"><strong>Note:</strong>
     * This value is automatically assigned by the system when the policy is created.
     * </span>
     */
    #[Assert\Type('string')]
    public string $customPolicyId;

    /**
     * Customer-facing label shown on View Item pages for items to which the policy applies.
     * This seller-defined string is displayed as a system-generated hyperlink pointing to detailed policy information.
     * Max length: 65
     */
    #[Assert\Type('string')]
    public string $label;

    /**
     * The seller-defined name for the custom policy.
     * Names must be unique for policies assigned to the same seller, policy type, and eBay marketplace.
     * <span class="tablenote"><strong>Note:</strong> This field is visible only to the seller. </span>Max length: 65
     */
    #[Assert\Type('string')]
    public string $name;

    /** Specifies the type of Custom Policy being returned.
     * Two Custom Policy types are supported:
     * <ul><li>Product Compliance (PRODUCT_COMPLIANCE)</li>
     * <li>Takeback (TAKE_BACK)</li></ul>
     * For implementation help,
     * refer to https://developer.ebay.com/api-docs/sell/account/types/api:CustomPolicyTypeEnum'
     *
     * @var CustomPolicyTypeEnum
     */
    #[Assert\Type(CustomPolicyTypeEnum::class)]
    public CustomPolicyTypeEnum $policyType;
}
