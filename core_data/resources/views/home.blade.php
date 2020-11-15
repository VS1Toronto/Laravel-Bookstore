@extends('layouts.app')

@section('content')
<div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">Dashboard
                    
                    </div>

                    <div class="panel-body">
                        
				        @if (Auth::guest())

				        @else
				            
                            <form method="POST" action="upload" enctype="multipart/form-data">

                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!

                            {!! csrf_field() !!}

                            <?php
                            
                            //  This is how to check if the user is logged in which is necessary
                            //  because until then you can't use     $email = Auth::user()->email;
                            //  as the user is not logged in hence not     authorized     and using
                            //  the     Auth::     will cause an error to be returned until login is true
                            //
                            if($user = Auth::user())
                            {
                                //  This how to get the user     email     which is 
                                //  necessary to identify the     user     in the database
                                $email = Auth::user()->email;


                                $user_name_for_image_file = $email;
                                
 
	                            
                                //  This is how to make a folder
                                //
                                //  It creates it in the directory     storage
                                //
                                //  When it creates it in storage it automatically creates the directory     app
                                //  within     storage     before creating whatever string or variable value is put in the
                                //  makeDirectory function as an argument
                                //
                                //  !!! Using sim-link so this is unnecessary but left for reference !!!
                                //
                                //if (!file_exists('../storage'.'/app/'.$user_name_for_image_file)) 
                                //{
                                //    Storage::makeDirectory($user_name_for_image_file);
                                //}
                            }

                        	?>

                        	
                            <button type="submit" class="btn btn-default">Upload</button>

                        </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
