@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
  <!---->
        
        {!! Form::open(['url' => 'save-patient','enctype'=>'multipart/form-data', 'method'=>'post']) !!}
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
              <label class="form-control-label">Patient Name</label>
              <input type="text" class="form-control" name="patient_name" placeholder="Name" required="">
            </div>

            <div class="col-md-12 form-group">
              <label class="form-control-label">Gender</label><br/>
               <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
            </div>

             <div class="col-md-6 form-group">
              <label class="form-control-label">Age</label>
              <input type="text" class="form-control" name="age" placeholder="Age" required="">
            </div>

            <div class="col-md-6 form-group2 group-mail">
              <label class="form-control-label">Dr/Ref By</label>
            <?php
              $category_name = DB::table('doctorrefs')
              ->get();

              ?>
            <select name="doctorrefs_id" class="form-control">

            @foreach($category_name as $vcategory_name)
              <option value="{{$vcategory_name->doctorrefs_id}}">{{$vcategory_name->doctorName}}</option>
              @endforeach
            </select>

            </div>

            <div class="col-md-6 form-group group-mail" style="margin-top:20px;">
              <label class="form-control-label">Test Name </label><br/>
              <?php
                  $test_name = DB::table('test_names')
                  ->get();

              ?>
      
            @foreach($test_name as $v_test_name)
            <input type="checkbox" name="test_name[]" value="{{$v_test_name->test_name}}">  {{$v_test_name->test_name}}&nbsp; &nbsp; 
              @endforeach

            </div>

            <div class="col-md-6 form-group group-mail" style="margin-top:20px;">
              <label class="form-control-label">Test Price </label><br/>
              <?php
                  $test_name = DB::table('test_names')
                  ->get();

              ?>
      
            @foreach($test_name as $v_test_name)
            <input type="checkbox" name="test_price[]" value="{{$v_test_name->test_price}}"> ৳ {{$v_test_name->test_price}} &nbsp; &nbsp; 
              @endforeach

            </div>

             <div class="col-md-6 form-group group-mail" style="margin-top:20px;">
              <label class="form-control-label">Test Commisiion </label><br/>
              <?php
                  $test_name = DB::table('test_names')
                  ->get();

              ?>
      
            @foreach($test_name as $v_test_name)
            <input type="checkbox" name="test_commission[]" value="{{$v_test_name->test_commission}}"> ৳ {{$v_test_name->test_commission}} &nbsp; &nbsp; 
              @endforeach

            </div>
            
            <div class="clearfix"> </div>
            </div>
            
            <!-- <div class="col-md-12 form-group">
              <label class="form-control-label">Patient Short Description</label>
              <textarea name="product_shortdescription" id="" class="form-control" placeholder=" Short Description" required=""></textarea>
            </div>

            <div class="col-md-12 form-group1 ">
              <label class="control-label">Patient Long Description</label>
              <textarea name="product_Longdescription" id="mytextarea" class="form-control" placeholder=" Long Description" ></textarea>
            </div> -->

            <div class="col-md-6 form-group">
              <label class="form-control-label">Paid</label>
              <input type="text" class="form-control" name="paid" placeholder="Paid" required="">
            </div>

              <div class="col-md-6 form-group2 group-mail">
              <label class="form-control-label">Due Paid By</label>
            <?php
              $category_name = DB::table('doctorrefs')
              ->get();

              ?>
            <select name="due_paid_by" class="form-control">

            @foreach($category_name as $vcategory_name)
              <option value="">Pay By Referrence</option>
              <option value="{{$vcategory_name->doctorrefs_id}}">{{$vcategory_name->doctorName}}</option>
              @endforeach
            </select>

            </div>
            

            <div class="col-md-4 form-group2 group-mail">
            <label class="form-control-label">Publication Status</label>
            <select name="publicationStatus" class="form-control">
              <option value="1">Publish</option>
              <option value="0">Unpublish</option>
            </select>
            </div>
             <div class="clearfix" style="height:30px;"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit"  class="btn btn-primary">Create</button>
              <button type="reset" class="btn btn-default btn-danger">Reset</button>
            </div>
          <div class="clearfix"> </div>
        {!! Form::close() !!}
    
  <!---->
 </div>


 @endsection