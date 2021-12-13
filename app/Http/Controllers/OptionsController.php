<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptionsController extends Controller
{
    public function index($id)
    {
        $options = Option::where('question_id', $id)->get();
        return view('test.options.index', ['options' => $options, 'question_id' => $id]);
    }

    public function create($id)
    {
        $options = Option::where('question_id', $id)->get();
        return view('test.options.create',  ['options' => $options, 'question_id' => $id]);
    }

    public function store(Request $request)
    {
        $option = Option::create($request->all());
        return redirect()->route('option.index', ['id' => $request->question_id]);
    }

    public function edit(Option $option)
    {
        $questions = Question::all()->pluck('question_text', 'id')->prepend(trans('global.pleaseSelect'), '');
        $option->load('question');
        return view('test.options.edit', compact('questions', 'option'));
    }

    public function update(Request $request, Option $option)
    {
        $option->update($request->all());
        return redirect()->route('test.options.index');
    }

    public function show(Option $option)
    {
        $option->load('question');
        return view('test.options.show', compact('option'));
    }

    public function destroy($id,Option $option)
    {

        $option->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        Option::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
