<?php

namespace App\Http\Controllers;


use App\Book;
use App\Http\Requests;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;

//  This is to delete images from public storage
//
Use Illuminate\Support\Facades\Storage;

use Response;
use Auth;

//  POSTMAN SETUP
//  Validator brought in because we want to say 
//  what we want done with errors so we do it this way
//
use Validator;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $books = Book::orderBy('id', 'asc')->paginate(3);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required|unique:books|regex:/^[-z0-9\-\s]+$/',
            'title' => 'required|max:191',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',

            //  With a lot of Apache servers the default upload size is
            //  two megabytes so if we dont set the max size of the image 
            //  under that then there is a chance that it will throw an error
            //  if the user uploads a file with a bigger size than two megabytes
            //
            //  !!! Remember     'enctype' => 'multipart/form-data'     in blade view
            //
            'cover_image' => 'image|nullable'
        ]);


        //  Handle Image File Upload
        //
        if($request->hasFile('cover_image')){

            $file = $request->file('cover_image');
            
            //  Get filename with the extension
            //
            $filenameWithoutExt = $request->file('cover_image')->getClientOriginalName();

            //  Get just filename - this extracts the filename without the extension
            //
            $filename = pathinfo($filenameWithoutExt, PATHINFO_FILENAME);

            //  Get just the extension
            //
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //  Filename to store
            //
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //  Upload Image
            //     
            $email = Auth::user()->email;

            $destination = '/app/'.'/public';

            $imagePath = storage_path().'/'.$destination;
            
            $path = $request->file('cover_image')->move($imagePath, $filenameToStore);

        } else {
            $filenameToStore = 'noimage.png';
        }

        // Create Book
        //
        $book = new Book;
        $book->isbn = $request->input('isbn');
        $book->title= $request->input('title');
        $book->author = $request->input('author');
        $book->category = $request->input('category');
        $book->price = $request->input('price');
        $book->email = Auth::user()->email;
        $book->cover_image = $filenameToStore;
        $book->save();

        return redirect('index')->with('success', 'Book Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //-----------------------------------------------------------------------------------------------
        //  This code makes sure only the user that created the book can update it
        //
        $email = Auth::user()->email;

        $book = Book::find($id);

        if($email !== $book->email) {
            return redirect('/index')->with('error', 'Unauthorized User - cannot update this book');
        }
        //-----------------------------------------------------------------------------------------------


        $book = Book::find($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',

            //  With a lot of Apache servers the default upload size is
            //  two megabytes so if we dont set the max size of the image 
            //  under that then there is a chance that it will throw an error
            //  if the user uploads a file with a bigger size than two megabytes
            //
            //  !!! Remember     'enctype' => 'multipart/form-data'     in blade view
            //
            'cover_image' => 'image|nullable'
        ]);

        //  Handle Image File Upload
        //
        if($request->hasFile('cover_image')){

            $file = $request->file('cover_image');
            
            //  Get filename with the extension
            //
            $filenameWithoutExt = $request->file('cover_image')->getClientOriginalName();

            //  Get just filename - this extracts the filename without the extension
            //
            $filename = pathinfo($filenameWithoutExt, PATHINFO_FILENAME);

            //  Get just the extension
            //
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //  Filename to store
            //
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //  Upload Image
            //     
            $email = Auth::user()->email;

            $destination = '/app/'.'/public';

            $imagePath = storage_path().'/'.$destination;
            
            $path = $request->file('cover_image')->move($imagePath, $filenameToStore);

        }

        // Update Book
        //
        $book = Book::find($id);
        $book->isbn = $book->isbn;
        $book->title= $request->input('title');
        $book->author = $request->input('author');
        $book->category = $request->input('category');
        $book->price = $request->input('price');
        $book->email = Auth::user()->email;
        if($request->hasFile('cover_image')){
            $book->cover_image = $filenameToStore;
        }
        $book->save();
       
        return redirect('/index')->with('success', 'Book Updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //-----------------------------------------------------------------------------------------------
        //  This code makes sure only the user that created the book can delete it
        //
        $email = Auth::user()->email;

        $book = Book::find($id);

        if($email !== $book->email) {
            return redirect('/index')->with('error', 'Unauthorized User - cannot delete this book');
        }
        //-----------------------------------------------------------------------------------------------


        if($book->cover_image != 'noimage.png'){

            //  Delete book cover image from storage - sim link ensures public storage deletion
            //
            Storage::delete('public/'.$book->cover_image);
        }


        Book::find($id)->delete();
        return redirect('/index')->with('success', 'Book Deleted');


    }
}