<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function index($id)
    {
        $categories = Category::join('jobs', 'job_id', '=', 'jobs.id')
            ->where('job_id', $id)
            ->select('categories.id as cid', 'categories.*', 'jobs.id as jid', 'jobs.*')
            ->get();

        return view('test.categories.index', [
            'categories' => $categories,
            'job_id' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('test.categories.create', [
            'job_id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect('jobtest/' . $request->job_id . '/category');
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

    public function destroy($id,Category $category)
    {
        $category->delete();
        return back();
    }
}
