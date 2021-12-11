{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Create a Job</title>
</head>

<body>
    <div class="w-8/12 mx-auto  mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/profile/{{ $user->id }}/create/job"
            method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="jid" value="{{ $jobProvider->jid }}">
                <input type="hidden" name="locationid" value="{{ $user->location_id }}">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="JobTitle">
                        Job Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="JobTitle" type="text" placeholder="JobTitle" name="JobTitle">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Field">
                        Field
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="Field" type="text" placeholder="Field" name="Field">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Type">
                        Type
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="Type" type="text" placeholder="Type" name="type">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="JobSkillLevel">
                        Skill Level
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="JobSkillLevel" type="text" placeholder="Skill Level" name="JobSkillLevel">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Requirements">
                        Requirements
                    </label>
                    <textarea
                        class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="Requirements" id="Requirements" rows="4"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Description">
                        Description
                    </label>
                    <textarea
                        class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="Description" id="Description" rows="4"></textarea>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    href="{{ route('profile', ['id' => $user->id]) }}">
                    Go Back !
                </a>
            </div>
        </form>
    </div>
</body>


</html>
