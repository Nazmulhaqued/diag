@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-copyright','enctype'=>'multipart/form-data','method'=>'post']) !!}
         	<div class="">
          <h5>
            <?php
              $message = Session::get('updateSlider');
              if($message){
                echo $message;
                Session::put('updateSlider','');
              }
            ?>
          </h5>

          <div class="clearfix"> </div>

          <div class="col-md-6 form-group">
              <label class="form-control-label">Title</label>
              <input type="text" class="form-control" name="text" value="{{$copyright_info->text}}" placeholder="Title">
              <input type="hidden" class="form-control" name="copyright_id" value="{{$copyright_info->copyright_id}}" placeholder="Name" required="">
            </div>

            <div class="col-md-6 form-group">
              <label class="form-control-label">Link</label>
              <input type="text" class="form-control" name="link" value="{{$copyright_info->link}}" placeholder="Link">
            </div>

             <div class="clearfix"> </div>

             <div class="clearfix" style="50px;"> </div>
          
            <div class="col-md-15 form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
 	<!---->
 </div>

 @endsection