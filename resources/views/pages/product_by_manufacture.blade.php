@extends('layout')
@section('content')
                    <h2 class="title text-center">Features Items</h2>
                        <?php
                        foreach ($product_by_manufacture as $v_manufacture_by_product) { ?>
                    <div class="col-sm-3" style="height: 400px; margin-top: 20px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}">
                                                <img src="{{asset($v_manufacture_by_product->product_image)}}" alt="" style="height: 250px;" />
                                            </a>
                                            <h2>Rs {{$v_manufacture_by_product->product_price}}</h2>
                                            <p>{{$v_manufacture_by_product-> product_name}}</p>
                                            @if($v_manufacture_by_product->category_name =="Bike")
                                            <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-warning"></i>Can not buy
                                            </a>
                                           @else
                                            <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
                                           @endif
                                        </div>
                                         <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>Rs {{$v_manufacture_by_product->product_price}}</h2>
                                                <p>{{$v_manufacture_by_product-> product_name}}</p>
                                                @if($v_manufacture_by_product->category_name =="Bike")
                                            <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-warning"></i>Can not buy
                                            </a>
                                           @else
                                            <a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart
                                            </a>
                                           @endif
                                            </div>
                                        </div>
                                        @if($v_manufacture_by_product-> product_new !="" && $v_manufacture_by_product-> product_sale =="")
                                        <img src="{{asset('new/new.png')}}" class="new" alt="">
                                        @elseif($v_manufacture_by_product->product_sale !="" && $v_manufacture_by_product-> product_new =="")
                                        <img src="{{asset('new/sales1.png')}}" class="sale" alt="">
                                        @elseif($v_manufacture_by_product->product_sale !="" && $v_manufacture_by_product-> product_new !="")
                                        <img src="{{asset('new/sales1.png')}}" class="sale" alt="">
                                        <img src="{{asset('new/new.png')}}" class="new" alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                         <?php } ?>

                
@endsection