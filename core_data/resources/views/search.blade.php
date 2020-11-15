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

<br>

<!-- The container wraps everything so the text on the left is indented right -->
<!-- -->
<div class="container">

@section('sidebar')

    <div class="container">

        @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Book Details</h2>
        <table class="table">
            <thead>
            <!--
                <tr>
                    <th></th>
                </tr>
                    <th></th>
                </tr>
            -->
            </thead>
            <tbody>
                @foreach($details as $book)
                <tr>
                    <td>ISBN&nbsp;&nbsp;&nbsp;{{ $book->isbn}}</td>
                </tr>
                <tr>
                    <td>Title&nbsp;&nbsp;&nbsp;{{$book->title}}</td>
                </tr>
                <tr>
                    <td>Author&nbsp;&nbsp;&nbsp;{{ $book->author}}</td>
                </tr>
                <tr>
                    <td>Category&nbsp;&nbsp;&nbsp;{{$book->category}}</td>
                </tr>
                <tr>
                    <td>Price&nbsp;&nbsp;&nbsp;{{ $book->price }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @elseif(isset($message))
        <p>{{ $message }}</p>
        @endif
</div>
@endsection


<!-- This is were the search results are sent -->
<!-- -->
<div class="col-xs-12">
    @include('includes.sidebar')
</div>


</div>



<!-- Holds down footer-->
<!-- -->
<div class="push">

</div>



<!-- End Wrapper-->
<!-- -->
</div>




</body>
</html>
