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
use Mail;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;

class CheckoutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }

  public function register()
    {
        return view('pages.register');
    }


    public function customer_registration(Request $request)
    {
    		$data=array();
            $userEmail = $request->customer_email;

            $emailValidation = DB::table('tbl_user')
                ->where('user_email',$userEmail)
                ->first();
    		$data['user_name']=$request->customer_name;
    		$data['user_email']=$userEmail;
    		$data['phone_number']=$request->phone_number;
    		$data['password']=md5($request->password);
    		$data['user_type']="";

            if ($emailValidation) {
                Session::put('message', 'Opps Email already exit!! ');
                return Redirect('/register');
            }

            else
            {

               if($request->password == $request->confirm_password )
                {
                    $customer_id = DB::table('tbl_user')
                                ->insertGetId($data);

                    Session::put('customer_id', $customer_id);
                    Session::put('customer_name',$request->customer_name);
                    // Session::put('message', 'Regitered successfully');
                    return Redirect('/');
                }

                else
                {
                    Session::put('message', 'Opps password not match!! ');
                    return Redirect('/login-check');
                }
            }
    		
    }

    public function checkout()
    {
    	return view('pages.checkout');
    }

    public function save_shipping_details(Request $request)
    {
        $v = Validator::make($request->all(), [
        'shipping_mobile_number' => 'required|numeric',
    ]);

         if ($v->fails())
    {
        Session::put('message', 'Mobile number should be number');
        return redirect()->back()->withErrors($v->errors());


    }

    	$data = array();
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_first_name'] = $request->shipping_first_name;
    	$data['shipping_last_name'] = $request->shipping_last_name;
    	$data['shipping_address1'] = $request->shipping_address_1;
    	$data['shipping_address2'] = $request->shipping_address_2;
    	$data['shipping_first_name'] = $request->shipping_first_name;
    	$data['shipping_mobile_number'] = $request->shipping_mobile_number;
    	$data['shipping_city'] = $request->shipping_city;

    	$shipping_id = DB::table('tbl_shipping')
    							->insertGetId($data);
    			Session::put('shipping_id', $shipping_id);
    			return Redirect('/payment');
    }

    public function customer_login(Request $request)
    {
        $shipping_id = Session::get('shipping_id');
    	$customer_email = $request->customer_email;
    	$password =md5( $request->password);
    	$user_type = "admin";
//        echo $shipping_id;

    	$result = DB::table('tbl_user')
    			->where('user_email',$customer_email)
    			->where('password',$password)
    			->first();

    	$admin_result = DB::table('tbl_user')
    			->where('user_email',$customer_email)
    			->where('password',$password)
    			->where('user_type',$user_type)
    			->first();
    			if($admin_result)
    			{
                    Session::put('admin_name',$admin_result->user_name);
                    Session::put('admin_id',$admin_result->user_id);
    				return Redirect::to('/dashboard');
    			}

    			else if($result)
    			{
    				Session::put('customer_id',$result->user_id);

                    $contents = Cart::getContent();
                    
                    if($shipping_id != null){

                        return Redirect::to('/checkout');
                    }

                    else

                        return Redirect::to('/');
    			}

    			else
    			{
    				Session::put('message', 'Opps password not match!! ');
    				return Redirect('/login-check');
    			}
    }

    public function payment()
    {
        return view ('pages.payment');
    }

    public function update_cart_with_payment(Request $request)
    {

    	$id= $request->id;
    	$name1 = $request->submit1;

    	if($name1=="+")
    	{
    		Cart::update($id, array('quantity' => 1
    	 ));

    	return Redirect::to('/payment');
    	}

    	else
    	{
    		Cart::update($id, array('quantity' => -1
    	 ));

    	return Redirect::to('/payment');
    	}

        $quantity = $request->quantity;

        $available_quantity =  DB::table('tbl_products')
                                    ->select('product_quantity')
                                    ->where('product_id',$id)
                                    ->get();
        $net_quantity = $available_quantity - $quantity;

            DB::table('tbl_products')
            ->where('product_id',$id)
            ->update('product_quantity',$net_quantity);
	}

    public function delete_to_cart_with_payment($id)

    {
        Cart::remove($id);
        return Redirect::to('/payment');
    }

	public function order_place(Request $request)
	{
		$payment_gateway = $request->payment_gateway;
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id'); 

        $pdata = array();
        $pdata['payment_method'] = $payment_gateway;
        $pdata['payment_status'] = 'pending';

           $payment_id = DB::table('tbl_payment')
                        ->insertGetId($pdata);


        $odata = array();
        $odata['user_id'] = $customer_id;
        $odata['shipping_id'] = $shipping_id;
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::getSubTotal();
        $odata['order_status'] = 'pending';

        $order_id = DB::table('tbl_order')
                    ->insertGetId($odata);

        $contents = Cart::getContent();
        $oddata = array();

        foreach ($contents as $v_contents) 
        {

        $oddata['order_id'] = $order_id;
        $oddata['product_id'] = $v_contents->id;
        $oddata['product_name'] = $v_contents->name;
        $oddata['product_price'] = $v_contents->price;
        $oddata['product_sale_quantity'] = $v_contents->quantity;

                DB::table('tbl_order_details')
                ->insert($oddata);

        }

        if ($payment_gateway =='visa') {
            Cart::clear();
            echo "visa";
        }
        elseif ($payment_gateway=='master') {
            Cart::clear();
             echo "master";
        }
         elseif ($payment_gateway=='paypal') {
            Cart::clear();
             return Redirect::to('https://www.paypal.com/lk/home');
        }
         elseif ($payment_gateway=='handcash') {
            Cart::clear();
           
            // Mail::send(['text'=>'admin.mail'],['name'=>'NS_Brothers'], function($message){
            //     $message ->to('dilaksanraj510@gmail.com','To Dilaksan')->subject('Invoice');
            //     $message ->from('dilaksanraj510@gmail.com','NsBrothers');
            // });

             return view('pages.handcash');

        }
         elseif ($payment_gateway=='ez-cash') {
            Cart::clear();
            echo "ez-cash";
        }

        else{
            echo "payment error";
        }


	}


    public function manage_order()
    {
         $this->AdminAuthCheck();
        $all_order_info=DB::table('tbl_order')
                        ->join('tbl_user', 'tbl_order.user_id', '=','tbl_user.user_id')
                        ->where('tbl_order.order_status','=',"Pending")
                        ->select('tbl_order.*','tbl_user.user_name')
                        ->orderBy('tbl_order.order_id', 'desc')
                        ->get();

        $manage_order=view('admin.manage_order')
            ->with('all_order_info',$all_order_info);
        return view('admin_layout')
            ->with('admin.manage_order',$manage_order);

    }

      public function complete_order()
    {
         $this->AdminAuthCheck();
        $all_order_info=DB::table('tbl_order')
                        ->join('tbl_user', 'tbl_order.user_id', '=','tbl_user.user_id')
                        ->where('tbl_order.order_status','=',"Done")
                        ->select('tbl_order.*','tbl_user.user_name')
                        ->orderBy('tbl_order.order_id', 'desc')
                        ->get();

        $manage_order=view('admin.completed_order')
            ->with('all_order_info',$all_order_info);
        return view('admin_layout')
            ->with('admin.completed_order',$manage_order);

    }



     public function unactivate_order($order_id)
    {
         $this->AdminAuthCheck();
        DB::table('tbl_order')
                ->where('order_id', $order_id)
                ->update(['order_status' => "Pending"]);
            Session::put('message', 'Order Unactivated successfully !! ');
            return Redirect::to('/manage-order');
    }

    public function activate_order($order_id)
    {
         $this->AdminAuthCheck();
                DB::table('tbl_order')
                ->where('order_id', $order_id)
                ->update(['order_status' => "Done"]);
            Session::put('message', 'Order activated successfully !! ');
            return Redirect::to('/manage-order');
    }

    public function view_order($order_id)
    {
         $this->AdminAuthCheck();
         $all_order_by_view =DB::table('tbl_order')
                        ->join('tbl_user', 'tbl_order.user_id', '=','tbl_user.user_id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.id')
                        ->where('tbl_order.order_id',$order_id)
                        ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_user.*')
                        ->first();

        $manage_view_order=view('admin.view_order')
            ->with('all_order_by_view',$all_order_by_view );
        return view('admin_layout')
            ->with('admin.view_order',$manage_view_order);

    }


    public function print_order($order_id)
    {
         $this->AdminAuthCheck();
        $all_order_by_print =DB::table('tbl_order')
                        ->join('tbl_user', 'tbl_order.user_id', '=','tbl_user.user_id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.id')
                        ->where('tbl_order.order_id',$order_id)
                        ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_user.*')
                        ->first();

        $manage_view_print=view('admin.print_order')
            ->with('all_order_by_print',$all_order_by_print );
        return view('admin_layout')
            ->with('admin.print_order',$manage_view_print);
    }

    public function delete_order($order_id)
    {
         $this->AdminAuthCheck();
        DB::table('tbl_order')
        ->where('order_id',$order_id)
        ->delete();

        DB::table('tbl_order_details')
        ->where('order_id',$order_id)
        ->delete();

        Session::put('message','Order deleted successfully');
        return Redirect::to('/manage-order');
    }

    public function customer_logout()
    {
    	Session::flush();
    	return Redirect::to('/login-check');
    }

     public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id) {
            return;
        } else{
            return Redirect::to('/login-check')->send();
        }
    }
}

