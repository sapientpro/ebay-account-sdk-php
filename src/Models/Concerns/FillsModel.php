<?php

namespace SapientPro\EbayAccountSDK\Models\Concerns;

use SapientPro\EbayAccountSDK\Models\EbayModelInterface;

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
}
