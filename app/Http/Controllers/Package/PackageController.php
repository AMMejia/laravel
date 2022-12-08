<?php

namespace App\Http\Controllers\Package;

use App\Models\Product;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(Package::all(), 200);
       //return response()->json(new CategoryCollection(Category::all()->sortByDesc('id')), 200);

    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return response()->json($package, 200);
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
            $collection = collect($request->products);
            $product = $collection->map(function ($item, $key) {
                Product::findOrFail($item['product_id']);
                return $item;
            });
            $package = new Package();
            $package->name = $request->name;
            $package->cost = $request->cost;
            $package->products = json_encode($product->all());
            $package->save();
            \DB::commit();
            return response()->json($package, 200);
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
    public function update(Package $package, Request $request)
    {
        $package->update($request->only(['name', 'cost']));
        $package->update(["products" => json_encode($request->products)]);
        return response()->json($package, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return response()->json('Success', 200);
    }
}
