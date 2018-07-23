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
	      <th scope="col"># Order Id</th>
	      <th scope="col"> Order Total</th>
	      <th scope="col"> Order Status</th>
	      <th scope="col">Payment Type</th>
	      <th scope="col">Customer Name</th>
	      <th scope="col">Order Date</th>
	    </tr>
	  </thead>
	  <tbody>
	 @foreach($allOrders as $v_allOrders)
	    <tr>
	      <th scope="row">
	      {{ $v_allOrders->order_id }}</th>
	      <td>{{ $v_allOrders->order_total}}</td>
	      <td>{{ $v_allOrders->order_status}}</td>
	      <td>{{ $v_allOrders->payment_type}}</td>
	      <td>{{ $v_allOrders->shipping_name }}</td>
	      <td>{{ $v_allOrders->created_at }}</td>
	      <td><a href="{{url('view-order/'.$v_allOrders->order_id)}}">View</a> | <a href="{{url('/edit-Order/'.$v_allOrders->order_id)}}">Edit</a> | <a href="{{url('/delete-order/'.$v_allOrders->order_id)}}">Delete</a></td>
	    </tr>
	  @endforeach
	  </tbody>
	</table>
</div>
@endsection