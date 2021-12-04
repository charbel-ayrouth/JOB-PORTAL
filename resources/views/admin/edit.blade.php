{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Edit</title>
</head>

<body>
    <div class="w-6/12 mx-auto  mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="grid grid-cols-2 gap-10">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" placeholder="Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone-number">
                        Phone Number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone-number" type="text" placeholder="phone-number">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Field">
                        Field
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="Field" type="text" placeholder="Enter your Field">
                </div>
                <div class="mb-4">
                    <div class="bg-white">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full">
                                    <div
                                        class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                        <div class="absolute">
                                            <div class="flex flex-col items-center"> <i
                                                    class="fa fa-folder-open fa-4x text-blue-700"></i> <span
                                                    class="block text-gray-400 font-normal">Attach you CV here</span>
                                            </div>
                                        </div> <input type="file" class="h-full w-full opacity-0" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Edit
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Go Back !
                </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    </div>
</body>


</html>
