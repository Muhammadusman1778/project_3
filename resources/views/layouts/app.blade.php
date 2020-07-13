<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32" style="margin-right: 8px;">
                                    @endif
                                    {{ auth()->user()->name }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
           <div class="row">
               <div class="col-md-4">
                   <a href="{{route('discussions.create')}}" class="btn btn-primary form-control mb-2" >
                       Create a discussion
                   </a>
                   <div class="card card-default">
                       <div class="card-header text-center" style="text-decoration: none">
                           <a href="/forum">Home</a>
                       </div>
                       <div class="card-body">
                           <ul class="list-group">
                               <li class="list-group-item">
                                   <a href="/" style="text-decoration: none">My Discussions</a>
                               </li>
                               <li class="list-group-item">
                                   <a href="/" style="text-decoration: none">Solved Discussions</a>
                               </li>
                               <li class="list-group-item">
                                   <a href="/" style="text-decoration: none">Unsolved Discussions</a>
                               </li>

                           </ul>
                       </div>
                   </div>

                   <div class="card card-default">
                       <div class="card-header text-center" style="text-decoration: none">
                           <a href="/">
                               Channels
                           </a>
                       </div>
                       <div class="card-body">
                           <ul class="list-group">

                               @foreach($channels as $channel)

                                   <li class="list-group-item">

                                       <a href="/">{{$channel->title}}</a>

                                   </li>

                                   @endforeach

                           </ul>

                       </div>
                   </div>

               </div>
               <div class="col-md-8">
                   @yield('content')
               </div>
           </div>
        </main>
    </div>


    @yield('scripts')

</body>
</html>
