<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">{{ __('Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">{{ __('Categories') }}</a>
                        </li>

                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--@if (Route::has('register'))--}}
                                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--@endif--}}
                            {{--</li>--}}
                        {{--@else--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--{{ __('Logout') }}--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                        {{--@csrf--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endguest--}}

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row">
                    <div class="col">

                        @section('breadcrumb')
                            <nav aria-label="breadcrumb">

                                {{ Breadcrumbs::render() }}

                            </nav>
                        @show

                        @include('flash::message')

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        @yield('content')

                    </div>
                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-header">
                                {{ __('Statistics') }}
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @if (count($statistics))
                                        @foreach ($statistics as $key => $value)
                                            <li class="list-group-item">
                                                {{ $value['web_browser'] }}: {{ $value['total'] }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">
                                            {{ __('No statistics') }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col text-left">
                                        {{ __('Categories') }}
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                                            {{ __('Add') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @if (count($categories))
                                        @foreach ($categories as $category)
                                            <li class="list-group-item">
                                                <a href="{{ route('category.show', [$category]) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">
                                            {{ __('No categories') }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
