<?php

namespace App\Http\Controllers;
use DB;
use App\http\requests;
use Session;
use Validator;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
session_start();
class CatergoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('admin.add_category');
    }

    public function all_category()
    {
        $this->AdminAuthCheck();
    	$all_category_info=DB::table('tbl_category')
                        ->orderBy('category_id', 'desc')
                        ->get();
    	$manage_category=view('admin.all_category')
    		->with('all_category_info',$all_category_info);
    	return view('admin_layout')
    		->with('admin.all_category',$manage_category);
    }

    public function save_category(Request $request)
    {
        $this->AdminAuthCheck();
    	$data = array();
        $category = $request->category_name;

        $category_validation = DB::table('tbl_category')
                ->where('category_name',$category)
                ->first();

    	$data['category_name'] = $category;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

        if ($category_validation) {
                Session::put('error', 'Opps Category already exit!! ');
                return Redirect('/add-category');
            }
            else{
                DB::table('tbl_category')->insert($data);
                Session::put('message', 'Category added successfully !! ');
                return Redirect::to('/add-category');
            }

    	
    }

    public function unactivate_category($category_id)
    {
        $this->AdminAuthCheck();
    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_status' => 0]);
    		Session::put('message', 'Category unactivated successfully !! ');
    		return Redirect::to('/all-category');
    }

    public function activate_category($category_id)
    {
        $this->AdminAuthCheck();
    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_status' => 1]);
    		Session::put('message', 'Category activated successfully !! ');
    		return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
        $this->AdminAuthCheck();
    	$category_info=DB::table('tbl_category')
    			->where('category_id',$category_id)
    			->first();

    	$category_info=view('admin.edit_category')
    			->with('category_info',$category_info);
    			return view('admin_layout')
    			->with('admin.edit_category',$category_info);
    }

    public function update_category(Request $request, $category_id)
    {
        $this->AdminAuthCheck();
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;

    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update($data);

    		Session ::get('message','Category update successfuly !!');
    		return Redirect::to('/all-category');
    }

    public function delete_category($category_id)
    {
        $this->AdminAuthCheck();
    	DB::table('tbl_category')
    	->where('category_id',$category_id)
    	->delete();

        DB::table('tbl_products')
        ->where('category_id',$category_id)
        ->delete();

    	Session::put('message','Category deleted successfully');
    	return Redirect::to('/all-category');
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
