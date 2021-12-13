@extends('layouts.tailwind')
@include('layouts.header')
@section('content')
    <div class="h-screen overflow-scroll my-30 flex justify-center" style="background: #edf2f7;">
        <div class="w-2/3 mx-auto">
            <form action="/jobtest/{{ $job_id }}/category" method="post">
                @csrf
                <label for="name">
                    Category name
                </label>
                <input type="text" name="name" id="name">
                <input type="text" name="job_id" hidden value="{{ $job_id }}">
                <button>Submit</button>
            </form>
        </div>
    </div>
@endsection
