@extends('layout_no_slider')
@section('content')

	<section id="cart_items">
		<div class="container col-sm-12">
			<?php
					$message = Session::get('message');
					if($message)
					{ ?>
						<div class="alert alert-danger col col-sm-12" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message";
							Session::put('message',null); ?>
							</strong>
						</div>
					<?php } ?>
			<!-- <div class="register-req"> -->
				<div><h3>Please fill this information correctly . . . . . . </h3></div>
				
			<!-- </div>/register-req -->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details </p>
							<div class="form-one col-sm-8">
								<form action="{{url('/save-shipping-details')}}" method="POST"> 
									{{csrf_field()}}
									<input type="text" placeholder="Email*" name="shipping_email" required="">
									<input type="text" placeholder="First Name *" name="shipping_first_name" required="">
									<input type="text" placeholder="Last Name *" name="shipping_last_name" required="">
									<input type="text" placeholder="Address line 1 *" name="shipping_address_1" required="">
									<input type="text" placeholder="Address line 2" name="shipping_address_2" >
									<input type="text" placeholder="Mobile Number *" maxlength="10"  name="shipping_mobile_number" required="" >
									<input type="text" placeholder="City *" name="shipping_city" required="">
									<input type="submit" class="btn btn-success" value="Shipping" style="color: black; font-weight: bold;">
								</form>
							</div>
						</div>
					</div>			
				</div>
			</div>
			<div class="review-payment">
				<!-- <h2>Review & Payment</h2> -->
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection