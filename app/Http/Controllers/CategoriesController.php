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
        $categories = Category::where('job_id','=',$id)
        ->join('jobs','job_id','=','jobs.id')->get();

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

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return redirect('jobtest/' . $request->job_id . '/category');
    }

    public function edit(Category $category)
    {

        return view('test.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('test.categories.index');
    }

    public function show(Category $category)
    {
        return view('test.categories.show', compact('category'));
    }

    public function destroy($id)
    {

        Category::destroy($id);
        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}