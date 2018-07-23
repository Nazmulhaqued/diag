@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => '/save-Copyright','enctype'=>'multipart/form-data', 'method'=>'post']) !!}
         	<div class="">
          <h2>
            <?php
              $message = Session::get('storeCategory');
              if($message){
                echo $message;
                Session::put('storeCategory','');
              }
            ?>
          </h2>



            <div class="col-md-12 form-group">
              <label class="form-control-label">Title</label>
              <input type="text" class="form-control" name="text" placeholder="Title">
            </div>

            <div class="col-md-12 form-group">
              <label class="form-control-label">Link</label>
              <input type="text" class="form-control" name="link" placeholder="link">
            </div>

             <div class="clearfix" style="height:30px;"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Create</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
 	<!---->
 </div>

 @endsection