<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index', ['categories' => $category->getCategories(Session::get('country_id'))]);        
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request, Category $category)
    {
        $category->country_id = $request->country_id;
        $category->category_name = $request->category_name;
        $category->created_by = 1;
        $category->updated_by = 1;
        $category->save();

        return redirect('/categories');
    }

    public function edit(Category $category, $id)
    {
        return view('categories.edit', ['category' => $category->where('id', $id)->first()]);
    }

    public function update(Request $request, Category $category)
    {
        $category->where('id', $request->category_id)
                 ->update(['country_id' => $request->country_id,
                           'category_name' => $request->category_name,
                           'updated_by' => 1]);

        return back();
    }
}
