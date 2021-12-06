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
    <div class="w-4/12 mx-auto  mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" type="text" placeholder="Name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="text" placeholder="Email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone-number">
                    Phone Number
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone-number" type="number" placeholder="phone-number" name="phonenumber"
                    value="{{ $user->phoneNumber }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                    Role
                </label>
                <select name="role" id="role"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $user->role_id }}">
                    <option value="1">admin</option>
                    <option value="2">Job Seeker</option>
                    <option value="3">Job Provier</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Edit
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    href="{{ route('users.index') }}">
                    Go Back !
                </a>
        </form>
    </div>
    </div>

</body>


</html>
