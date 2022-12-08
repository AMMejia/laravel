<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return response()->json(Category::all(), 200);
       return response()->json(new CategoryCollection(Category::all()->sortByDesc('id')), 200);
    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
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
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            \DB::commit();
            return response()->json($category, 200);
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
    public function update(Category $category, Request $request)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('Success', 200);
    }
}
