<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('frontEnd/images/bike.png')}}"/>
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/custom.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <style type="text/css">
    .paymentWrap {
    padding: 50px;
}

.paymentWrap .paymentBtnGroup {
    max-width: 800px;
    margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
    padding: 40px;
    box-shadow: none;
    position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
    outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
    border-color: #4cd264;
    outline: none !important;
    box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
    position: absolute;
    right: 3px;
    top: 3px;
    bottom: 3px;
    left: 3px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 2px solid transparent;
    transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
    background-image: url("frontEnd/images/cart/visa.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
    background-image: url("frontEnd/images/cart/master.png");
    }

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
    background-image: url("frontEnd/images/cart/paypal.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
    background-image: url("frontEnd/images/cart/handcash.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
    background-image: url("frontEnd/images/cart/ezcash.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
    border-color: #4cd264;
    outline: none !important;
}
    </style>
</head><!--/head-->

<body>
                        <?php
                                $all_publised_contact = DB::table('tbl_contact')
                                                        ->where('publication_status',1)
                                                        ->get();

                                foreach ($all_publised_contact as $v_contact) { ?>
                                   
                                
                        
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#1f2c59;">
        <div class="header_top"><!--header_top-->
            <div class="container col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contactinfo">
                            <ul class="nav nav-pills" style="color: white;">
                               <li style="margin-top: 14px; margin-right: 20px; margin-left: 10px;"><i class="fa fa-phone"></i> {{$v_contact->contact_mobile}}</li>
                                <li style="margin-top: 14px; margin-right: 20px;"><i class="fa fa-envelope"></i> {{$v_contact->contact_email}}</li>
                                  <li><a href="{{URL::to('/')}}"> <i class="fa fa-home"> Home</i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-sm-8">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to($v_contact->contact_facebook)}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_twitter)}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_linkedin)}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{URL::to($v_contact->contact_googleplus)}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search. . ."/> <button class="btn-success">submit</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                           <div class="mainmenu pull-left">
                           <!--  <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}"> 
                                    <i class="fa fa-home"> Home</i>
                                </a></li>
                                <li><a href="contact-us.html">

                                <i class="fa fa-phone"> Contact</i>
                            </a></li>
                        </ul> -->
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul>
                                 <li><a href="{{URL::to('/account')}}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                               
                               <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id'); 
                                /*print_r($customer_id);
                                print_r($shipping_id);*/
                                ?>

                                    <?php  if($customer_id != NULL && $shipping_id == NULL){?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                                <?php } elseif($customer_id != NULL && $shipping_id != NULL) { ?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <?php } else{ ?>

                                <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                             <?php    } ?>



                                <li><a href="{{URL::to('/show-card')}}" id="cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>



                                  <?php  if($customer_id != NULL){  ?>
                                <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>

                                <?php } else { ?> 
                                     <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <?php } ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    </nav><!--/header-->
  

<div class="jumbotron" style="background-color: white;"></div>
        <div class="container" style="width:100%;">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                      @yield('content')
                    </div>
                </div>
        </div>
    </div>
    </section>
    <div class="jumbotron" style="background-color: #fff;"></div>
 <footer id="footer" style="background-color:#1f2c59;; color: white:80@%;"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>N. S. </span>-Rantam Brother's</h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p> -->
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <?php 
                                    $footer_items = DB::table('tbl_products')
                                ->where('publication_status',1)
                               ->limit(4)
                                ->get();
                                foreach ($footer_items as $v_footer_items) {
                                   
                            ?>
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset($v_footer_items->product_image)}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>{{$v_footer_items->product_name}}</p>
                            </div>
                        </div>
                    <?php } ?>
                           
                    </div>
                    <div class="col-sm-3">
                        <?php 
                        $all_publised_contact = DB::table('tbl_contact')
                                                        ->where('publication_status',1)
                                                        ->get();

                                foreach ($all_publised_contact as $v_contact) { ?>

                        <div class="address">
                           <iframe src="{{$v_contact->contact_location}}" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
      
      
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 N. S. Ratnam Btother's. All rights reserved.</p>
                    <p class="pull-right">Developed By DILAKSAN</p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('frontEnd/js/jquery.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/price-range.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", "#cart", function () {
            location.reload();
        });
     });
    </script>

</body>
</html>