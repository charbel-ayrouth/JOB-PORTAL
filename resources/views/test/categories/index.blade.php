@extends('layouts.tailwind')
@include('layouts.header')
@section('content')
    <div class="h-screen overflow-scroll my-30 flex justify-center" style="background: #edf2f7;">
        <div class="w-2/3 mx-auto">
            <div class="flex flex-col mt-20">
                <div class="flex justify-between">
                    <h2 class="font-bold text-2xl">Test Categories</h2>
                    <a href="/jobtest/{{ $job_id }}/category/create"
                        class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-dark no-underline">Create
                        a category</a>
                </div>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Name</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Job Name</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $category->cid }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $category->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $category->JobTitle }}</td>
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <a href="{{ route('question.index', ['id' => $category->cid]) }}"
                                            class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-blue-dark no-underline">View
                                            question</a>
                                        <a href="{{ route('question.create', ['id' => $category->cid]) }}"
                                            class="text-gray-100 font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-blue-dark no-underline">Add
                                            question</a>
                                        <form
                                            action="category/{{ $category->cid }} "
                                            method="post" class="inline">
                                            @csrf
                                            @method('delete')
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
    </div>
@endsection
