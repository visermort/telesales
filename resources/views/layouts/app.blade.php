<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if ($user = Sentinel::check())
                        <ul class="nav navbar-nav">
                            <li class="{{ Navigate::isActive('orders') }}" ><a href="{{ action('OrderController@index') }} ">Заказы</a></li>
                            @if ($user->email == config('telesales.adminEmail'))
                                <li class="{{ Navigate::isActive('admin/users') }}"><a href="{{ action('Admin\UsersController@index') }}">Пользователи</a></li>
                                <li class="{{ Navigate::isActive('admin/goods') }}"><a href="{{ action('Admin\GoodController@index') }}">Товары</a></li>
                                <li class="{{ Navigate::isActive('admin/service') }}"><a href="{{ action('Admin\ServiceController@index') }}">Услуги</a></li>
                                <li class="{{ Navigate::isActive('admin/additional') }}"><a href="{{ action('Admin\AdditionalController@index') }}">Прочее</a></li>
                                <li class="{{ Navigate::isActive('admin/state') }}"><a href="{{ action('Admin\StateController@index') }}">Статусы</a></li>
                            @endif
                        </ul>

                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!$user)
                            <li><a href="{{ action('Auth\CartalistController@index') }}">Login</a></li>
                            <li><a href="{{ action('Auth\CartalistController@registerForm') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      {{ $user->first_name }} {{ $user->last_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ action('Auth\CartalistController@logout') }}">
                                            Logout

                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default clearfix" id="model-data">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/custom.js" ></script>
</body>
</html>
