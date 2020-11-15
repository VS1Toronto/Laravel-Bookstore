<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category',
        'price',
        'email',
        'cover_image'
    ];

    //  By default Eloquent will name a models table in the
    //  MySQL database the plural of its name so Book model
    //  will have books table
    //
    //  This code below is how you override that and change
    //  the table name if you want to but in our case we
    //  are just going to leave it named books so this
    //  line is only here for reference and example
    //
    //  Table Name
    //
    protected $table = 'books';


    //  Again this is the same as above
    //
    //  Primary Key
    //
    public $primaryKey = 'id';

    
    //  If you dont want timestamps you can set this
    //  to false
    //
    //  Timestamps
    //
    public $timestamps = true;


    //  This is the inverse of
    //  
    //  public function books(){
    //      return $this->hasMany('App\Book');
    //  }
    //
    //  The code below is creating a relationship
    //  between a Book and a User
    //
    //  Since we are in the Book model then the code
    //  below achieves that
    //
    //  In English what this is saying is that a Book
    //  has a relationship with a user and it
    //  belongs to a user
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    //
    //------------------------------------------
    //  Inverse over in User model to complete
    //  the relationship for Eloquent
    //
    //  public function books(){
    //      return $this->hasMany('App\Book');
    //  }
    //
    //------------------------------------------
}

