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
	      <th scope="col">Doctor/Ref Name</th>
	      <th scope="col"> Description</th>
	      <th scope="col">Publication Status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($category_names as $vcategory_names)
	    <tr>
	      <th scope="row">
	      {{$vcategory_names->doctorrefs_id}}</th>
	      <td>{{$vcategory_names->doctorName}}</td>
	      <td>{{$vcategory_names->doctorDescription}}</td>
	      @if($vcategory_names->publicationStatus ==1)
	      <td>Publish</td>
	      @else
	      <td>Unpublish</td>
	      @endif
	      <td><a href="{{url('/view-doctor/'.$vcategory_names->doctorrefs_id)}}">View</a> | <a href="{{url('/edit-doctor/'.$vcategory_names->doctorrefs_id)}}">Edit</a> | <a href="{{url('/delete-doctor/'.$vcategory_names->doctorrefs_id)}}">Delete</a></td>
	      @endforeach
	    </tr>
	  </tbody>
	</table>
</div>
@endsection