@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'save-test','method'=>'post']) !!}
         	<div class="vali-form">
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
              <label class="form-control-label">Test Name</label>
              <input type="text" class="form-control" name="testName" placeholder="Name" required="">
            </div>

            <div class="col-md-12 form-group group-mail">
            <label class="form-control-label">Test Description</label>
            <textarea name="testDescription" class="form-control" placeholder=" Description" ></textarea>
            </div>
            
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-12 form-group">
              <label class="form-control-label">Price</label>
               <input type="text" class="form-control" name="price" placeholder="Price" required="">
            </div>

             <div class="col-md-12 form-group">
              <label class="form-control-label">Commission %</label>
               <input type="text" class="form-control" name="commission" placeholder="Commission" required="">
            </div>
             <div class="clearfix"> </div>

              <div class="col-md-12 form-group group-mail">
              <label class="form-control-label">Publication Status</label>
            <select name="publicationStatus" class="form-control">
            	<option value="1">Publish</option>
            	<option value="0">Unpublish</option>
            </select>
            </div>
             <div class="clearfix" style="height:30px; "> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Create</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
 	<!---->
 </div>

 @endsection