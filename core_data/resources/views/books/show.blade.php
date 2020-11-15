@extends('layouts.app')

@section('content')

    <br>

    <h1>Book Show</h1>

    <form class="form-horizontal">
        @csrf
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Cover</label>
            <div class="col-xs-12">

            <img src="{{asset('http://leedavidsoncontentmanagementsystem1.com/CodeLaravel5/bookstore_application/core_data/storage/app/public/'.$book->cover_image)}}" height="180" width="150" class="img-rounded">

            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">ISBN</label>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="isbn" placeholder="{{$book->isbn}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="title" placeholder="{{$book->title}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Author</label>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="author" placeholder="{{$book->author}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Category</label>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="category" placeholder="{{$book->category}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Price</label>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="price" placeholder="{{$book->price}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="back" class="col-sm-2 control-label"></label>
            <div class="col-xs-12">
                <a href="{{ url('index')}}" class="btn btn-primary form-control">Back</a>
            </div>
        </div>
    </form>

@endsection