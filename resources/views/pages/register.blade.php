@extends('layout_no_slider')
@section('content')
		<div class="container">
			<div class="row">
				<?php
					$message = Session::get('message');
					if($message)
					{ ?>
						<div class="alert alert-danger" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message";
							Session::put('message',null); ?>
							</strong>
						</div>
					<?php } ?>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
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

						<h2>New User Signup!</h2>
						<form action="{{url('/customer_registration')}}" method="POST">
							{{csrf_field()}}
							<input type="text" placeholder="Full Name" name="customer_name" required="" />
							<input type="email" placeholder="Email Address" name="customer_email" required=""  />
							<input type="text" placeholder="Phone Number" name="phone_number" required="" />
							<input type="password" placeholder="Password" name="password" required="" />
							<input type="password" placeholder=" Confirm Password" name="confirm_password" required="" />
							<button type="submit" class="btn btn-default">Sign up</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
@endsection