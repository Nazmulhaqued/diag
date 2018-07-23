@extends('admin.admin_master')

@section('admin_content')

<div class="agile-tables">
	<h2 style="color: red;">
		<?php
			$message = Session::get('deleteSlider');
			if($message){
				echo $message;
				Session::put('deleteSlider','');
			}
		?>
	</h2>
	
	<table class="table table-hover">
	  <thead>
	    <tr>
	    

	      <th scope="col">#</th>
	      <th scope="col">Slider Title</th>
	      <th scope="col">Slider Link</th>
	      <th scope="col">Icon Class</th>
	      <th scope="col">Slider Description</th>
	      <th scope="col">publication_status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($manage_services as $v_manage_services)
	    <tr>
	      <th scope="row">
	      {{$v_manage_services->services_id}}</th>
	      <td>{{$v_manage_services->service_title}}</td>
	      <td>{{$v_manage_services->link}}</td>
	      <td>{{$v_manage_services->service_icon}}</td>
	      <td>{{$v_manage_services->service_description}}</td>
	      
	      @if($v_manage_services->publication_status ==1)
	      <td>Publish</td>
	      @else
	      <td>Unpublish</td>
	      @endif
	      <td> <a href="{{url('/edit-service/'.$v_manage_services->services_id)}}">Edit</a> | <a href="{{url('/delete-service/'.$v_manage_services->services_id)}}">Delete</a></td>
	      @endforeach
	    </tr>
	  </tbody>
	</table>
</div>
@endsection