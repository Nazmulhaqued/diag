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
	      <th scope="col">Test Name</th>
	      <th scope="col">Test Description</th>
	      <th scope="col">Test Price</th>
	      <th scope="col">Test Commission</th>
	      <th scope="col">Publication Status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($subcategory_names as $vsubcategory_names)
	    <tr>
	      <th scope="row">
	      {{$vsubcategory_names->test_name_id}}</th>
	      <td>{{$vsubcategory_names->test_name}}</td>
	      <td>{{$vsubcategory_names->test_description}}</td>
	      <td>{{$vsubcategory_names->test_price}}</td>
	      <td>{{$vsubcategory_names->test_commission}}</td>

	      @if($vsubcategory_names->publication_status ==1)
	      <td>Publish</td>
	      @else
	      <td>Unpublish</td>
	      @endif
	      <td> <a href="{{url('/edit-test/'.$vsubcategory_names->test_name_id)}}">Edit</a> | <a href="{{url('/delete-test/'.$vsubcategory_names->test_name_id)}}">Delete</a></td>
	      @endforeach
	    </tr>
	  </tbody>
	</table>
</div>
@endsection