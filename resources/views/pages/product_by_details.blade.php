@extends('layout_no_slider')
@section('content')


                        <?php
                    $message = Session::get('message');
                    if($message)
                    { ?>

                    <div class="alert alert-danger" role="alert" style="font-size: 20px;">
                        <?php 
                        echo "$message";
                        Session::put('message',null);
                        ?>
                    </div>
                <?php } ?>


<div class="body" style="background: #FFF;">
	<div class="">
					<div class="product-details col-sm-12"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product">
								<div class="cours2" style="overflow:hidden;">
									<img class="hover" src="{{asset($product_by_details->product_image)}}" style="width:400px;height:300px;border:1px solid transparent;transition:1s;">
								</div>
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="product-information col-sm-12"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<img src="{{asset('frontEnd/images/product-details/rating.png')}}" alt="" " />
								@if($product_by_details->category_name == "Bike")
								<span>
									<span>Rs {{$product_by_details->product_price}}</span>
								</span>
								@else
									<span>
									<span>Rs {{$product_by_details->product_price}}</span>

									<form action="{{url('/add-to-card')}}" method="POST">
										{{csrf_field()}}
										<label>Quantity: </label>
											<input type="number" name="qty" value="1"/>
											<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
											@if($product_by_details->product_quantity!= 0)
												<button type="Submit" class="btn btn-fefault cart">
													<i class="fa fa-shopping-cart"></i>
													Add to cart
												</button>

											@else
											<button type="Submit" class="btn btn-warning" disabled="">
													<i class="fa fa-shopping-cart"></i>
													Add to cart
											</button>

											@endif
										
									</form>
								</span>
								@endif

								@if($product_by_details->product_quantity!= 0)
								
									<p><b>Availability :</b> <span class="badge badge-pill badge-success">Instrock ({{$product_by_details->product_quantity}})</span> </p>

								@else
									<p><b>Availability : </b><span class="label label-danger"> Out of strock </span></p>

								@endif
								
								<p><b>Condition :</b> New</p>
								<p><b>Color :</b> {{$product_by_details->product_color}}</p>
								<p><b>Brand:</b> {{$product_by_details->manufacture_name}}</p>
								<p><b>Category :</b> {{$product_by_details->category_name}}</p>
								<p><b>Size :</b> {{$product_by_details->product_size}}</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<div class="category-tab shop-details-tab" style="width: 60%;"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li> -->
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<p>
									{{$product_by_details->product_long_description}}
								</p>
							</div>
							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" placeholder="Message"></textarea>
										<b>Rating: </b> <img src="{{asset('frontEnd/images/product-details/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
				</div>
			</div>

			<div class="recommended_items"><!--recommended_items-->
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
                                                    <h5 style="color: orange;">Rs {{$v_recomended_item->product_price}}</h5>
                                                    <p>{{$v_recomended_item-> product_name}}</p>
                                                    @if($v_recomended_item->category_name=="Bike")
                                                    <a href="{{URL::to('/view_product/'.$v_recomended_item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Can not buy</a>
                                                    @else
                                                    <a href="{{URL::to('/view_product/'.$v_recomended_item->product_id)}}" class="btn btn-default add-to-cart" style="font-size: 12px!important;"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                    </div>
@endsection