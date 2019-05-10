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
					<a href="#">Add Product</a>
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

					<?php
					$message_error = Session::get('error');
					
					if($message_error)
					{ ?>
						<div class="alert alert-danger" role="alert" style="font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
							<strong>
							<?php echo "$message_error";
							Session::put('error',null); ?>
							</strong>
						</div>
					<?php } ?>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-product')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="">
							  </div>
							</div>  
							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" required="" name="category_id">
								  	<option>Select category..</option>
							<?php
                                $all_publised_category = DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();

                            	foreach ($all_publised_category as $v_category) { ?>
									<option value="{{$v_category -> category_id}}">{{$v_category -> category_name}}</option>
							<?php } ?>

								  </select>
								</div>
							 </div> 

							 <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name</label>
								<div class="controls">
								  <select id="selectError3" required="" name="manufacture_id">
								  	<option >Select manufacture..</option>
							<?php
                                $all_publised_manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->get();

                            	foreach ($all_publised_manufacture as $v_manufacture) { ?>
									<option value="{{$v_manufacture -> manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
							<?php } ?>
								  </select>
								</div>
							 </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short Description</label>
							    <div class="controls">
									<textarea class="cleditor" name="product_short_description" rows="3" required=""></textarea>
							  	</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long Description</label>
							    <div class="controls">
									<textarea class="cleditor" name="product_long_description" rows="3" required=""></textarea>
							  	</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Product size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product quantity</label>
							  <div class="controls">
								<input type="number" class="input-xlarge" name="product_quantity" required="">
							  </div>
							</div>
							 
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Add to sales</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="product_sale"/>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Add to new arrival</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="product_new"/>
							  </div>
							</div>

							 <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satatus</label>
							  <div class="controls">
							  <input type="checkbox" value="1" name="publication_status"/>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection