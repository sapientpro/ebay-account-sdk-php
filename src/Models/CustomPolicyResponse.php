<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

class CustomPolicyResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This array contains the custom policies that match the input criteria.
     * @var CompactCustomPolicyResponse[]
     */
    #[Assert\Type('array')]
    public array $customPolicies;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('string')]
    public ?string $href = null;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('int')]
    public ?int $limit = null;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('string')]
    public ?string $next = null;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('int')]
    public ?int $offset = null;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('string')]
    public ?string $prev = null;

    /**
     * <i>This field is for future use.</i>
     */
    #[Assert\Type('int')]
    public ?int $total = null;
}
