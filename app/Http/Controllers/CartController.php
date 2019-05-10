<?php

namespace App\Http\Controllers;
use DB;
use Cart;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
use Validator;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$rules=[
    		'name'=>'required',
    		'quantity'=>'required|numeric',
    		'id'=>'required',
    		'price'=>'required'
    	];

    	$qty = $request->qty;
    	$product_id=$request->product_id;

    	$product_info = DB::table('tbl_products')
    					->where('product_id', $product_id)
    					->first();

    	$data['quantity'] =$qty;
    	$data['id']=$product_info->product_id;
    	$data['price']=$product_info->product_price;
    	$data['name']=$product_info->product_name;
    	$data['attributes']['image'] = $product_info->product_image;

    	$validation = validator::make($data,$rules);
        if($qty < 0 || $qty == 0 ){

           Session::put('message', 'Opps Quantity can not be less than one !! ');
           return back();
        }
    	else{
    		Cart::add($data);
    		return Redirect::to('/show-card');
    	}
    }

    public function show_cart()
    {
    	$all_published_category=DB::table('tbl_category')
    							->where('publication_status',1)
    							->get();

    		$manage_published_category=view('pages.add_to_cart')
    		->with('all_published_category',$all_published_category);
    	return view('layout_no_slider')
    		->with('pages.add_to_cart',$manage_published_category);
    }


    public function delete_to_cart($id)
    {
    	Cart::remove($id);
    	return Redirect::to('/show-card');
    }

    public function update_cart(Request $request)
    {
    	$id= $request->id;
    	$name1 = $request->submit1;


    	if($name1=="+")
    	{
    		Cart::update($id, array('quantity' => 1
    	 ));

    	return Redirect::to('/show-card');
    	}

    	else{
    		Cart::update($id, array('quantity' => -1
    	 ));

    	return Redirect::to('/show-card');
    	}

    }
}
