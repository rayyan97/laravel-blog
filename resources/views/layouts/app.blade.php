<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Scripts -->
    
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Admin Panel') }}
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      
                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                        My Profile
                                
                                 </a>

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

        @if (session()->has('success'))

            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                {{session()->get('success')}}
                </div>
            </div>
            
        @endif

        @if (session()->has('error'))

        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            {{session()->get('error')}}
            </div>
        </div>
        
    @endif
        
                @auth
                <main class="py-4">
                <div class="container">
                    <div class="row">
                <div class="col-md-4">
                    
                    {{-- <main class="py-4"> --}}
                    <div class="card mt-5">
                     
                      <div class="card-body">
                        {{-- <h4 class="card-title">Title</h4> --}}
                        {{-- <p class="card-text">y</p> --}}
                        <ul class="list-group">

                        @if (auth()->user()->isAdmin())
                        <li class="list-group-item"><a href="{{ route('user-page')}}">Users</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{ route('post.index') }}">Post</a></li>
                        <li class="list-group-item"><a href="{{ route('category.index') }}">Categories</a></li>
                        <li class="list-group-item"><a href="{{ route('tag.index') }}">Tag</a></li>
                        <li class="list-group-item"><a href="{{ route('trashed-post.index') }}">Trashed Posts</a></li>
                        </ul>
                      </div>
                    </div>
                  
                {{-- </main> --}}
                </div>
                <div class="col-md-8">
                   
                        @yield('content')
                   
                </div>
    
            </div>
        </div>
    </main>
              @else
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                        @yield('content')
                      </div>
                  </div>
              </div>
            
              
                @endauth


                @yield('modal')
               
           
       
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
