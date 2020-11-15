<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">


<style>
    
    .table {
        width: 100%;
         -webkit-overflow-scrolling: touch;
        overflow-x: auto;
        display: block;
    }    
    
</style>

	
</head>
<body>

@extends('layouts.app')

@section('content')

	<div class="container">

		<br>

		<h1>Books Index</h1>
			<a href="{{url('create')}}" class="btn btn-success">Create Book</a>
		<hr>
	 </div>

    <div class="container">
	    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-info">
					<th>Id</th>
					<th>ISBN</th>
					<th>Title</th>
					<th>Author</th>
					<th>Category</th>
					<th>Price</th>
					<th>Cover</th>
					<th colspan="3">Actions</th>
				</tr>
			</thead>
		<tbody>
		@foreach ($books as $book)
			<tr>
				<td>{{ $book->id }}</td>
				<td>{{ $book->isbn }}</td>
				<td>{{ $book->title }}</td>
				<td>{{ $book->author }}</td>
				<td>{{ $book->category }}</td>
				<td>{{ $book->price }}</td>
				<td><img src="{{asset('http://leedavidsoncontentmanagementsystem1.com/CodeLaravel5/bookstore_application/core_data/storage/app/public/'.$book->cover_image)}}" height="35" width="30"></td>

				<td><a href="{{url('show',$book->id)}}" class="btn btn-primary">Display</a></td>
				<td><a href="{{url('edit',$book->id)}}" class="btn btn-warning">Update</a></td>
				<td><a href="{{url('delete',$book->id)}}" class="btn btn-danger">Delete</a></td>             
			</tr>
		@endforeach  
		{{ $books->links() }}         
		</tbody>
	</table>

 </div>

@endsection


</body>
</html>