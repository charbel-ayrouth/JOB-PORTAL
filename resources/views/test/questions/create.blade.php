@extends('layouts.tailwind')
@include('layouts.header')
@section('content')
    <div class="w-1/3 mx-auto my-30" style=" background: #edf2f7;">
        <div class="flex justify-center">
            <form action="{{ route('question.store', ['id' => $category_id]) }}" method="post">
                @csrf
                <label class="block text-gray-700 text-sm font-bold mb-2" for="question_text">
                    Question
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="question_text" id="question_text">
                <input type="text" name="category_id" hidden value="{{ $category_id }}">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </form>
        </div>
    </div>
@endsection
