<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('updateprofile') }}"> Update Profile</a>
                            </li>
                            @can('companyAccess')
                                @if (Auth::user()->person->company)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('editcompany') }}"> Update Company</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('addcompany') }}"> Add Company</a>
                                    </li>
                                @endif
                            @endcan
                            @can('manageCompanyAccess')
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('managecompany') }}"> Manage Company</a>
                            </li>
                            @endcan

                            @can('rolesAccess')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownRole" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Roles <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownRole">
                                    @can('view', App\User::class)
                                        <a class="nav-link" href="{{ route('listroles') }}"> Assign Roles</a>
                                    @endcan

                                    @can('create', App\Roles::class)
                                        <a class="nav-link" href="{{ route('createroles') }}"> Create Role</a>
                                    @endcan
                                </div>
                            </li>
                            @endcan

                            <li class="nav-item dropdown">
                                <a id="navbarDropdownEvent" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Event <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownEvent">

                                        <a class="nav-link" href="{{ route('eventlist') }}"> List Event</a>

                                        <a class="nav-link" href="{{ route('addevent') }}"> Create Event</a>

                                </div>
                            </li>

                            @can('managePackageAccess')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownPackage" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Package <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPackage">
                                    <a class="nav-link" href="{{ route('listpackage') }}"> Manage Package</a>
                                    <a class="nav-link" href="{{ route('addpackage') }}"> Add Package</a>
                                </div>
                            </li>
                            @endcan


                            <li class="nav-item dropdown">
                                <a id="navbarDropdownStores" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Stores <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownStores">
                                    <a class="nav-link" href="{{ route('storelist') }}"> Manage Stores</a>
                                    <a class="nav-link" href="{{ route('addstore') }}"> Add Stores</a>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="languanavbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->person->firstname }} {{ Auth::user()->person->lastname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="languagenavbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Lang <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagenavbarDropdown">
                                   <a class="dropdown-item" href="{{route('localisation',['locale'=>'en'])}}" id="en">English <img src="{{asset('img/en.png')}}" width="50px" height="20x"></a>

                                    <a class="dropdown-item" href="{{route('localisation',['locale'=>'de'])}}" id="de">Dutch <img src="{{asset('img/zh.png')}}" width="50px" height="20x"></a>
                                </div>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
