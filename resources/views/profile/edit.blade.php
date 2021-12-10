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
    <div class="w-8/12 mx-auto  mt-20">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
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
                    <label for="countrySelected" class="block text-gray-700 text-sm font-bold mb-2">Country*</label>
                    <select onselect="update()" name="countrySelected" id="countrySelected"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($countries as $cou)
                            @if ($location->country == $cou->nicename)
                                <option value="{{ $cou->nicename }}" selected>{{ $cou->nicename }}</option>
                            @else
                                <option value="{{ $cou->nicename }}">{{ $cou->nicename }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                        City
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="city" type="text" placeholder="City" name="city" value="{{ $location->city }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="zipCode">
                        Zip Code
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="zipCode" type="text" placeholder="Zip Code" name="zipCode"
                        value="{{ $location->zipCode }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Address">
                        Address
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="Address" type="text" placeholder="Address" name="Address"
                        value="{{ $location->Address }}">
                </div>
                @isset($jobSeeker)
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Degree">
                            Degree
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="Degree" type="text" placeholder="Address" name="degree" value="{{ $jobSeeker->degree }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Field">
                            Field
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="Field" type="text" placeholder="Field" name="field" value="{{ $jobSeeker->field }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Bio">
                            Bio
                        </label>
                        <textarea
                            class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="bio" id="Bio" rows="4">{{ $jobSeeker->bio }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Experience">
                            Experience
                        </label>
                        <textarea
                            class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="experience" id="Experience" rows="4">{{ $jobSeeker->experience }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Skills">
                            Skills
                        </label>
                        <textarea
                            class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="skills" id="Skills" rows="4">{{ $jobSeeker->skills }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label
                            class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white text-blue-600 ease-linear transition-all duration-150">
                            <i class="fas fa-cloud-upload-alt fa-3x"></i>
                            <span class="mt-2 text-base leading-normal">Select your CV</span>
                            <input type="file" class="hidden" name="CV" />
                        </label>
                    </div>
                    <div class="mb-4">
                        <label
                            class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white text-blue-600 ease-linear transition-all duration-150">
                            <i class="fas fa-cloud-upload-alt fa-3x"></i>
                            <span class="mt-2 text-base leading-normal">Select your coverletter</span>
                            <input type="file" class="hidden" name="CoverLetter" />
                        </label>
                    </div>
                @endisset
                @isset($jobProvider)
                    <div></div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="CompanyField">
                            Company Field
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="CompanyField" type="text" placeholder="Company Field" name="CompanyField"
                            value="{{ $jobProvider->CompanyField }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="CompanyTitle">
                            Company Title
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="CTitle" type="text" placeholder="Company Title" name="CompanyTitle"
                            value="{{ $jobProvider->CompanyTitle }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="CompanyDescription">
                            Company Description
                        </label>
                        <textarea
                            class="form-textarea mt-1 block w-full shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="CompanyDescription" id="CompanyDescription"
                            rows="4">{{ $jobProvider->CompanyDescription }}</textarea>
                    </div>
                @endisset
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Edit
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
