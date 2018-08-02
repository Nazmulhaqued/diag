@extends('admin.admin_master');

@section('admin_content')

<div class="validation-form">
 	<!---->
  	    
        {!! Form::open(['url' => 'update-product','enctype'=>'multipart/form-data','name'=>'edit.product', 'method'=>'post']) !!}
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
              <label class="form-control-label"><b>Patient Name :</b>{{$patient_info->patient_name}} </label>
            </div>

            <div class="col-md-12 form-group">
              <label class="form-control-label"><b>Gender :</b> {{$patient_info->gender}}</label><br/>
            </div>

             <div class="col-md-6 form-group">
              <label class="form-control-label"><b>Age :</b> {{$patient_info->age}}</label>
            </div>

            <div class="col-md-6 form-group2 group-mail">
        	<?php
        		$ref_doctor = DB::table('doctorrefs')
        						->where('doctorrefs_id',$patient_info->doctorrefs_id)
        						->first();
        	?>
              <label class="form-control-label"><b>Dr/Ref By :</b>{{$ref_doctor->doctorName }}</label>
            
            </div>
            
            <div class="clearfix"> </div>
            </div>

             <div class="col-md-6 form-group group-mail" style="margin-top:20px;">
              <label class="form-control-label">Test Names </label><br/>
             
      
            <?php 
              $commaString = $patient_info->test_name; 
              $myArray = explode(', ', $commaString);
              $array_count = count($myArray)-1;

              for($i=0; $i<=$array_count; $i++){
              ?>
            <input type="checkbox" name="test_name[]" value="{{ $patient_info->test_name[$i] }}" checked >  {{ $myArray[$i] }}
           
          <?php } ?>
           
           </div>
            
            <div class="row container">
            <div class="col-md-4 form-group">
              <label class="form-control-label">Paid</label>
              <input type="text" class="form-control" value="{{$patient_info->total_paid}}" name="paid" placeholder="Paid" required="">
            </div>
            <div class="col-md-4 form-group">
              <label class="form-control-label">Due</label>
              <input type="text" class="form-control" value="{{$patient_info->total_due}}" name="paid" placeholder="Paid" required="">
            </div>
            </div>

            <?php 
            	$due_check = $patient_info->total_due;
            if($due_check >=0){?>
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
        	<?php } ?>
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