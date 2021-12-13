<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('test.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('test.categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('test.categories.index');
    }

    public function edit(Category $category)
    {
        return view('test.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('test.categories.index');
    }

    public function show(Category $category)
    {
        return view('test.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        Category::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
