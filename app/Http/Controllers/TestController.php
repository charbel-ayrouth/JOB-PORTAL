<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreTestRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        // \dd($categories);
        return view('jobSeeker.test', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        //        $request->validate([
        //            'questions'     => [
        //                'required', 'array'
        //            ],
        //            'questions.*' => [
        //                'required', 'integer', 'exists:options,id'
        //            ],
        //        ]);
        $options = Option::find(\array_values($request->input('questions')));
        $result = \auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
        ]);
        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                'option_id' => $option->id,
                'points' => $option->points
            ]];
        })->toArray();
        $result->questions()->sync($questions);
        return \redirect()->route('result.show', $result->id);
    }
}
