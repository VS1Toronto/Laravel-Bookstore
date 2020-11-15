<nav class="navbar navbar-expand-md navbar-light navbar-laravel">

<div class="container">

    <a class="navbar-brand" href="{{ url('/home') }}" style="margin-left: 7px;">
        {{ config('app.name', 'Bookstore') }}
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <!-- Authentication Links -->
            @guest

            @else
                
                <li class="nav-item">
                	<a class="nav-link" href="{{ url('/home') }}" style="margin:left: 100px;">&nbsp;&nbsp;Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/index') }}" style="">&nbsp;&nbsp;Books</a>
                </li>

                <li class="nav-item">
                    <a  class="nav-link" href="{{ url('/create') }}" style="">&nbsp;&nbsp;Create</a>
                </li>

            @endguest
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


                <div class="container">    
                    <!-- Right Side Of Navbar -->
                    <!-- -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Searchbar -->
                        <!-- -->
                        <form action="http://leedavidsoncontentmanagementsystem1.com/CodeLaravel5/bookstore_application/core_data/public/search" method="POST" role="search" style="right: 0px; width: 300px;">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                    placeholder="Search books"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </ul>   
                </div>
 

            @else


                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        &nbsp;&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
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


                <div class="">    
                    <!-- Right Side Of Navbar -->
                    <!-- -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Searchbar -->
                        <!-- -->
                        <form action="http://leedavidsoncontentmanagementsystem1.com/CodeLaravel5/bookstore_application/core_data/public/search" method="POST" role="search" style="right: 0px; width: 300px;">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                    placeholder="Search books"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </ul>   
                </div>

            @endguest
        </ul>



    </div>
</div>



</nav>
