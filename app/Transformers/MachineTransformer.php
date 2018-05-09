<?php


namespace App\Transformers;

use App\Models\Machine;

class MachineTransformer extends BaseTransformer
{

   protected $availableIncludes = ['point','topics'];

   protected $defaultIncludes = [];

    public function transformData($model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'slug' => $model->slug,
            'description' => $model->description,
        ];
    }

    public function includePoint($model)
    {
        return $this->collection($model->points, new PointTransformer());
    }

    public function includetopics($model)
    {
        return $this->collection($model->topics, new TopicTransformer());
    }
}
