<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index($id)
    {
        $questions = Question::all();
        return view('test.questions.index', ['questions' => $questions, 'category_id' => $id]);
    }

    public function create($id)
    {
        return view('test.questions.create', ['category_id' => $id]);
    }

    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return redirect()->route('question.index', ['id' => $request->category_id]);
    }

    public function edit(Question $question)
    {
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $question->load('category');
        return view('test.questions.edit', compact('categories', 'question'));
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('test.questions.index');
    }

    public function show(Question $question)
    {
        $question->load('category');
        return view('test.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        Question::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
