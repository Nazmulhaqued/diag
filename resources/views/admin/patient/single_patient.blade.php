@extends('admin.admin_master')

@section('admin_content')

<div class="agile-tables">
	<table class="table table-hover">
	 
	  <tbody>
	    <tr>
	      <th scope="row">Product ID</th>
	      <th>Product Name</th>
	      <th>Product Image</th>
	      <th>Product Short Description</th>
	      <th>Category Name</th>
	      <th>SubCategory Name</th>
	      <th>Publication Status</th>
	      
	    </tr>
	    <tr>
	      <th scope="row">{{$single_products->product_id}}</th>
	      <td>{{$single_products->productName}}</td>
	      <td><img src="{{asset($single_products->productImage)}}" style="width:150px; height:150px;"></td>
	      <td>{{$single_products->productShortdescription}}</td>
	      <td>{{$category_info->categoryName}}</td>
	      <td>{{$subcategory_info->subcategoryName}}</td>
	      @if($single_products->publicationStatus ==1)
	      <td>Publish</td>
	      @else
	      <td>Unpublish</td>
	      @endif
	      
	    </tr>
	  </tbody>
	</table>
</div>
@endsection