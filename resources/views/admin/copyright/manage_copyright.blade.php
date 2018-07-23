@extends('admin.admin_master')

@section('admin_content')

<div class="agile-tables">
	<h5 style="color: red;">
		<?php
			$message = Session::get('deleteSlider');
			if($message){
				echo $message;
				Session::put('deleteSlider','');
			}
		?>
	</h5>
	<h5 style="color: green">
         	<?php
         		$message = Session::get('updateCategory');
         		if($message){
         			echo $message;
         			Session::put('updateCategory','');
         		}
         	?>
         		
         	</h5>
	<table class="table table-hover">
	  <thead>
	    <tr>
	    

	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Link</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($manage_copyright as $v_manage_copyright)
	    <tr>
	      <th scope="row">
	      {{$v_manage_copyright->copyright_id}}</th>
	      <td>{{$v_manage_copyright->text}}</td>
	      <td>{{$v_manage_copyright->link}}</td>

	      <td> <a href="{{url('/edit-copyright/'.$v_manage_copyright->copyright_id)}}">Edit</a> | <a href="{{url('/delete-Copyright/'.$v_manage_copyright->copyright_id)}}">Delete</a></td>
	      @endforeach
	    </tr>
	  </tbody>
	</table>
</div>
@endsection