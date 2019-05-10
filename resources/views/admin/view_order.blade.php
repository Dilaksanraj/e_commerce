@extends('admin_layout')
@section('admin_content')
<a href="{{URL::to('/manage-order')}}">
<button class="btn btn-primary">Back to summery</button>
</a>
<hr>
<div class="row-fluid sortable">	
				<div class="box span12" style="width: 35%;">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
						<!-- <div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div> -->
						
					</div>
					<div class="box-content">
						<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>Customer Name</th>
								  <th>Mobile Number</th>
							  </tr>
						  </thead>  
						  <tbody>
							<tr>
								<td>{{$all_order_by_view ->user_name}}</td>
								<td class="center">{{$all_order_by_view ->phone_number}}</td>
							</tr>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->


				<div class="box span12" style="width: 55%;">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
						<!-- <div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div> -->
					</div>
					<div class="box-content">
						<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>Username</th>
								  <th>First Name</th>
								  <th>Address</th>
								  <th>Address line 2</th>
								  <th>Mobile Number</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>{{$all_order_by_view ->user_name}}</td>
								<td class="center">{{$all_order_by_view ->shipping_first_name}}</td>
								<td class="center">{{$all_order_by_view ->shipping_address1}}</td>
								<td class="center">{{$all_order_by_view ->shipping_address2}}</td>
								<td class="center">{{$all_order_by_view ->shipping_mobile_number}}</td>
							</tr>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->


				<div class="box span12" style="width: 93%; margin-left: 0px;">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
						<!-- <div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div> -->
					</div>
					<div class="box-content">
						<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Product Name</th>
								  <th>Sold quantity</th>
								  <th>Total</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>{{$all_order_by_view ->order_id}}</td>
								<td class="center">{{$all_order_by_view ->product_name}}</td>
								<td class="center">{{$all_order_by_view ->product_sale_quantity}}</td>
								<td class="center">
									{{$all_order_by_view ->order_total}}
								</td>
								
							</tr>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div>
@endsection