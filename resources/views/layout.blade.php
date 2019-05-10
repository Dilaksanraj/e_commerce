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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontEnd/images/ico/apple-touch-icon-57-precomposed.png')}}">
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
    
    <?php 
    $all_published_slider=DB::table('tbl_slider')
    ->where('publication_status',1)
    ->get(); 

?>  

<div class="jumbotron" style="background-color: white;"></div>

 <section id="slider">
        <div class="container col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                                $all_published_slider   = DB::table('tbl_slider')
                                                        ->where('publication_status',1)
                                                        ->get();

                                                    $i=1;
                                                    foreach ($all_published_slider as $v_slider) {

                                                         if($i==1){


                            ?>
                            <div class="item active">
                            <?php } else { ?>
                                <div class="item">
                                <?php } ?>
                                <!-- slider text here -->
                                <div class="col-sm-4">
                                    <h1><span>{{$v_slider->slider_heading}}</span></h1>
                                    <p style="font-size: 16px; color:#1f2c59;"><i>{{$v_slider->slider_text}}</i></p>
                                </div>
                                <div class="col-sm-8">
                                    <img style="width: 1000px; height: 270px;" src="{{asset($v_slider->slider_image)}}" class="girl img-responsive" alt="Slider image missing" />
                                </div>
                            </div>
                            <?php $i++; } ?>
                        </div>
                    </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->

        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-sm-2"> 
                    <div class="left-sidebar">

                        <div class="brands_products"><!--brands_products-->
                            <h2 style="margin-top: 30px; margin-bottom: 0;">category</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                <?php
                                $all_publised_category = DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();

                            foreach ($all_publised_category as $v_category) { ?>
                                <li><a href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">
                                        {{$v_category->category_name}}
                                    </a>
                                </li>
                                     <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <!--/category-products-->
                        <div class="brands_products"><!--brands_products-->
                            <h2 style="margin-top: 30px; margin-bottom: 0;">Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                $all_publised_manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->get();

                            foreach ($all_publised_manufacture as $v_manufacture) { ?>
                                    <li><a href="{{URL::to('/product_by_manufacture/'.$v_manufacture->manufacture_id)}}">{{$v_manufacture->manufacture_name}}</a></li>
                                     <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-10 padding-right">
                    <div class="features_items">
                        <hr><!--features_items-->
                      @yield('content')
                    </div>
            </div>
            <div class="recommended_items col-md-12" style="margin-top: 100px;"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active"> 
                                <?php 
                                    $recommended_items = DB::table('tbl_products')
                                -> join('tbl_category', 'tbl_products.category_id', '=','tbl_category.category_id')
                                ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                                ->where('tbl_products.publication_status',1)
                                ->inRandomOrder()
                                ->limit(6)
                                ->get();

                                foreach ($recommended_items as $v_recomended_item) {  ?> 
                                
                                    <div class="col-sm-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset($v_recomended_item->product_image)}}" alt=""style="width: 60%; height: 80px;"/>
                                                    <h5 style="color: orange;">Rs {{$v_recomended_item->product_price}}</h5 style="color: orange;">
                                                    <p>{{$v_recomended_item-> product_name}}</p>
                                                   @if($v_recomended_item->category_name=="Bike")
                                                    <a href="{{URL::to('/view_product/'.$v_recomended_item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Can not buy</a>
                                                    @else
                                                    <a href="{{URL::to('/view_product/'.$v_recomended_item->product_id)}}" class="btn btn-default add-to-cart" style="font-size: 12px!important"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
                    </div><!--/recommended_items-->
        </div>
    </div>

    </section>
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
  
    <!-- <script src="{{asset('frontEnd/js/jquery.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/price-range.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>

    <script src="{{asset('frondEnd/js/jquery.zoom.js')}}"></script>
    <script src="{{asset('frondEnd/js/jquery.zoom.min.js')}}"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
     <script>
           $(document).ready(function(){
            $('#ex1').zoom();
            $('#ex2').zoom({ on:'grab' });
            $('#ex3').zoom({ on:'click' });          
            $('#ex4').zoom({ on:'toggle' });
        });
    </script> -->
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