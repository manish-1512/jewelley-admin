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



//about us controller 
Route::post('/admin/about_us','App\Http\Controllers\Settings\AboutUSController@create')->name('about_us.create');
//privacy policy controller 
Route::post('/admin/privacy_policy','App\Http\Controllers\Settings\PrivacyPolicyController@create')->name('privacy_policy.create');


//user controller
//list of user
Route::get('/admin/users/','App\Http\Controllers\UserController@index')->name('users.show');
//save user form


    
Route::post('/admin/user/save','App\Http\Controllers\UserController@create')->name('user.save');


Route::view('/admin/dashboard','admin.dashboard')->name('dashboard.show');

//route for show products

Route::get('/admin/Products/','App\Http\Controllers\Products\ProductController@index')->name('product.list');

Route::view('/admin/Products/save','admin.SaveProduct')->name('product.add_new');


Route::Post('/admin/Products/create','App\Http\Controllers\Products\ProductController@create')->name('product.create');


Route::get('/admin/Products/view','App\Http\Controllers\Products\ProductController@viewProduct')->name('product.view_detail');

Route::get('/admin/Products/status/{id}','App\Http\Controllers\Products\ProductController@changeStatus')->name('product.status');
Route::get('/admin/Products/edit','App\Http\Controllers\Products\ProductController@edit')->name('product.edit');
Route::get('/admin/Products/delete','App\Http\Controllers\Products\ProductController@delete')->name('product.delete');

