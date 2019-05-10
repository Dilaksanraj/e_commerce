<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend route.....................
Route::get('/', 'HomeController@index');

//product_by_category routes
Route::get('/product_by_category/{category_id}', 'HomeController@product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@product_by_manufacture');
Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');

// cart routes are here....................
Route::post('/add-to-card','CartController@add_to_cart');
Route::get('/show-card','CartController@show_cart');
Route::get('/delete-to-cart/{id}','CartController@delete_to_cart');
Route::post('/update-card','CartController@update_cart');


 //checkout routes here...............
Route::get('/login-check','CheckoutController@login_check');
Route::get('/register','CheckoutController@register');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
Route::post('/update-card-with-payment','CheckoutController@update_cart_with_payment');
Route::get('/delete-to-cart-with-payment/{id}','CheckoutController@delete_to_cart_with_payment');

//payment related 
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');

//login and logout routes here
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout');



//backEnd admin route.......................
Route::get('/dashboard', 'SupperAdminController@index');
Route::post('/save-admin', 'SupperAdminController@saveAdmin');
Route::get('/profile', 'SupperAdminController@profile');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SupperAdminController@logout');

//category routes
Route::get('/add-category', 'CatergoryController@index');
Route::get('/all-category', 'CatergoryController@all_category');
Route::post('/save-category', 'CatergoryController@save_category');
Route::get('/unactivate_category/{category_id}', 'CatergoryController@unactivate_category');
Route::get('/activate_category/{category_id}', 'CatergoryController@activate_category');
Route::get('/edit_category/{category_id}', 'CatergoryController@edit_category');
Route::post('/update-category/{category_id}', 'CatergoryController@update_category');
Route::get('/delete_category/{category_id}', 'CatergoryController@delete_category');

//manufacture routes
Route::get('/add-manufacture', 'ManufactureController@index');
Route::get('/all-manufacture', 'ManufactureController@all_manufacture');
Route::post('/save-manufacture', 'ManufactureController@save_manufacture');
Route::get('/unactivate_manufacture/{manufacture_id}', 'ManufactureController@unactivate_manufacture');
Route::get('/activate_manufacture/{manufacture_id}', 'ManufactureController@activate_manufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');

//product routes
Route::get('/add-product', 'ProductController@index');
Route::get('/all-product', 'ProductController@all_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/unactivate_product/{product_id}', 'ProductController@unactivate_product');
Route::get('/activate_product/{product_id}', 'ProductController@activate_product');
Route::get('/edit_product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::get('/delete_product/{product_id}', 'ProductController@delete_product');
Route::get('/delete_new/{product_id}', 'ProductController@delete_new');
Route::get('/delete_sale/{product_id}', 'ProductController@delete_sale');
Route::get('/add_new/{product_id}', 'ProductController@add_new');
Route::get('/add_sale/{product_id}', 'ProductController@add_sale');

//slider route
Route::get('/add-slider', 'SliderController@index');
Route::get('/all-slider', 'SliderController@all_slider');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/unactivate_slider/{slider_id}', 'SliderController@unactivate_slider');
Route::get('/activate_slider/{slider_id}', 'SliderController@activate_slider');
Route::get('/delete_slider/{slider_id}', 'SliderController@delete_slider');


//social link routes

Route::get('/add-socialmedia', 'SocialController@index');
Route::post('/save-socialmedia', 'SocialController@save_socialmedia');
Route::get('/all-socialmedia', 'SocialController@all_socialmedia');

Route::get('/unactivate_social/{id}', 'SocialController@unactivate_social');
Route::get('/activate_social/{id}', 'SocialController@activate_social');
Route::get('/edit_social/{contact_id}', 'SocialController@edit_social');
Route::post('/update_social/{contact_id}', 'SocialController@update_social');
Route::get('/delete_social/{contact_id}', 'SocialController@delete_social');


// manage order routes
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/complete-order','CheckoutController@complete_order');
Route::get('/unactivate_order/{order_id}', 'CheckoutController@unactivate_order');
Route::get('/activate_order/{order_id}', 'CheckoutController@activate_order');
Route::get('/view_order/{order_id}', 'CheckoutController@view_order');
Route::get('/print_order/{order_id}', 'CheckoutController@print_order');
Route::get('/delete_order/{order_id}', 'CheckoutController@delete_order');

//Account routes
Route::get('/account','AccountController@index');

