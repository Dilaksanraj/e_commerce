@extends('layout')
@section('content')
<!-- 
                         <?php
                        foreach ($all_published_product as $v_published_product) { ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                   
                                        <div class="productinfo text-center">
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}">
                                                <img src="{{asset($v_published_product->product_image)}}" style="height: 200px; width: 250px;" alt="" />
                                            </a>
                                            <h2>Rs {{$v_published_product->product_price}}</h2>
                                            <p>{{$v_published_product-> product_name}}</p>

                                            @if($v_published_product->category_name =="Bike")
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-warning"></i>Can not buy
                                            </a>
                                           @else
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
                                           @endif
                                        </div> 
                                </div>
                            </div>
                        </div>
                    <?php } ?> -->

                    <?php
                        foreach ($all_published_product as $v_published_product) { ?>
                    <div class="col-sm-3" style="height: 400px; margin-top: 20px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}">
                                                <img src="{{asset($v_published_product->product_image)}}" alt="" style="height: 250px;" />
                                            </a>
                                            <h2>Rs {{$v_published_product->product_price}}</h2>
                                            <p>{{$v_published_product-> product_name}}</p>
                                            @if($v_published_product->category_name =="Bike")
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-warning"></i>Can not buy
                                            </a>
                                           @else
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
                                           @endif
                                        </div>
                                         <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>Rs {{$v_published_product->product_price}}</h2>
                                                <p>{{$v_published_product-> product_name}}</p>
                                                @if($v_published_product->category_name =="Bike")
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-warning"></i>Can not buy
                                            </a>
                                           @else
                                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
                                           @endif
                                            </div>
                                        </div>
                                        @if($v_published_product-> product_new !="" && $v_published_product-> product_sale =="")
                                        <img src="{{asset('new/new.png')}}" class="new" alt="">
                                        @elseif($v_published_product->product_sale !="" && $v_published_product-> product_new =="")
                                        <img src="{{asset('new/sales1.png')}}" class="sale" alt="">
                                        @elseif($v_published_product->product_sale !="" && $v_published_product-> product_new !="")
                                        <img src="{{asset('new/sales1.png')}}" class="sale" alt="">
                                        <img src="{{asset('new/new.png')}}" class="new" alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                         <?php } ?>
@endsection
