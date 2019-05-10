@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								   <th>Date</th>
								 <!--  <th>Status</th> -->
								  <th>Payment	</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  	@foreach($all_order_info as $v_order_info)
						  	<!-- <?php 
						  		$orderCount = count($all_order_info);
						  		echo $orderCount;
						  	?> -->
						  <tbody>

							<tr>
								<td>{{ $v_order_info->order_id }}</td>
								<td class="center">{{ $v_order_info->user_name}}</td>
								<td class="center">{{ $v_order_info->order_total}}</td>
								<td class="center">{{ $v_order_info->created_at}}</td>
								<!-- <td class="center">{{ $v_order_info->order_status}}</td> -->
								<td class="center">
									@if($v_order_info->order_status =="Done")
										
										<span class="badge badge-pill badge-success">Delivered</span>
									
									@else
										<span class="badge badge-pill badge-warning">Not Delivery</span>
									@endif
								</td>
								<td class="center">
									@if($v_order_info->order_status =="Done")
										
										<a class="btn btn-danger" href="{{URL::to('/unactivate_order/'.$v_order_info->order_id)}}" data-toggle="tooltip" title="Make as not complete" data-placement="bottom">
											<i class="halflings-icon white thumbs-down"></i>
										</a>
							
									@else

										<a class="btn btn-success" href="{{URL::to('/activate_order/'.$v_order_info->order_id)}}"data-toggle="tooltip" title="Make as complete" data-placement="bottom">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order_info->order_id)}}" data-toggle="tooltip" title="View" data-placement="bottom">
										<i class="icon-eye-open"></i>  
									</a>

									<a class="btn btn-primary" href="{{URL::to('/print_order/'.$v_order_info->order_id)}}" data-toggle="tooltip" title="Print" data-placement="bottom">
										<i class="icon-print"></i>  
									</a>


									<a class="btn btn-danger" href="{{URL::to('/delete_order/'.$v_order_info->order_id)}}"
										id="delete" data-toggle="tooltip" title="Delete" data-placement="bottom">
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>
							</tr>
						  </tbody>
						  	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection