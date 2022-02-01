<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts','App\Http\Controllers\PostController');

//++++++++++++++++Routes for product category +++++++++++++
Route::get('category_form',function(){
    return view('saveCategory');
});

Route::view('dashboard','admin.dashboard');

    
Route::get('/admin/category/','App\Http\Controllers\CategoryController@index')->name('category.index');
Route::post('/admin/category/create','App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('/admin/category/update','App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('/admin/category/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('category.edit');
Route::get('/admin/category/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('category.delete');



//privacy policy controller 

Route::get('/admin/privacy_policy','App\Http\Controllers\Settings\PrivacyPolicyController@view')->name('privacy_policy.view');
Route::Post('/admin/privacy_policy/update','App\Http\Controllers\Settings\PrivacyPolicyController@update')->name('privacy_policy.update');



Route::get('/admin/about_us','App\Http\Controllers\Settings\AboutUSController@view')->name('about_us.view');
Route::post('/admin/about_us/update','App\Http\Controllers\Settings\AboutUSController@update')->name('about_us.update');

// Route::post('/admin/privacy_policy','App\Http\Controllers\Settings\PrivacyPolicyController@create')->name('privacy_policy.create');


//user controller
//list of user
Route::get('/admin/users/','App\Http\Controllers\UserController@index')->name('users.show');
//show user orders
Route::get('/admin/user/orders/{user_id}','App\Http\Controllers\UserController@userOrders')->name('user.orders');


    
Route::post('/admin/user/save','App\Http\Controllers\UserController@create')->name('user.save');


Route::view('/admin/dashboard','admin.dashboard')->name('dashboard.show');

//route for show products

Route::get('/admin/Products/','App\Http\Controllers\Products\ProductController@index')->name('product.list');

Route::view('/admin/Products/save','admin.SaveProduct')->name('product.add_new');


Route::Post('/admin/Products/create','App\Http\Controllers\Products\ProductController@create')->name('product.create');


Route::get('/admin/Products/view','App\Http\Controllers\Products\ProductController@viewProduct')->name('product.view_detail');

Route::get('/admin/Products/status/{id}','App\Http\Controllers\Products\ProductController@changeStatus')->name('product.status');


Route::get('/admin/Products/edit/{id}','App\Http\Controllers\Products\ProductController@edit')->name('product.edit');

Route::Post('/admin/Products/update','App\Http\Controllers\Products\ProductController@update')->name('product.update');



Route::get('/admin/Products/delete/{id}','App\Http\Controllers\Products\ProductController@delete')->name('product.delete');

//////////////////////
Route::get('/admin/Products_categories/','App\Http\Controllers\Products\ProductCategoryController@index')->name('product_category.list');


Route::view('/admin/Products_categories/save','admin.SaveProductCategory')->name('product_category.save');


 Route::Post('/admin/Products_categories/create','App\Http\Controllers\Products\ProductCategoryController@create')->name('product_category.create');

 Route::get('/admin/Products_categories/status/{id}','App\Http\Controllers\Products\ProductCategoryController@ChangeStatus')->name('product_category.status');

// Route::get('/admin/Products_categories/edit','App\Http\Controllers\Products\ProductCategoryController@edit')->name('product_category.edit');
// Route::get('/admin/Products_categories/delete/{id}','App\Http\Controllers\Products\ProductCategoryController@delete')->name('product_category.delete');

////////////////////////////////

Route::get('/admin/System/banner/','App\Http\Controllers\System\BannerController@view')->name('banner_image.list');

use App\Http\Controllers\RazorpayController;

Route::get('product', 'App\Http\Controllers\Website\RazorpayController@index');

Route::get('paysuccess', 'App\Http\Controllers\Website\RazorpayController@razorPaySuccess');
Route::get('razor-thank-you', 'App\Http\Controllers\Website\RazorpayController@RazorThankYou');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
