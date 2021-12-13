<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@include('layouts.header')

<body style="background: #edf2f7;">
    <div class="flex items-center justify-center">
        {{-- <style>
            :root {
                --main-color: #4a76a8;
            }

            .bg-main-color {
                background-color: var(--main-color);
            }

            .text-main-color {
                color: var(--main-color);
            }

            .border-main-color {
                border-color: var(--main-color);
            }

        </style> --}}
        {{-- <link href="
        https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}

        <div class="container mx-auto my-6 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <form action="/profile/{{ $user->id }}/picture" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="bg-white p-3 border-t-4 border-green-400">
                            <div class="image overflow-hidden">
                                <img class="h-auto w-full mx-auto" src="{{ asset('/storage/images/' . $user->path) }}"
                                    alt="">
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                            @if (isset($jobSeeker))
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $jobSeeker->bio }}.</h3>
                            @elseif (isset($jobProvider))
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">
                                    {{ $jobProvider->CompanyDescription }}.</h3>
                            @endif
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex justify-around items-center py-3">
                                    @if (auth()->id() == $user->id)
                                        <a href="/profile/{{ auth()->id() }}/edit"
                                            class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-dark no-underline">Edit</a>
                                    @endif
                                    <div class="flex">
                                        @if (auth()->id() == $user->id)
                                            <label for="pp">
                                                <input type="file" id="pp" class="hidden" name="pp">
                                                <span clas="text-green-500">
                                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </span>
                                            </label>
                                            <button
                                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-green-dark no-underline"
                                                type="submit">Change Profile Picture</button>
                                        @endif
                                    </div>
                                </li>
                    </form>
                    <li class="flex items-center py-3">
                        <span>Type</span>
                        <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">
                                @if (isset($jobSeeker))
                                    Job Seeker
                                @else
                                    Job Provider
                                @endif
                            </span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>Member since</span>
                        <span class="ml-auto">{{ $user->created_at->isoFormat('dddd D') }}</span>
                    </li>
                    @if ($user->role_id == 3 && auth()->id() == $user->id)
                        <li class="flex items-center py-3">
                            <a href="/profile/{{ auth()->id() }}/create/job"
                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-black hover:bg-green-dark no-underline">Post
                                a new job!</a>
                        </li>
                    @endif
                    </ul>
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
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
                                <div class="px-4 py-2">{{ $location->city }}, {{ $location->Country }}
                                </div>
                            </div>
                            @if (isset($jobSeeker))
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Degree</div>
                                    <div class="px-4 py-2">{{ $jobSeeker->degree }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Field</div>
                                    <div class="px-4 py-2">{{ $jobSeeker->field }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if (isset($jobSeeker))
                        <a href="{{ route('homepage_js') }}"
                            class="block w-full text-center text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 mt-4">Go
                            Back To Home Page</a>
                    @endif

                    @if (isset($jobProvider))
                        <a href="{{ route('jpHome') }}"
                            class="block w-full text-center text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 mt-4">Go
                            Back To Home Page</a>
                    @endif
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                @if (isset($jobSeeker))
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Experience</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <div class="text-teal-600">{{ $jobSeeker->experience }}</div>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Skills</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">{{ $jobSeeker->skills }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                @endif
                <!-- End of profile tab -->

                @if (isset($jobProvider))
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Company Field</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <div class="text-teal-600">{{ $jobProvider->CompanyField }}</div>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Company Title</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">{{ $jobProvider->CompanyTitle }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <h1 class="mb-8 font-bold text-2xl">Jobs Availaible</h1>
                        @foreach ($jobs as $job)
                            <div class="my-8 border-2 border-slate-200">
                                <div class="grid grid-cols-2">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Job Title</div>
                                        <div class="px-4 py-2 ">{{ $job->JobTitle }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Field of work</div>
                                        <div class="px-4 py-2 ">{{ $job->Field }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Job type</div>
                                        <div class="px-4 py-2 ">{{ $job->type }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Level</div>
                                        <div class="px-4 py-2 ">{{ $job->JobSkillLevel }}</div>
                                    </div>
                                    <div class="">
                                        <div class="px-4 py-2 font-semibold">Requirements</div>
                                        <div class="px-4 py-2 ">{{ $job->Requirements }}</div>
                                    </div>
                                    <div class="">
                                        <div class="px-4 py-2 font-semibold">Description</div>
                                        <div class="px-4 py-2 ">{{ $job->Description }}</div>
                                    </div>
                                    @if (auth()->id() == $user->id)
                                        <div class="mt-5 mb-5 ml-15 flex justify-around">
                                            <a href="/profile/{{ $user->id }}/edit/job/{{ $job->id }}"
                                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs w-12 bg-green-500 hover:bg-green-dark no-underline">Edit</a>
                                            <a href="{{ route('JobDetail', ['id' => $job->id]) }}"
                                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs w-27 bg-blue-500 hover:bg-green-dark no-underline">More
                                                Details</a>
                                            <form class="inline"
                                                action="/profile/{{ $user->id }}/delete/job/{{ $job->id }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-green-dark "
                                                    type="Submit">
                                                    Delete
                                                </button>
                                            </form>
                                            <a href="/jobtest/{{ $job->id }}/categories"
                                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs w-27 bg-green-500 hover:bg-green-dark no-underline">View
                                                Quiz</a>
                                        </div>
                                    @else
                                        <div class="my-5 px-5">
                                            <a href=""
                                                class="text-gray-100 font-bold py-1 px-3 rounded text-xs w-27 bg-blue-500 hover:bg-green-dark no-underline">
                                                Apply for this job!</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
