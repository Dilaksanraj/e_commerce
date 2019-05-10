@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Products</a></li>
			</ul>
					<?php
					$message = Session::get('message');
					if($message)
					{ ?>
						<div class="alert alert-success" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message";
							Session::put('message',null); ?>
							</strong>
						</div>
					<?php } ?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								 <!--  <th>Product ID</th> -->
								  <th>Product Name</th>
								 <!--  <th>Product Quantity</th> -->
								  <th>Product Image</th>
								  <th>Product Price</th>
								  <th>Product Quantity</th>
								  <th>Category Name</th>
								  <th>Manufature Name</th>
								  <th>status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_product_info as $v_product_info)
						  <tbody>
							<tr>
								<!-- <td>{{ $v_product_info->product_id }}</td> -->
								<td class="center" style="width: 120px;">{{ $v_product_info->product_name}}</td>
								<td style="width: 180px; height: 60px;"> <img src="{{asset($v_product_info -> product_image)}}" style="height:80%; width: 50%;">
									 @if($v_product_info-> product_new !="" && $v_product_info-> product_sale =="")
                                        <span class="label label-important">New</span>
                                        @elseif($v_product_info->product_sale !="" && $v_product_info-> product_new =="")
                                        <span class="label label-important">Sales</span>
                                        @elseif($v_product_info->product_sale !="" && $v_product_info-> product_new !="")
                                        <span class="label label-important">Sales</span>
                                        <span class="label label-important">New</span>
                                        @endif
								</td>
								<td class="center" style="width: 60px;">{{ $v_product_info->product_price}}</td>
								@if( $v_product_info->product_quantity >15)
								<td class="center" style="width: 80px;">
									<span class="badge badge-pill badge-success" style="width: 50px;">
										{{ $v_product_info->product_quantity}}
									</span>	
								</td>
								@else
								<td class="center" style="width: 80px;">
									<span class="badge badge-pill badge-warning" style="width: 50px;">
										{{ $v_product_info->product_quantity}}
									</span>	
								</td>
								@endif
								<td class="center">{{ $v_product_info->category_name}}</td>
								<td class="center" style="width: 70px;">{{ $v_product_info->manufacture_name}}</td>
								<td class="center">
									@if($v_product_info->publication_status==1)
										<span class="badge badge-pill badge-success" style="width: 60px;">Published</span>
									@else
										<span class="badge badge-pill badge-warning"style="width: 60px;">Draft</span>
									@endif
								</td>
								<td class="center" style="width: 220px;">
									@if($v_product_info->publication_status==1)
									
										<a class="btn btn-danger" href="{{URL::to('/unactivate_product/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Draft" data-placement="bottom">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									
									@else
									
										<a class="btn btn-success" href="{{URL::to('/activate_product/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Publish" data-placement="bottom">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Edit" data-placement="bottom">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete_product/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Delete" data-placement="bottom" id="delete" >
										<i class="halflings-icon white trash"></i> 
									</a>

									@if($v_product_info->product_new!="" && $v_product_info->product_sale!="")
									<a class="btn btn-warning" href="{{URL::to('/delete_new/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Delete new" data-placement="bottom" id="">
										<i class="halflings-icon white minus"></i> 
									</a>
									<a class="btn btn-secondary" href="{{URL::to('/delete_sale/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Delete sale" data-placement="bottom" id="" >
										<i class="halflings-icon white minus"></i> 
									</a>
									@elseif($v_product_info->product_new!="" && $v_product_info->product_sale=="")
									<a class="btn btn-warning" href="{{URL::to('/delete_new/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Delete new" data-placement="bottom" id="" >
										<i class="halflings-icon white minus"></i> 
									</a>
									<a class="btn btn-success" href="{{URL::to('/add_sale/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Add sale" data-placement="bottom" id="" >
										<i class="halflings-icon white plus"></i> 
									</a>
									@elseif($v_product_info->product_new =="" && $v_product_info->product_sale !="")
									<a class="btn btn-success" href="{{URL::to('/add_new/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Add new" data-placement="bottom" id="" >
										<i class="halflings-icon white plus"></i> 
									</a>
									<a class="btn btn-secondary" href="{{URL::to('/delete_sale/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Delete sale" data-placement="bottom" id="" >
										<i class="halflings-icon white minus"></i> 
									</a>

									@else
									<a class="btn btn-success" href="{{URL::to('/add_new/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Add new" data-placement="bottom" id="" >
										<i class="halflings-icon white plus"></i> 
									</a>
									<a class="btn btn-success" href="{{URL::to('/add_sale/'.$v_product_info->product_id)}}"data-toggle="tooltip" title="Add sale" data-placement="bottom" id="" >
										<i class="halflings-icon white plus"></i> 
									</a>
									@endif
								</td>
						  </tbody>
						  	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection