<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{asset('backEnd/img/bike.png')}}"/>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link id="bootstrap-style" href="{{asset('backEnd/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backEnd/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backEnd/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backEnd/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
	<style type="text/css">
		
		<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
	</style>
			
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{URL::to('/')}}"><span>N. S. Bro's</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user">
								</i> {{Session::get('admin_name')}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="{{URL::to('/profile')}}"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{URL::to('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{URL::to('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a href="{{URL::to('/manage-order')}}" ><i class="halflings-icon white wrench"></i><span class="hidden-tablet">Manage Orders</span></a></li>
						<li><a href="{{URL::to('/complete-order')}}" ><i class="icon-ok-sign"></i><span class="hidden-tablet">Completed Orders</span></a></li>

						<li><a href="{{URL::to('/all-category')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Category</span></a></li>
						<li><a href="{{URL::to('/add-category')}}"><i class="icon-plus"></i><span class="hidden-tablet"> Add Catergory</span></a></li>
						<li><a href="{{URL::to('/all-manufacture')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Manufactures</span></a></li>
						<li><a href="{{URL::to('/add-manufacture')}}"><i class="icon-plus"></i><span class="hidden-tablet"> Add Manufactures</span></a></li>
						<li>

							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products</span><!-- <span class="label label-important">New</span> --></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-product')}}"><i class="icon-plus"></i><span class="hidden-tablet">Add Product</span></a></li>
								<li><a class="submenu" href="{{URL::to('/all-product')}}"><i class="icon-eye-open"></i><span class="hidden-tablet">All Product</span></a></li>
							</ul>	
						</li>

						<li>

							<a class="dropmenu" href="#"><i class="icon-camera"></i><span class="hidden-tablet"> Slider </span><span class="label label-important">Image</span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-slider')}}"><i class="icon-plus"></i><span class="hidden-tablet">Add Slider</span></a></li>
								<li><a class="submenu" href="{{URL::to('/all-slider')}}"><i class="icon-eye-open"></i><span class="hidden-tablet">All Slider</span></a></li>
							</ul>	
						</li>

						<li><a href="{{URL::to('/all-socialmedia')}}"><i class="icon-external-link"></i><span class="hidden-tablet">Social Link</span></a></li>
						<!-- 	 -->
						<!-- <li><a href="gallery.html"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Delivery Man</span></a></li>
						<li><a href="table.html"><i class="icon-phone"></i><span class="hidden-tablet"> Contact Details</span></a></li> -->
						
							<!-- <li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li> -->
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			@yield('admin_content')

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<!-- <div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	 -->
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2019 Dilaksanraj</span>
			<!-- <span class="hidden-phone" style="text-align:right;float:right">Powered by : Dilaksan</span> -->
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="{{asset('backEnd/js/jquery-1.9.1.min.js')}}"></script>
		<script src="{{asset('backEnd/js/jquery-migrate-1.0.0.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery-ui-1.10.0.custom.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.ui.touch-punch.js')}}"></script>	
		<script src="{{asset('backEnd/js/modernizr.js')}}"></script>	
		<script src="{{asset('backEnd/js/bootstrap.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.cookie.js')}}"></script>	
		<script src="{{asset('backEnd/js/fullcalendar.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('backEnd/js/excanvas.js')}}"></script>
		<script src="{{asset('backEnd/js/jquery.flot.js')}}"></script>
		<script src="{{asset('backEnd/js/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('backEnd/js/jquery.flot.stack.js')}}"></script>
		<script src="{{asset('backEnd/js/jquery.flot.resize.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.chosen.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.uniform.min.js')}}"></script>		
		<script src="{{asset('backEnd/js/jquery.cleditor.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.noty.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.elfinder.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.raty.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.iphone.toggle.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.uploadify-3.1.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.gritter.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.imagesloaded.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.masonry.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.knob.modified.js')}}"></script>	
		<script src="{{asset('backEnd/js/jquery.sparkline.min.js')}}"></script>	
		<script src="{{asset('backEnd/js/counter.js')}}"></script>	
		<script src="{{asset('backEnd/js/retina.js')}}"></script>
		<script src="{{asset('backEnd/js/custom.js')}}"></script>
		<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js')}}"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

		<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"> </script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"> </script> -->

		<script>
			$(document).ready(function(){
  			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>

		 <script>
		 	$(document).on("click","#delete", function(e){
		 		e.preventDefault();
		 		var link = $(this).attr("href");
		 		bootbox.confirm("Are you sure want to delete!!", function(confirmed){
		 			if(confirmed){
		 				window.location.href=link;
		 			}
		 		})
		 	})
		 </script>

		<!--  <script>
		 	$(document).ready(function() {
    $('#example').DataTable();
} );
		 </script> -->

	<!-- end: JavaScript-->
	
</body>
</html>
