@extends('admin.admin_master')

@section('admin_content')
<style type="text/css">
	.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #21568c;
    border-right: 1px solid #21568c;
    border-left: 1px solid #21568c;
}
.table td, .table th:nth {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #21568c;
    border-right: 1px solid #21568c;
    border-left: 1px solid #21568c;
}
</style>
<div style="margin:2%;">
	<?php
		$logo = DB::table('footer1')
					->where('publication_status',1)
					->first();
	?>
	<img src="{{asset($logo->logo)}}" style="width:155px; height:55px;">
</div>
<div style="width:30%; float:left; margin:10px; padding:5px; box-sizing:border-box;">
	<h1>Billing Address</h1>
	<strong>{{$CustomerData->customer_name}}</strong></br>
	<strong>{{$CustomerData->address}}</strong></br>
	<strong>{{$CustomerData->city}} , {{$CustomerData->country}} , {{$CustomerData->zip_code}}</strong></br>
	<strong>{{$CustomerData->mobile}}</strong>
</div> 
<div style="width:30%; float:left; margin:10px; padding:5px; box-sizing:border-box;">
	<h1>Shipping Address</h1>
	<strong>{{$ShippingData->shipping_name}}</strong></br>
	<strong>{{$ShippingData->address}}</strong></br>
	<strong>{{$ShippingData->city}}, {{$ShippingData->country}}, {{$ShippingData->zip_code}}</strong></br>
	<strong>{{$ShippingData->mobile}}</strong>
</div> 
<div style="width:30%; float:left; margin:10px; padding:5px; box-sizing:border-box;">
	<h1>Invoice Info</h1>
	<strong>Order ID : </strong></br>
	<strong>Invoice Date: {{$singleOrders->created_at}}</strong></br>
	<strong>Payment Type : {{$singleOrders->payment_type}}</strong></br>
	<strong>Payment Status : {{$singleOrders->payment_status}}</strong></br>
	<strong>Order Status : {{$singleOrders->order_status}}</strong>
</div>

<div class="agile-tables">
	<table class="table table-hover">
	 
	  <tbody>
	    <tr style="background:#3e383830;">
	      <th scope="row">Product Name</th>
	      <th>Quantity</th>
	      <th>Price</th>
	    </tr>

	    <tr>
	    	
	    	@foreach($order_details as $v_order_details)
	      <th scope="row">{{$v_order_details->product_name}}</th>
	      <td>
	      	<?php 
	      		$qty = $v_order_details->product_quantity;
	      		if($qty<=1){ ?> 
	      	{{$v_order_details->product_quantity}} Piece
	      		<?php } else{ ?>
	      		{{$v_order_details->product_quantity}} Pieces
	      	<?php } ?>
	      </td>
	      <td>৳ {{$v_order_details->product_price}}</td>
	    </tr>
	    @endforeach
	    <tr>
	    	 <th></th>
	    	 <td>Delivery Cost: </td>
	    	 <th>৳ 30</th>
	    </tr>
	    <tr style="">
	    	 <td style="border-left:none;"></td>
	    	 <td style="background:#3e383830;border-bottom: 1px solid #21568c;">Total</td>
	    	 <td style="background:#3e383830;border-bottom: 1px solid #21568c;">৳ {{$singleOrders->order_total}}</td>
	    </tr>
	  </tbody>
	</table>
</div>
@endsection