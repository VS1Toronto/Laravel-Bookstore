<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bookstore</title>

    <!-- This links the public file at directory app/public/css/app.css -->
    <!-- it contains the css of everything CSS Bootstrap Scss and Custom.scss -->
    <!-- it gets compiled into this file by npm when the command   npm run dev   is used -->
    <!-- -->
    <!-- !!!Remember to clear cache to have changes take effect!!! -->
    <!-- -->
    <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
 

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
        height: 50px; /* .push must be the same height as .footer */
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
<div class="wrapper">

@include('includes.navbar')

<!-- The container wraps everything so the text on the left is indented right -->
<!-- -->
<div class="container">
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






<!-- Holds down footer-->
<!-- -->
<div class="push">

</div>



<!-- End Wrapper-->
<!-- -->
</div>

<footer class="footer">
    <p class="text-center">Copyright 2019 &copy; Bookstore</p>
</footer>


</body>
</html>
