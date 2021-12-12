{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Quiz</title>
</head>

<body>
    <div class="w-8/12 mx-auto  mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="/addQuiz/{{$user->id}}/{{ $job->id }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('POST')
            <div class="grid gap-4">
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quiztitle">
                        Quiz Title:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="quiztitle" type="text" placeholder="Enter Quiz Title" name="quiztitle">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                        Quiz Category:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category" type="text" placeholder="Enter Quiz Category" name="category">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nbquest">
                        Number of Questions:
                    </label>
                    <input
                        class="shadow appearance-none border rounded  w-48 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nbquest" type="number" placeholder="Number of Questions" name="nbquest"
                        min="1" max="30">
                </div>

                <div class="flex items-center justify-between">
                    <button
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                      type="submit">
                        Next
                        </button>
                        
                    </div>     
            
        </form>
    </div>
</body>


</html>
