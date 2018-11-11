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

                @if (count($posts))
                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                <a href="{{ route('post.show', [$post]) }}">
                                    {{ $post->name }}
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