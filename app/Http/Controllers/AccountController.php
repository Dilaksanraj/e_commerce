<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\http\requests;
use Session;
session_start();
use Illuminate\support\facades\Redirect;
class AccountController extends Controller
{
    public function index()
    {
        $customer_id = Session::get('customer_id');
        if($customer_id != NULL){
             $account_by_view =DB::table('tbl_user')
                        ->where('user_id',$customer_id)
                        ->first();

            $all_order_by_view =DB::table('tbl_order')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->where('user_id',$customer_id)
                        ->select('tbl_order.*','tbl_order_details.*')
                        ->get();

        return view('pages.account')
        ->with(compact('account_by_view'))
        ->with(compact('all_order_by_view'));
        }
        else{
            return Redirect::to('/login-check');
        }
    }

}
