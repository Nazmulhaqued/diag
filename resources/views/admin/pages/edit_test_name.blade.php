@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-test','method'=>'post']) !!}
         	<div class="vali-form">
          
         	  <div class="col-md-12 form-group">
              <label class="form-control-label">Test Name</label>
              <input type="text" name="testName" class="form-control" value="{{ $subcategory_info->test_name}}" required="">
              <input type="hidden" name="test_name_id" value="{{$subcategory_info->test_name_id }}" required="">
            </div>
            
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-12 form-group">
              <label class="form-control-label">Test Description</label>
              <textarea name="testDescription" class="form-control" required="">{{$subcategory_info->test_description}}</textarea>
            </div>

             <div class="clearfix"> </div>

             <div class="col-md-12 form-group">
              <label class="form-control-label">Price</label>
              <input type="text" name="price" class="form-control" value="{{ $subcategory_info->test_price}}" required="">
            </div>

            <div class="col-md-12 form-group">
              <label class="form-control-label">Commission</label>
              <input type="text" name="commission" class="form-control" value="{{ $subcategory_info->test_commission}}" required="">
            </div>

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