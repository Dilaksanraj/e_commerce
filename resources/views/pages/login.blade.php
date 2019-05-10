@extends('layout_no_slider')
@section('content')
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->

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

						<h2>Login to your account</h2>
						<form action="{{url('/customer_login')}}" method="POST">
							{{csrf_field()}}
							<input type="email" placeholder="Email"  name="customer_email" required="" />
							<input type="password" placeholder="Password" name="password" required="" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<h5 class="t-center margin-top-16"><a href="/en/password-reset">Forgot password?</a></h5>
						<hr>
						<div class="signup-panel devider"><h5 class="t-center">Don't have an account yet?</h5>
							<div class="t-center">
								<a class="ui-btn is-standard is-medium to-email-login gtm-email-signup" href="{{URL::to('/register')}}">
									<button class="btn btn-secondary">Sign up</button>
								</a>
							</div>
						</div>
					</div><!--/login form-->
				</div>
			</div>
		</div>
@endsection