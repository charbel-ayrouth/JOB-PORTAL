{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="id" value=class="hidden">
                <div class="mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Movie title"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=>
                </div>
                <div class="mb-4">
                    <label for="desc">Description</label>
                    <input name="desc" id="desc" class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                        placeholder="Description..." value=>
                </div>
                <div class="mb-4">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" placeholder="Movie Genre"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=>
                </div>
                <div class="mb-4">
                    <label for="duration">Duration (in mins)</label>
                    <input type="text" name="duration" id="duration" placeholder="Duration" pattern="[0-9]+"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=>
                </div>
                <div class="mb-4">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" value=>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit
                        Movie</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
