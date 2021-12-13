@extends('layouts.tailwind')
@include('layouts.header')
@section('content')
    <div class="w-1/3 mx-auto my-30" style=" background: #edf2f7;">
        <div class="flex justify-center">
            <form action="{{ route('question.store', ['id' => $question_id]) }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="option_text">
                        Option
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="option_text" id="option_text">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="points">
                        Points
                    </label>
                    <select name="points" id="points"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0">zero</option>
                        <option value="1">one</option>
                    </select>
                </div>
                <input type="text" name="question_id" hidden value="{{ $question_id }}">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </form>
        </div>
    </div>
@endsection
