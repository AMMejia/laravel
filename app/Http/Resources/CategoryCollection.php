<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
                'name' => $model->name,
                'description' => $model->description,
                'products' => $model->products
            ];
        });
    }
}
