<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptionsController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('test.options.index', compact('options'));
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('test.options.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $option = Option::create($request->all());
        return redirect()->route('test.options.index');
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

    public function destroy(Option $option)
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