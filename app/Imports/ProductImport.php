<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    */
    public function model(array $row): void
    {
        $category = \App\Models\Category::where('name', $row[0])->first();
        if($category){
            $product = new \App\Models\Product;
            $product->name = $row[1];
            $product->measurement = $row[2];
            $product->existences = $row[3] ?: 0;
            $product->unit = $row[4];
            $product->cost = $row[5] ?: 0;
            $product->category()->associate($category);
            $product->save();
        }
    }
}
