@extends('admin_layout')
@section('admin_content')

<style type="text/css">
	
	blink {
    -webkit-animation: 2s linear infinite condemned_blink_effect; // for android
    animation: 2s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for android
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}
@keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}

</style>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">	
				
				<a class="quick-button metro blue span2" href="{{URL::to('/manage-order')}}">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge">
					<?php
 						$all_order_count=DB::table('tbl_order')
 						// ->where('order_status',"pending")
 						// ->where('order_status',"Done")
                        ->get();
 						$order_count = count($all_order_count);
 						echo $order_count;
					?>
					</span>
				</a>

				
				<a class="quick-button metro red span2" href="{{URL::to('/all-manufacture')}}">
					<i class="icon-group"></i>
					<p>Manufactures</p>
					<span class="badge">
						<?php
 						$all_manufacture_count=DB::table('tbl_manufacture')
 						->where('publication_status',1)
                        ->get();
 						$manufacture_count = count($all_manufacture_count);
 						echo $manufacture_count;
					?>
					</span>
				</a>
				
				<a class="quick-button metro green span2" href="{{URL::to('/all-product')}}">
					<i class="icon-barcode"></i>
					<p>Products</p>
					<span class="badge">
						<?php
 						$all_products_count=DB::table('tbl_products')
 						->where('publication_status',1)
                        ->get();
 						$products_count = count($all_products_count);
 						echo $products_count;
					?>

					</span>
				</a>
				<a class="quick-button metro yellow span2" href="{{URL::to('/all-category')}}">
					<i class="icon-group"></i>
					<p>Category</p>
					<span class="badge">
						<?php
 						$all_category_count=DB::table('tbl_category')
 						->where('publication_status',1)
                        ->get();
 						$category_count = count($all_category_count);
 						echo $category_count;
					?>
					</span>
				</a>

				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Messages</p>
					<span class="badge">88</span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Calendar</p>
				</a>				
			</div>
			<div class="clearfix">
				<hr>
			</div>

			

			<div class="row-fluid">
				
				<div class="span8 widget blue" onTablet="span4" onDesktop="span4">
					
					<div id="stats-chart2"  style="height:282px" ></div>
					
				</div>

				<?php
 						$all_order_count_today=DB::table('tbl_order')
 						->whereDate('created_at', today())
 						->get();
 						$order_count_today = count($all_order_count_today);
 						
					?>
				<div class="sparkLineStats span4 widget" onTablet="span5" onDesktop="span4" style="background-color:#eee">
					 <h3>Today's Summery</h3>
					 @if($order_count_today > 0)
					 <table border="">
						<tr>
							<th style="text-align: left;">Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
						</tr>

						<?php
 						$all_order_today=DB::table('tbl_order_details')
 						/*->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
 						->select('tbl_order.order_id','tbl_order_details*')*/
 						->whereDate('created_at', today())
 						->get();

 						// ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')

 						foreach ($all_order_today as $v_order_today ) { 
 								
 								$getTotal = $v_order_today->product_sale_quantity * $v_order_today->product_price;
 							?>
 								
						<tr>
							<td style="width: 150px;">{{$v_order_today->product_name}}</td>
							<td>{{$v_order_today->product_sale_quantity}}</td>
							<td>{{$v_order_today->product_price}}</td>
							<td><?php echo $getTotal; ?></td>
						</tr>

					<?php } ?>

					 </table>
					@else
					<div class="jumbotron"> No Order Today</div>
					@endif

					<div class="clearfix"></div>

                </div><!-- End .sparkStats -->

<?php 
						$product_inventory_count=DB::table('tbl_products')
						->where('publication_status',1)
 						->where('product_quantity','<=',15)
                        ->get();

                        $count_low_inventory_product = count($product_inventory_count);
                        //echo $count_low_inventory_product;
                 ?>

                 @if( $count_low_inventory_product >0)
                

				<div class="sparkLineStats span4 widget" onTablet="span5" onDesktop="span4" style="background-color:#eee">
					 <blink> <span class="label label-important">Alert</span></a></blink>

					<h3>Low Inventory of <?php echo $count_low_inventory_product; ?> Products</h3>

                    <table border="">
                    	<tr>
                    		<th style="text-align: left;">Product Name</th>
                    		
                    		<th>Available Quantity</th>

                    	</tr>
                    	
                   <?php 
						$product_inventory=DB::table('tbl_products')
						->where('publication_status',1)
 						->where('product_quantity','<=',15)
                        ->get();
 						/*$products_inventory_count = count($product_inventory);*/
 						foreach ($product_inventory as $v_inventory) { ?>
 							<!-- echo $v_inventory->product_name; -->
						<tr>

                    		<td style="width: 150px;">{{$v_inventory->product_name}}</td>
                    		
                    		<td>{{$v_inventory->product_quantity}}</td>
                    	</tr>

                    		<?php }?>
                    	
                    </table>
					
					<div class="clearfix"></div>

                </div><!-- End .sparkStats -->

               @endif
				
			</div>

			<div class="row-fluid">
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					<div class="number">854<i class="icon-arrow-up"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>	
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number">123<i class="icon-arrow-up"></i></div>
					<div class="title">sales</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number">982<i class="icon-arrow-up"></i></div>
					<div class="title">orders</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">678<i class="icon-arrow-down"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	
				
			</div>
<!-- 
		'database'  => 'childcare',
		'username'  => 'root',
		'password'  => '', -->
			
			
@endsection