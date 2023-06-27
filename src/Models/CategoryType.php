<?php

namespace SapientPro\EbayAccountSDK\Models;

use SapientPro\EbayAccountSDK\Models\Concerns\FillsModel;
use SapientPro\EbayAccountSDK\Enums\CategoryTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The category type discerns whether the policy applies to motor vehicle listings,
 * or to any other items except motor vehicle listings.
 * Each business policy can be associated with either or both categories
 * ('MOTORS_VEHICLES' and 'ALL_EXCLUDING_MOTORS_VEHICLES');
 * however, return business policies are not applicable for motor vehicle listings.
 */
class CategoryType implements EbayModelInterface
{
    use FillsModel;

    /**
     * This field has been deprecated and is no longer used.
     * Do not include this field in any create or update method.
     * This field may be returned within the payload of a get method, but it can be ignored.
     */
    #[Assert\Type('bool')]
    public ?bool $default = null;

    /**
     * The category type to which the policy applies (motor vehicles or non-motor vehicles).
     * The MOTORS_VEHICLES category type is not valid for return policies.
     * Ebay flows do not support the return of motor vehicles.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/account/types/api:CategoryTypeEnum'
     *
     * @var CategoryTypeEnum
     */
    #[Assert\Type(CategoryTypeEnum::class)]
    public CategoryTypeEnum $name;
}
