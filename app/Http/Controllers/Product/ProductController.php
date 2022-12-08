<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new ProductCollection(Product::all()->sortByDesc('id'), 200));
    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            $category = Category::findOrFail($request->category_id);
            $product = new Product();
            $product->name = $request->name;
            $product->unit = $request->unit;
            $product->measurement = $request->measurement;
            $product->cost = $request->cost;
            $product->existences = $request->existences;
            $product->category()->associate($category);
            $product->save();
            \DB::commit();
            return response()->json($product, 200);
        } catch (\Exception $exception) {
            \DB::rollback();
            return response()->json($exception->getMessage(), 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Request $request)
    {
        $product->update($request->all());
        if ($request->category_id) {
            $category = Category::findOrFail($request->category_id);
            $product->category()->associate($category)->save();
        } 
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('Success', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Product $product, Request $request)
    {
        $request->validate(['image' => 'required|mimes:jpeg,jpg,png,gif|max:3000']);
        $product->image = \Storage::url(\Storage::disk('public')->putFile('uploads/products', $request->file('image')));
        $product->save();
        return response()->json(__('response.update.success'), 200);
    }
}
