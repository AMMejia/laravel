<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = \App\Models\Category::findOrFail(1);
        $product = new \App\Models\Product;
        $product->name = 'Mesas Dublin blancas';
        $product->cost = 577.78;
        $product->unit = 'pza';
        $product->measurement = '2.40m x 1.00m x .72cm';
        $product->existences = 10;
        $product->category()->associate($category);
        $product->save();
    }
}
