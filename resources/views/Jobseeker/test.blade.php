<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Quiz</title>
</head>

<body>
    <div class="w-6/12 mx-auto  mt-20 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form method="POST" action="{{ route('test.store') }}">
            @csrf
            @foreach ($categories as $category)
                <div class="mb-4">
                    <h2 class="font-semibold text-xl mb-3">Category: {{ $category->name }}</h2>
                    <div>
                        @foreach ($category->categoryQuestions as $question)
                            <div class="mt-3 font-medium">{{ $question->question_text }}</div>
                            <input type="hidden" name="questions[{{ $question->id }}]">
                            @foreach ($question->questionOptions as $option)
                                <div class="mb-4 mt-1">
                                    <input type="radio" name="question[{{ $question->id }}]"
                                        id="option-{{ $option->id }}" value="{{ $option->id }}"
                                        value="{{ $option->id }}" @if (old("questions.$question->id") == $option->id) checked @endif>
                                    <label for="option-{{ $option->id }}">
                                        {{ $option->option_text }}
                                    </label>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Submit
            </button>
        </form>
    </div>
</body>

</html>
