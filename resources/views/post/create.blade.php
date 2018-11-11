@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Add post') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="postCategory" class="col-sm-4 col-form-label text-md-right">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            <select id="postCategory"
                                    class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                    name="category_id">

                                <option value=""></option>

                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}"{{ $value->id === old('category_id') ? ' selected' : '' }}>
                                        {{ $value->name }}
                                    </option>
                                @endforeach;

                            </select>

                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postName" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="postName"
                                   type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postContent" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                        <div class="col-md-6">
                            <textarea id="postContent"
                                      name="content"
                                      rows="12"
                                      class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                            >{{ old('content') }}</textarea>

                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="custom-file">
                                <input type="file"
                                       class="custom-file-input{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                       id="postFile"
                                       name="file">

                                <label class="custom-file-label" for="postFile">{{ __('File') }}</label>

                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
