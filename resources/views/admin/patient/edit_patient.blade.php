@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-patient','enctype'=>'multipart/form-data','name'=>'edit.product', 'method'=>'post']) !!}
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
              <input type="text" class="form-control" name="patient_name" value="{{$patient_info->patient_name}}" placeholder="Name" required="">
              <input type="hidden" class="form-control" name="patient_id" value="{{$patient_info->patient_id}}" placeholder="Name" required="">
            </div>

            <div class="col-md-12 form-group">
              <label class="form-control-label">Gender</label><br/>
               <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
            </div>

             <div class="col-md-6 form-group">
              <label class="form-control-label">Age</label>
              <input type="text" value="{{$patient_info->age}}" class="form-control" name="age" placeholder="Age" required="">
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

            <!--  -->
            
            <div class="clearfix"> </div>
            </div>

             <div class="col-md-6 form-group group-mail" style="margin-top:20px;">
              <label class="form-control-label">Test Names </label><br/>
             
      
            <?php 
              $test_names = DB::table('test_names')
                                ->get();
              ?>
            @foreach($test_names as $v_test_names)
            <input type="checkbox" name="test_name[]" value="{{ $v_test_names->test_name }}">  {{ $v_test_names->test_name }}
            @endforeach
           
           </div>

            <div class="row container">
            <div class="col-md-4 form-group">
              <label class="form-control-label">Paid</label>
              <input type="text" class="form-control" value="{{$patient_info->total_paid}}" name="paid" placeholder="Paid" required="">
            </div>
            <div class="col-md-4 form-group">
              <label class="form-control-label">Due</label>
              <input type="text" class="form-control" value="{{$patient_info->total_due}}" name="due" placeholder="Paid" required="">
            </div>
            </div>

            <div class="row container">
            <div class="col-md-6 form-group2 group-mail">
              <label class="form-control-label">Due Paid By</label>
            <?php
              $category_name = DB::table('doctorrefs')
              ->get();

              ?>
            <select name="due_paid_by" class="form-control">
              <option value="">Pay By Referrence</option>
            @foreach($category_name as $vcategory_name)
              <option value="{{$vcategory_name->doctorrefs_id}}">{{$vcategory_name->doctorName}}</option>
              @endforeach
            </select>

            </div>

             <div class="col-md-6 form-group">
              <label class="form-control-label">Price Total</label>
              <input type="text" value="{{$patient_info->price_total}}" class="form-control" name="price_total" placeholder="price_total" required="">
            </div>
           </div>

            <div class="col-md-6 form-group">
              <label class="form-control-label">Commission Total</label>
              <input type="text" value="{{$patient_info->commission_total}}" class="form-control" name="commission_total" placeholder="commission_total" required="">
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

<script>
  tinymce.init({
    selector: '#mytextarea',
    force_br_newlines : false,
    force_p_newlines : false,
    forced_root_block : ''
  });
</script>
 @endsection