@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-doctor','method'=>'post','enctype'=>'multipart/form-data']) !!}
         	<div class="vali-form">
          
         	  <div class="col-md-12 form-group">
              <label class="form-control-label">Doctor/Ref Name</label>
              <input type="text" name="doctorName" class="form-control" value="{{$category_info->doctorName}}" required="">
              <input type="hidden" name="doctorrefs_id" value="{{$category_info->doctorrefs_id}}" required="">
            </div>
            
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-12 form-group">
              <label class="form-control-label">Doctor Description</label>
              <textarea name="categoryDescription" class="form-control" required="">{{$category_info->doctorDescription}}</textarea>
            </div>
             <div class="clearfix"> </div>

              <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Publication Status</label>
            <select name="publicationStatus"  class="form-control">
            	<option value="1">Publish</option>
            	<option value="0">Unpublish</option>
            </select>
            </div>
             <div class="clearfix" style="height:30px;"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
 	<!---->
 </div>

 @endsection