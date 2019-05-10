@extends('layout_no_slider')
@section('content')
<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
  					<li class="breadcrumb-item"><a href="#">Home</a></li>
  					<li class="breadcrumb-item active">Shopping cart</li>
				</ol>
			</div>


                        <?php
                    $message = Session::get('cart');
                    if($message)
                    { ?>

                    <div class="alert alert-danger" role="alert" style="font-size: 20px;">
                        <?php 
                        echo "$message";
                        Session::put('cart',null);
                        ?>
                    </div>
                <?php } ?>

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
									<!-- <a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$v_contents->quantity}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a> -->
								<!-- <form action="{{url('/update-card')}}" method="post">
									{{ csrf_field()}}
									<input type="submit" name="submit" value="-" class="btn btn-sm bt-default">
									<input type="hidden" name="id" value="{{$v_contents->id}}">
									<input type="submit" name="submit" value="+" class="btn btn-sm bt-default">
								</form> -->

								<form action="{{url('/update-card')}}" method="post">
									{{ csrf_field()}}
									<input type="submit" name="submit0" value="-" class="btn btn-sm bt-default" style="margin: 0px 5px 0px 0px;">
									<input class="" type="text" name="quantity" value="{{$v_contents->quantity}}" autocomplete="off" size="2" readonly="" style="margin: 0px 0px 0px -2px; background-color: #a6a6a1"/>
									<input type="hidden" name="id" value="{{$v_contents->id}}">
									<input type="submit" name="submit1" value="+" class="btn btn-sm bt-default">
								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php
									$total = $v_contents->quantity*$v_contents->price;
									echo $total;
								?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span> Rs {{Cart::getSubTotal()}}</span></li>
							<li>Eco Tax (12.5%) <span><?php
							$total = Cart::getSubTotal();
							//$tax = 12.5%;
							$tax = $total*0.125;
							//$netAmount = $total-$tax;
							echo "Rs ".($tax);
							?></span></li>


							<li>Shipping Cost <span><?php
							$total = Cart::getSubTotal();
							//$tax = 12.5%;
							$shippingCost = $total*0.10;
							//$netAmount = $total-$tax;
							echo "Rs ".($shippingCost);
							?></span></li>


							<li>Total <span>
								
							<?php
							$total = Cart::getSubTotal();
							//$tax = 12.5%;
							$shippingCost = $total*0.10;
							$tax = $total*0.125;
							$netAmount = $total+($shippingCost+$tax);
							//$netAmount = $total-$tax;
							echo "Rs ".($netAmount);
							?>
							</span></li>
						</ul>
							<a class="btn btn-default update" href="{{URL::to('/')}}">Update</a>

							 <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id'); 
                                $car_id = Session::get('cart_id');
                                /*print_r($customer_id);
                                print_r($shipping_id);*/
                               
                                ?>
                                <?php 
                                if($netAmount != NULL){ ?>


                                <?php  if($customer_id != NULL){?>
                                		<a href="{{URL::to('/checkout')}}" class="btn btn-default check_out">  Check Out</a>

                                <?php }  else{ ?>

                                		<a href="{{URL::to('/login-check')}}" class="btn btn-default check_out">  Check Out</a>
                             <?php    } ?>


                                <?php }
                                else{ ?>
                                		<a href="{{URL::to('/show-card')}}" class="btn btn-default check_out">  Check Out</a>
                              <?php  Session::put('cart','Your Cart is Empty'); } ?>
                                

							<!-- <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a> -->
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
