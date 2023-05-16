<?php

namespace SapientPro\EbayAccountSDK\Models\Concerns;

use SapientPro\EbayAccountSDK\Models\EbayModelInterface;
use SapientPro\EbayAccountSDK\Models\NonExistentPropertyException;

trait FillsModel
{
    public static function fromArray(array $data): EbayModelInterface
    {
        $model = new self();

        foreach ($data as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }

    public function __set(string $name, mixed $value): void
    {
        throw new NonExistentPropertyException(
            "Cannot set property $name to " . __CLASS__ . ', as it is not declared in the model'
        );
    }
}
