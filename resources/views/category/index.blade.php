@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6 text-left">
                        {{ __('Categories') }}
                    </div>

                    <div class="col-6 text-right">
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Add category') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                @if (count($categories))
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('category.show', [$category]) }}">
                                    {{ $category->name }}
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
