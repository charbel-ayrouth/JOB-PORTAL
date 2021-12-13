<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProvResultsController extends Controller
{
    public function index()
    {
        $results = Result::all();
        return view('test.results.index', compact('results'));
    }

    public function create()
    {
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $questions = Question::all()->pluck('question_text', 'id');
        return view('test.results.create', compact('users', 'questions'));
    }

    public function store(Request $request)
    {
        $result = Result::create($request->all());
        $result->questions()->sync($request->input('questions', []));
        return redirect()->route('test.results.index');
    }

    public function edit(Result $result)
    {
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $questions = Question::all()->pluck('question_text', 'id');
        $result->load('user', 'questions');
        return view('test.results.edit', compact('users', 'questions', 'result'));
    }

    public function update(Request $request, Result $result)
    {
        $result->update($request->all());
        $result->questions()->sync($request->input('questions', []));
        return redirect()->route('test.results.index');
    }

    public function show(Result $result)
    {
        $result->load('user', 'questions');
        return view('admin.results.show', compact('result'));
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        Result::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
