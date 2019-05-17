<?php

namespace App\Http\Controllers;

use App\Category;

use Laravel\Lumen\Routing\Controller as BaseController;

class CategoryController extends BaseController
{   
    public function show()
    {
        return response()->json(Category::get());
    }
  
    public function create(Request $request)
    {
      $category = Category::create($request->all());
      return response()->json($category, 201);
    }
  
    public function showOnecategory($id)
    {
      return response()->json(Category::with("category")->find($id));
    }
    
    public function update($id, Request $request)
    {
      $category = Category::findOrFail($id);
      $category->update($request->all());
      return response()->json($company, 200);
    }

}
