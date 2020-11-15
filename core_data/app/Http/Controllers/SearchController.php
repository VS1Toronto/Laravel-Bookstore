<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
	/**
     * Search for books
     *
     */
    public function search()
    {
        $q = Input::get ( 'q' );
        if($q != ""){
            $book = Book::where ( 'ISBN', 'LIKE', '%' . $q . '%' )
                                    ->orWhere ( 'Title', 'LIKE', '%' . $q . '%' )
                                    ->orWhere ( 'Author', 'LIKE', '%' . $q . '%' )
                                    ->orWhere ( 'Category', 'LIKE', '%' . $q . '%' )
                                    ->orWhere ( 'Price', 'LIKE', '%' . $q . '%' )
                                    ->get ();
                                                            
            if (count ( $book) > 0) {
                return view ( 'search' )->withDetails ( $book)->withQuery ( $q );
            }
            else {}
                return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
            }


        Log::info('General information log');


        return view ( '/search' )->withMessage ( 'No Details found. Try to search again !' );       
    }
}
