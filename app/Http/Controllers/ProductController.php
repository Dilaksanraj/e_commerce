<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Validator;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
class ProductController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('admin.add_product');
    }

     public function all_product()
    {
        $this->AdminAuthCheck();
    	$all_product_info=DB::table('tbl_products')
    					->join('tbl_category', 'tbl_products.category_id', '=','tbl_category.category_id')
    					->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    					->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->orderBy('tbl_products.updated_at', 'DESC')
    					->get();
        // $count_product = count($all_product_info);


    	$manage_product=view('admin.all_product')
    		->with('all_product_info',$all_product_info);
    	return view('admin_layout')
    		->with('admin.allproducty',$manage_product);

    	//return view('admin.all_product');
    }

    public function save_product(Request $request)
    {
        $this->AdminAuthCheck();

         $v = Validator::make($request->all(), [
        'category_id' => 'required|numeric',
        'manufacture_id' => 'required|numeric',
    ]);

         if ($v->fails())
    {
        Session::put('error', 'Select Manufacture or Category');
        return redirect()->back()->withErrors($v->errors());


    }

    	$data = array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;

    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;

    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;

    	$data['product_color']=$request->product_color;
        $data['product_quantity']=$request->product_quantity;
        $data['product_sale']=$request->product_sale;
        $data['product_new']=$request->product_new;
    	$data['publication_status']=$request->publication_status;

    	$image = $request -> file('product_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image ->move($upload_path,$image_full_name);
    		if($success){
    			$data ['product_image']=$image_url;
    			DB::table('tbl_products')->insert($data);
    			Session::put('message','Product added successfully !!');
    			return Redirect::to('/add-product');
    		} 
    	}
    	
    	Session::put('error','Please select product image !!');
    	return Redirect::to('add-product');
    }

    public function unactivate_product($product_id)
    {
    	DB::table('tbl_products')
    		->where('product_id', $product_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Product unactivated successfully !! ');
    		return Redirect::to('/all-product');
    }

    public function activate_product($product_id)
    {
    	DB::table('tbl_products')
    		->where('product_id', $product_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Product activated successfully !! ');
    		return Redirect::to('/all-product');
    }


    public function edit_product($product_id)
    {
        $this->AdminAuthCheck();
    	//return view('admin.edit_category');
    	$product_info=DB::table('tbl_products')
    			->where('product_id',$product_id)
    			->first();

    	$product_info=view('admin.edit_product')
    			->with('product_info',$product_info);
    			return view('admin_layout')
    			->with('admin.edit_product',$product_info);
    }

    public function update_product(Request $request, $product_id)
    {

        $this->AdminAuthCheck();
    	$data = array();

         $v = Validator::make($request->all(), [
        'category_id' => 'required|numeric',
        'manufacture_id' => 'required|numeric',
    ]);

         if ($v->fails())
    {
        Session::put('error', 'Select Manufacture or Category');
        return redirect()->back()->withErrors($v->errors());


    }
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;

    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;

    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
        $data['product_quantity']=$request->product_quantity;
        $data['product_new']=$request->product_new;
        $data['product_sale']=$request->product_sale;
    	$data['publication_status']=$request->publication_status;

    	$image = $request -> file('product_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image ->move($upload_path,$image_full_name);
    		if($success){

    			$data ['product_image']=$image_url;
    			DB::table('tbl_products')
    					->where('product_id',$product_id)
    					->update($data);

    			Session::put('message','Product update successfully !!');
    			return Redirect::to('/all-product');
    		} 
    	}
    	
        Session::put('error','Please select product image !!');
       return redirect()->back();

    }

    public function delete_product($product_id)
    {

    	DB::table('tbl_products')
    	->where('product_id',$product_id)
    	->delete();

    	Session::get('message','product deleted successfully');
    	return Redirect::to('/all-product');
    }

     public function delete_new($product_id)
    {

        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['product_new' => 0]);

            Session::put('message', 'Product Removed from new list successfully !! ');
            return Redirect::to('/all-product');

    }

     public function delete_sale($product_id)
    {

        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['product_sale' => 0]);

            Session::put('message', 'Product Removed from sale list successfully !! ');
            return Redirect::to('/all-product');

    }

     public function add_new($product_id)
    {

        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['product_new' => 1]);

            Session::put('message', 'Product Add to new list successfully !! ');
            return Redirect::to('/all-product');

       
    }

     public function add_sale($product_id)
    {

        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['product_sale' => 1]);

            Session::put('message', 'Product Add to sale list successfully !! ');
            return Redirect::to('/all-product');

       
    }

    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id) {
            return;
        } else{
            return Redirect::to('/admin')->send();
        }
    }
}
