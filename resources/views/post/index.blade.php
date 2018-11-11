@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6 text-left">
                        {{ __('Posts') }}
                    </div>

                    <div class="col-6 text-right">
                        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Add post') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <li class="list-group-item mb-3">
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <h4>
                                            <a href="{{ route('post.show', [$post]) }}">
                                                {{ $post->name }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
                                    <div class="col">
                                        {!! $post->content !!}
                                    </div>
                                </div>

                                @if ($post->category)
                                    <div class="row justify-content-between mt-1">
                                        <div class="col">
                                            <strong>{{ __('Category') }}:</strong>
                                            <a href="{{ route('category.show', [$post->category]) }}">
                                                {{ $post->category->name }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">
                            {{ __('No posts') }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
