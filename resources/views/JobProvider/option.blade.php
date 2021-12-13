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
            action="" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('POST')
            <div class="grid gap-4">
               <b><center>Questions</center></b>
                @for ($i = 1; $i < 3; $i++) {{--'i' will be replaced by the nb of quest chosen by the provider --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quiztitle">
                        Question {{$i}}:
                    </label>
                    
                

                <div class="mb-4">
                   {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="quiztitle">
                        Options {{$i}}:
                    </label>--}}
                    
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quiztitle">
                        True/False
                    </label>
                    <input type="radio" class="form-radio h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">True</span>
                    <input type="radio" class="form-radio h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">False</span>
            </div>
                <br><br>
                @endfor
                
               

                <div class="flex items-center justify-between">
                    <button
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                      type="submit">
                        Submit
                        </button>
                        
                </div>     
        </form>
    </div>
</body>


</html>
