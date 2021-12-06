<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="w-2/3 mx-auto flex">
        <div>
            <img src="{{ asset('/storage/images/' . $user->path) }}" alt="">
        </div>
        <div class="bg-white p-3 shadow-sm rounded-sm">
            <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Name</div>
                        <div class="px-4 py-2">{{ $user->name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Role</div>
                        <div class="px-4 py-2">
                            @if ($user->role_id == 2)
                                Job Seeker
                            @else
                                Job Provider
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Gender</div>
                        <div class="px-4 py-2">{{ $user->gender }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                        <div class="px-4 py-2">{{ $user->phoneNumber }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Email Address</div>
                        <div class="px-4 py-2">{{ $user->email }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Address</div>
                        <div class="px-4 py-2">{{ $location->city }}, {{ $location->Country }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('users.index') }}"
                class="block w-full text-center text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 mt-4">Go
                Back To Dashboard</a>
        </div>
    </div>
    </div>
</body>

</html>
