<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bookstore') }}</title>

    <!-- Scripts -->
    <!-- -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Footer -->
    <!-- -->
    <style>

        * {
            margin: 0;
        }
        html, body {
            height: 100%;
        }
        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -50px; /* the bottom margin is the negative value of the footer's height */
        }

        .footer, .push {
            margin-top:4px; /* added here because the footer settings changed for some reason probably an update of something */
            height: 50px;   /* .push must be the same height as .footer */
        }

        .footer {
            position:absolute;
            width:100%;
            bottom:0;
            margin-top:30px;
            padding:10px;
            color:#fff;
            background:#B2B2B2;
        }

    </style>

</head>
<body>
    <div id="app">

    @include('includes.navbar')


    <!-- The container wraps everything so the text on the left is indented right -->
    <!-- -->
    <div class="container"  style="height: 694px;">


        @if(Request::is('home'))
            @include('includes.showcase')
        @endif


        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <!-- This pulls in the error message functionality from folder inc and file messages.blade.php -->
                <!-- -->
                @include('includes.messages')

                @if(Request::is('home') == false)
                    @yield('content')
                @endif
            </div>

        
            <div class="col-md-2 col-lg-2">
                @include('includes.sidebar')
            </div>

        </div>
    </div>

    <!-- <main class="py-4">
        @yield('content')
    </main> -->


    <!-- Holds down footer-->
    <!-- -->
    <div class="push">

    </div>


    <!-- End Wrapper-->
    <!-- -->
    </div>


    <footer class="footer" style="position:relative; margin-top: 120px;">
        <p class="text-center">Copyright 2019 &copy; Bookstore</p>
    </footer>    

</body>
</html>
