<?php


namespace App\Transformers;

use App\Models\Point;

class PointTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }
}
