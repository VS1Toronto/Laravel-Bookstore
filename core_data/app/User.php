<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //  This is a one to many relationship
    //
    //  This is creating a relationship between a User
    //  and a Book once the inverse of the code below is placed
    //  in the Book model the inverse being
    //
    //  public function user(){
    //      return $this->belongsTo('App\User');
    //   }
    //
    //---------------------------------------------------------------------------
    //  IMPORTANT
    //
    //  Eloquent will automatically determine the proper
    //  foreign key column on the     Book     model
    //
    //  By convention Eloquent will take the 
    //
    //              SNAKE CASE      ( Snake case is word_word_word_word_word.php)
    //
    //  name of the     
    //
    //              OWNING MODEL    ( The Book Model )
    //
    //  and suffix it with
    //
    //                  _id
    //
    //  so for example Eloquent will assume the foreign
    //  key for the User model on the Book model is
    //
    //                  
    //                  book_id
    //
    //
    //  IN ENGLISH - WHY DO THIS WHAT IS IT FOR?
    //
    //  Once this relationship has been defined we can
    //  access the collection of    Books     properties
    //
    //  Since Eloquent provides     Dynamic Properties
    //  we can access relationship methods as if they
    //  were defined as properties on the model
    //
    //  properties means variables
    //
    //  PHP MANUAL DEFINITION OF PROPERTY
    //
    //  Class member variables are called properties.
    //  You may also see them referred to using other
    //  terms such as "attributes" or "fields" but for
    //  the purposes of this reference we will use "properties".
    //  They are defined by using one of the keywords "public"
    //  "protected" or "private" followed by a normal variable
    //  declaration. This declaration may include an initialization
    //  but this initialization must be a constant value. That means
    //  it must be evaluated at compile time and must not depend on
    //  run-time information in order to be evaluated.
    //
    //---------------------------------------------------------------------------
    //
    //  Since we are in the User model then the code
    //  below achieves that
    //
    //  In ENGLISH this is saying a User has many Books
    //  because a user can have many books
    //
    //  In ENGLISH we do this so that we can now access
    //  the values on the Book object from the User object
    //
    public function books(){
        return $this->hasMany('App\Book');
    }
    //
    //------------------------------------------
    //  Inverse over in Post model to complete
    //  the relationship for Eloquent
    //
    //  public function user(){
    //      return $this->belongsTo('App\User');
    //   }
    //
    //------------------------------------------
}
