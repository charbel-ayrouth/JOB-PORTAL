@extends('layouts.tailwind')
@include('layouts.header')
@section('content')

    <div class="h-screen overflow-scroll my-30 flex justify-center" style="background: #edf2f7;">
        <div class="w-2/3 mx-auto">
            <form action="">
                <label class="" for="name">Name</label>
                <input class="" type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                    required>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', [$category->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $category->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
