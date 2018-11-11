@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6 text-left">
                        {{ $category->name }}
                    </div>

                    <div class="col-6 text-right">
                        <a href="{{ route('category.edit', $category) }}" class="btn btn-primary btn-sm">
                            {{ __('Edit category') }}
                        </a>

                        <form method="POST" action="{{ route('category.destroy', $category) }}" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}');"
                                    class="btn btn-danger btn-sm">
                                {{ __('Delete category') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="my-1">
                    {!! $category->description !!}
                </div>

                <hr>

                <h3>{{ __('Posts') }}</h3>

                <ul class="list-group">
                    @if (count($category->posts))
                        @foreach ($category->posts as $post)
                            <li class="list-group-item mb-2">
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
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">
                            {{ __('No posts') }}
                        </li>
                    @endif
                </ul>

                <hr>

                <h3>{{ __('Comments') }}</h3>

                @include('partials._comments', ['model' => $category, 'formAction' => route('comment.category', $category)])

            </div>
        </div>
    </div>
</div>
@endsection
