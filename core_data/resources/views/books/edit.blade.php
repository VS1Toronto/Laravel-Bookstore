@extends('layouts.app')

@section('content')

    <br>

    <h1>Update Book</h1>

    {!! Form::model($book,['method' => 'PUT','url'=>['update',$book->id], 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="form-group">
        <label for="isbn" class="col-sm-2 control-label">ISBN</label>
        <div class="col-xs-12">
            <input type="text" class="form-control" id="isbn" placeholder="{{$book->isbn}}" readonly>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Author', 'Author:') !!}
        {!! Form::text('author',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Category', 'Category:') !!}
        {!! Form::text('category',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Price', 'Price:') !!}
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {{Form::label('Image', 'Image:')}}
        <br>
        {{Form::file('cover_image')}}
    </div>
    <div class="form-group">
        {!! Form::label('Update', ' ') !!}
        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
  
@endsection