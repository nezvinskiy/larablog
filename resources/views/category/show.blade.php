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
                {!! $category->description !!}
            </div>
        </div>
    </div>
</div>
@endsection
