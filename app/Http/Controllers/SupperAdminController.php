<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\http\requests;
use Session;
use Validator;
session_start();
use Illuminate\support\facades\Redirect;

class SupperAdminController extends Controller
{

	public function index()
    {
    	$this->AdminAuthCheck();
    	return view('admin.dashboard');
    }


    public function logout(){
    	Session::flush();
   		return Redirect::to('/login-check');
    }

    public function profile(){
        $this->AdminAuthCheck();
         $admin_id = Session::get('admin_id');
         $profile_by_view =DB::table('tbl_user')
                        ->where('user_id',$admin_id)
                        ->first();

        $list_all_admin =DB::table('tbl_user')
                        ->where('user_type',"admin")
                        ->get();

        return view('admin.profile')
        ->with(compact('profile_by_view'))
        ->with(compact('list_all_admin'));
    }


    public function saveAdmin(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();

            $userEmail = $request->email;

            $emailValidation = DB::table('tbl_user')
                ->where('user_email',$userEmail)
                ->first();


            $data['user_name']=$request->name;
            $data['user_email']=$userEmail;
            $data['phone_number']=$request->phone;
            $data['password']=md5($request->password);
            $data['user_type']='admin';

            if ($emailValidation) {
                Session::put('error', 'Opps Email already exit!! ');
                return Redirect('/profile');
            }

            else{

                DB::table('tbl_user')
            ->insert($data);
            Session::put('message', 'New Admin Added successfully!!');
            return Redirect('/profile');
            }
            
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
