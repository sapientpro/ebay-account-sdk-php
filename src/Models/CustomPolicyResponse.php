<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;

class CustomPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This array contains the custom policies that match the input criteria.
     * @var CompactCustomPolicyResponse[]
     */
    public array $customPolicies;

    /**
     * <i>This field is for future use.</i>
     */
    public ?string $href;

    /**
     * <i>This field is for future use.</i>
     */
    public ?int $limit;

    /**
     * <i>This field is for future use.</i>
     */
    public ?string $next;

    /**
     * <i>This field is for future use.</i>
     */
    public ?int $offset;

    /**
     * <i>This field is for future use.</i>
     */
    public ?string $prev;

    /**
     * <i>This field is for future use.</i>
     */
    public ?int $total;
}
