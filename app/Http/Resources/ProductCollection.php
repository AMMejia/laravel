<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
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
                'cost' => $model->cost,
                'existences' => $model->existences,
                'availables' => $model->availables,
                'category' => $model->category,
                'image' => $model->image,
                'unit' => $model->unit,
                'measurement' => $model->measurement,
                'checked' => $model->checked,
            ]; 
        });
    }
}
