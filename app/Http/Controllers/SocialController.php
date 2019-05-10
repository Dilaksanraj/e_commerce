<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();

class SocialController extends Controller
{
   public function index()
   {
   	return view('admin/add_social');
   }

    public function save_socialmedia(Request $request)
    {
    	$this->AdminAuthCheck();
    	$data = array();
    	$data['contact_id'] = $request->contact_id;
    	$data['contact_mobile'] = $request->contact_mobile;
    	$data['contact_email'] = $request->email;
    	$data['contact_facebook'] = $request->facebook;
    	$data['contact_twitter'] = $request->twitter;
    	$data['contact_linkedin'] = $request->linkedin;
    	$data['contact_googleplus'] = $request->gooleplus;
    	$data['contact_location'] = $request->location;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_contact')->insert($data);
    	Session::put('message', 'Contact details added successfully !! ');
    	return Redirect::to('/add-socialmedia');
    }

    
     public function all_socialmedia()
    {
        $this->AdminAuthCheck();
    	$all_socialmedia_info=DB::table('tbl_contact')->get();
    	$manage_socialmedia=view('admin.all_social')
    		->with('all_socialmedia_info',$all_socialmedia_info);
    	return view('admin_layout')
    		->with('admin.all_social',$manage_socialmedia);

    	//return view ('admin.all_category');
    }


     public function unactivate_social($contact_id)
    {
    	DB::table('tbl_contact')
    		->where('contact_id', $contact_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Category unactivated successfully !! ');
    		return Redirect::to('/all-socialmedia');
    }

    public function activate_social($contact_id)
    {
    	DB::table('tbl_contact')
    		->where('contact_id', $contact_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Category activated successfully !! ');
    		return Redirect::to('/all-socialmedia');
    }



     public function edit_social($contact_id)
    {
        $this->AdminAuthCheck();
    	//return view('admin.edit_category');
    	$all_socialmedia=DB::table('tbl_contact')
    			->where('contact_id',$contact_id)
    			->first();

    	$all_socialmedia=view('admin.edit_social')
    			->with('all_socialmedia',$all_socialmedia);
    			return view('admin_layout')
    			->with('admin.edit_social',$all_socialmedia);
    }

    public function update_social(Request $request, $contact_id)
    {	
    	$this->AdminAuthCheck();
    	$data=array();
    	$data['contact_mobile'] = $request->contact_mobile;
    	$data['contact_email'] = $request->email;
    	$data['contact_facebook'] = $request->facebook;
    	$data['contact_twitter'] = $request->twitter;
    	$data['contact_linkedin'] = $request->linkedin;
    	$data['contact_googleplus'] = $request->gooleplus;
    	$data['contact_location'] = $request->location;

    	DB::table('tbl_contact')
    		->where('contact_id',$contact_id)
    		->update($data);

    		Session ::get('message','Contact update successfuly !!');
    		return Redirect::to('/all-socialmedia');
    }

    public function delete_social($contact_id)
    {
    	$this->AdminAuthCheck();
    	DB::table('tbl_contact')
    	->where('contact_id',$contact_id)
    	->delete();

    	Session::get('message','Category deleted successfully');
    	return Redirect::to('/all-socialmedia');
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
