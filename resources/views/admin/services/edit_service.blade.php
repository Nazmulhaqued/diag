@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-service','enctype'=>'multipart/form-data','name'=>'edit.product', 'method'=>'post']) !!}
         	<div class="">
         
          </h2>
            <div class="col-md-12 form-group">
              <label class="form-control-label">Service Title</label>
              <input type="text" class="form-control" name="service_title" value="{{$service_item_info->service_title }}" placeholder="Name" required="" />
              <input type="hidden" name="services_id" value="{{$service_item_info->services_id}}" placeholder="Name" required="" />
            </div>

            <div class="col-md-6 form-group">
              <label class="form-control-label">Service Link</label>
              <input type="text" class="form-control" name="link" value="{{$service_item_info->link}}" placeholder="Name" required="">
            </div>

            <div class="col-md-6 form-group">
              <label class="form-control-label">Service Icon</label>
              <input type="text" class="form-control" name="service_icon" value="{{$service_item_info->service_icon}}" placeholder="Name" required="">
            </div>


            <div class="col-md-6 form-group">
              <label class="form-control-label">Service Description</label>
              <input type="text" class="form-control" name="service_description" value="{{$service_item_info->service_description}}" placeholder="Name" required="">
            </div>

          <div class="clearfix"> </div>

              <div class="col-md-12 form-group group-mail">
              <label class="control-label">Publication Status</label>
            <select name="publication_status" class="form-control">
            	<option value="1">Publish</option>
            	<option value="0">Unpublish</option>
            </select>
            </div>
             <div class="clearfix" style="30px;"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
 	<!---->
 </div>

 @endsection