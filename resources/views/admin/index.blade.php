<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="w-2/3 mx-auto">
        <div class="flex flex-col">
            <div>
                <h2 class="font-bold text-2xl">Job Seekers</h2>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Name</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Email</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                phone Number</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_seekers as $job_seeker)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_seeker->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_seeker->email }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_seeker->phoneNumber }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('users.edit', ['id' => $job_seeker->id]) }}"
                                        class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-dark no-underline">Edit</a>
                                    <a href="{{ route('users.show', ['id' => $job_seeker->id]) }}"
                                        class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-blue-dark no-underline">View</a>
                                    <form action="/admin/dashboard/{{ $job_seeker->id }}" method="post"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-red-dark no-underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <h2 class="font-bold text-2xl">Job Providers</h2>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Name</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Email</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Phone Number</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_providers as $job_provider)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_provider->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_provider->email }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $job_provider->phoneNumber }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="#"
                                        class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-dark no-underline">Edit</a>
                                    <a href="{{ route('users.show', ['id' => $job_provider->id]) }}"
                                        class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-blue-dark no-underline">View</a>
                                    <form action="/admin/dashboard/{{ $job_provider->id }}" method="post"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-red-dark no-underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
