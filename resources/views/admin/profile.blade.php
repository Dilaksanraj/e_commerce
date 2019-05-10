@extends('admin_layout')
@section('admin_content')
<style type="text/css">


body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 20%;
  height: 20%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}


element.style {
}
table[Attributes Style] {
    width: 100%;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    -webkit-border-horizontal-spacing: 0px;
    -webkit-border-vertical-spacing: 0px;
}
user agent stylesheet
table {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: grey;
}
</style>
<div class="container">

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

	<?php
					$message_error = Session::get('error');
					
					if($message_error)
					{ ?>
						<div class="alert alert-danger col-md-5" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message_error";
							Session::put('error',null); ?>
							</strong>
						</div>
					<?php } ?>

    <div class="row profile">
		<div class="col-md-5" style="width: 400px;">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic profile-usertitle-job">
					
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<img src="https://scontent.fcmb3-1.fna.fbcdn.net/v/t1.0-9/17883496_1199817386796230_1309661804601275861_n.jpg?_nc_cat=108&_nc_ht=scontent.fcmb3-1.fna&oh=395f7ca6f348eec3cd7eba7f1c1f1a3e&oe=5D42391A" class="img-responsive" alt="" style="border-radius: 50%; height: 30%; width: 30%;">
					</div>
					<div class="profile-usertitle-job">
					{{$profile_by_view->user_name}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
					</ul>
				</div>
				<table cellspacing="0" cellpadding="0" border="0" width="100%">
					<tbody>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Account Name
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$profile_by_view->user_name}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Email Address
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$profile_by_view->user_email}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Mobile Number
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">
								{{$profile_by_view->phone_number}}
							</td>
							
						</tr>
						<tr bgcolor="#c4c4c4">
							<td colspan="3">
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" height="1" alt="">
							</td>
						</tr>
						<tr height="23">
							<td bgcolor="#f9f7ff">
								<img src="" hspace="5" alt="">&nbsp;Password
							</td>
							<td>
								<img src="https://ir.ebaystatic.com/pictures/aw/pics/s.gif" width="3" alt="">**********
							</td>
							
						</tr>
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<div class="jumbotron">
		<button class="btn btn-success"  data-toggle="modal" data-target="#myModal"> <i class="halflings-icon user"></i> 
			Add New Admin
		</button>

		    	<div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Add New Admin</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="reused_form" action="{{url('/save-admin')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <p>
                            		<span class="badge badge-warning"> sure that the person who become as an admin can access backend..</span>
                            	</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"   required maxlength="50" placeholder="Enter Admin Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" required maxlength="50" placeholder="Enter Admin Email">
                                </div>
                                <div class="form-group">  
                                    <input type="number" class="form-control" id="email" name="phone" required maxlength="50" placeholder="Enter Admin Phone Number">
                                </div>
                                 <div class="form-group">
                                    <input type="Password" class="form-control" id="" name="password" required maxlength="50" placeholder="Enter Admin Password">
                                </div>
                               
                                <button type="submit" class="btn btn-lg btn-success" id="btnContactUs">Save</button>
                                 <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                            </form>
                		</div>
           	 		</div> 
        		</div>
    		</div>

    		<!-- table -->
    		<div class="box-content">
						<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>Admin Name</th>
								  <th>Admin Email</th>
								  <th>Admin Mobile</th>
								  <th>Created At</th>
								 <!--  <th>Action</th> -->
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($list_all_admin as $v_list_all_admin)
							<tr>
								<td>{{$v_list_all_admin ->user_name}}</td>
								<td class="center">{{$v_list_all_admin ->user_email}}</td>
								<td class="center">{{$v_list_all_admin ->phone_number}}</td>
								<td class="center">{{$v_list_all_admin ->created_at}}</td>
								<!-- <td class="center">Action</td> -->
							</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
		</div>

@endsection
