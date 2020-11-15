@extends('layouts.app')

@section('content')

    <br>

    <h1>Create Book</h1>

    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="form-group">
        {{Form::label('ISBN', 'ISBN:')}}
        {{Form::text('isbn',null,['class'=>'form-control', 'placeholder' => 'ISBN'])}}
    </div>
    <div class="form-group">
        {{Form::label('Title', 'Title:')}}
        {{Form::text('title',null,['class'=>'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('Author', 'Author:')}}
        {{Form::text('author',null,['class'=>'form-control', 'placeholder' => 'Author'])}}
    </div>
    <div class="form-group">
        {{Form::label('Category', 'Category')}}
        {{Form::text('category',null,['class'=>'form-control', 'placeholder' => 'Category'])}}
    </div>
    <div class="form-group">
        {{Form::label('Price', 'Price:')}}
        {{Form::text('price',null,['class'=>'form-control', 'placeholder' => 'Price'])}}
    </div>
    <div class="form-group">
        {{Form::label('Image', 'Image:')}}
        <br>
        {{Form::file('cover_image')}}
    </div>
    <div class="form-group">
        {{Form::label('Save', '')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary form-control'])}}
    </div>
    {!! Form::close() !!}	
@endsection