@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6 text-left">
                        @if ($post->category)
                            {{ __('Category') }}:

                            <a href="{{ route('category.show', $post->category) }}">
                                {{ $post->category->name }}
                            </a>
                        @else
                            {{ __('No category') }}
                        @endif
                    </div>

                    <div class="col-6 text-right">
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-primary btn-sm">
                            {{ __('Edit post') }}
                        </a>

                        <form method="POST" action="{{ route('post.destroy', $post) }}" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}');"
                                    class="btn btn-danger btn-sm">
                                {{ __('Delete post') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <h1>
                    {{ $post->name }}
                </h1>

                <div class="my-1">
                    {!! $post->content !!}
                </div>

                @if (count($post->files))
                    <hr>

                    <ul class="list-group">
                        @foreach ($post->files as $file)
                            <li class="list-group-item">
                                <a href="{{ asset('storage/' . $file->file->path) }}" target="_blank">
                                    {{ $file->file->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
