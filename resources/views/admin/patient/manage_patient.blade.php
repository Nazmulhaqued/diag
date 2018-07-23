@extends('admin.admin_master')

@section('admin_content')

<div class="agile-tables">
	<h2 style="color: green;">
		<?php
			$message = Session::get('deleteCategory');
			if($message){
				echo $message;
				Session::put('deleteCategory','');
			}
		?>
	</h2>
	<h2 style="color: green">
         	<?php
         		$message = Session::get('updateCategory');
         		if($message){
         			echo $message;
         			Session::put('updateCategory','');
         		}
         	?>
         		
         	</h2>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Product Name</th>
	      <th scope="col">Product Description</th>
	      <th scope="col">Category</th>
	      <th scope="col">Publication Status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($all_patients as $v_all_patients)	
           
	    <tr>
	      <th scope="row">
	      {{$v_all_patients->patient_id}}</th>
	      <td>{{$v_all_patients->patient_name}}</td>
	      <td>{{$v_all_patients->gender}}</td>
	      <td>{{$v_all_patients->test_name}}</td>
	      @if($v_all_patients->publicationStatus ==1)
	      <td>Publish</td>
	      @else
	      <td>Unpublish</td>
	      @endif
	      <td><a href="{{url('/view-patient/'.$v_all_patients->patient_id)}}">View</a> | <a href="{{url('/edit-patient/'.$v_all_patients->patient_id)}}">Edit</a> | <a href="{{url('/delete-patient/'.$v_all_patients->patient_id)}}">Delete</a></td>
	      @endforeach
	    </tr>
	  </tbody>
	</table>
</div>
@endsection