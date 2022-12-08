<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($model) {
            return [
                'id' => $model->id,
                'start' => $model->start,
                'color' => $model->color,
                'grupo' => $model->grupo,
                'group' => $model->group,
                'hotel' => $model->hotel,
                'user' => $model->user,
            ];
        });
    }
}
