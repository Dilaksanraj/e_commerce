@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Contact Information</a>
				</li>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Contact Information</h2>
						<div class="row">
							<a href="{{URL::to('/all-socialmedia')}}">
							<button class="btn btn-success pull-right" style="border-radius: 20px;"> 
							<b><i class="icon-eye-open"></i>
							View All contact</button>
						</b>
						</a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-socialmedia')}}">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Mobile Number</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="contact_mobile" required="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="date01">Email</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="email" required="">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="date01">Facebook</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="facebook" required="">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="date01">Twitter</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="twitter" required="">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="date01">Linked in</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="linkedin" required="">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="date01">Google plus</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="gooleplus" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Location</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="location" required="">
							  </div>
							</div>  
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satatus</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="publication_status"/>
							  </div>
							</div> 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  
					</div>
				</div><!--/span-->
			</div><!--/row-->
@endsection