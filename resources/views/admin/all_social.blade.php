@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
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
				@foreach($all_socialmedia_info as $v_social_info)
				
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Contact Information</h2>
						<div class="row">
							@if($v_social_info->publication_status==0)
							<a href="{{URL::to('/add-socialmedia')}}">
							<button class="btn btn-success pull-right" style="margin-top: : -20px;"> <span> <b><i class="icon-plus"></i> New Contact </b> </span></button>
							</a>
							@endif
						
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <!-- <th>ID</th> -->
								  <th style="width: 45px;">Mobile</th>
								  <th style="width: 60px;">Email</th>
								  <th style="width: 80px;">Facebook</th>
								  <th>Twitter</th>
								  <th>Linkedin</th>
								  <th>Google plus</th>
								   <th>Location</th>
								  <th>Status</th>
								  <th style="width: 150px;">Actions</th>
							  </tr>
						  </thead>
						  	
						  <tbody>
							<tr style="font-size: 8px;">
								<!-- <td>{{ $v_social_info->contact_id }}</td> -->
								<td class="center">{{ $v_social_info->contact_mobile}}</td>
								<td class="center">{{ $v_social_info->contact_email}}</td>
								<td class="center">{{ $v_social_info->contact_facebook}}</td>
								<td class="center">{{ $v_social_info->contact_twitter}}</td>
								<td class="center">{{ $v_social_info->contact_linkedin}}</td>
								<td class="center">{{ $v_social_info->contact_googleplus}}</td>
								<td class="center">{{ $v_social_info->contact_location}}</td>
								<td class="center">
									@if($v_social_info->publication_status==1)
										<span class="badge badge-pill badge-success" style="width: 60px;">Published</span>
									@else
										<span class="badge badge-pill badge-warning"style="width: 60px;">Draft</span>
									@endif
								</td>
								<td class="center">
									@if($v_social_info->publication_status==1)
									
										<a class="btn btn-danger" href="{{URL::to('/unactivate_social/'.$v_social_info->contact_id)}}" data-toggle="tooltip" title="Daraft" data-placement="bottom">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									
									@else
									
										<a class="btn btn-success" href="{{URL::to('/activate_social/'.$v_social_info->contact_id)}}" data-toggle="tooltip" title="Published" data-placement="bottom">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
							
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_social/'.$v_social_info->contact_id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete_social/'.$v_social_info->contact_id)}}"
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
