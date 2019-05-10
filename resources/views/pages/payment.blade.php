@extends('layout_no_slider')
@section('content')
<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
  					<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
  					<li class="breadcrumb-item active">Payment</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$contents = Cart::getContent();

					/*echo "<pre>";
					print_r($contents);
					echo "</pre>";
					exit();*/
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $v_contents)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset($v_contents->attributes->image)}}" alt="" height="80px" width="100px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>Rs {{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php
									$total = $v_contents->quantity*$v_contents->price;
									echo $total;
								?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart-with-payment/'.$v_contents->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->



<section id="do_action">
	<div class="container">
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h5 class="headingTop text-center">Select Your Payment Method</h5>	
					</div>
					<form action="{{url('/order-place')}}" method="POST">
						{{ csrf_field()}}
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="payment_gateway"value="visa"> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_gateway" value="master"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_gateway" value="paypal">
				            </label>
				       		<label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="payment_gateway" value="handcash"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="payment_gateway" value="ez-cash"> 
				            </label> 
				         
				        </div>        
					</div>
					<div class="footerNavWrap clearfix">
						
					 <input type="submit" name="submit" value="Payment" class="btn btn-success"/>
					</div>
					</form>
				</div>
</section><!--/#do_action-->
@endsection