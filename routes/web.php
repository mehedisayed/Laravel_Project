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
    return redirect()->route('loginindex');
});

Route::group(['middleware'=>['logsess']], function(){
//login done
Route::get('/login','loginController@index')->name('loginindex');
Route::post('/login','loginController@verification')->name('loginindex');

});

Route::group(['middleware'=>['sess']], function(){
//admin done

//customers list done
Route::get('/admin/customers', 'adminController@customers_list')->name('admin.customerslist');

//profile done
Route::get('/Admin/profile', 'adminController@profile')->name('admin.profile');

Route::get('/admin/profile/{id}/edit', 'adminController@edit_profile')->name('admin.editprofile');
Route::post('/admin/profile/{id}/edit', 'adminController@update_profile')->name('admin.editprofile');

//category done
Route::get('/admin/product-category', 'adminController@category_list')->name('admin.categorylist');

Route::get('/admin/product-category/{id}/edit', 'adminController@edit_category')->name('admin.editcategory');
Route::post('/admin/product-category/{id}/edit', 'adminController@update_category')->name('admin.editcategory');

Route::get('/admin/product-category/new', 'adminController@new_category')->name('admin.newcategory');
Route::post('/admin/product-category/new', 'adminController@insert_category')->name('admin.newcategory');

Route::get('/admin/product-category/{id}/delete', 'adminController@delete_category')->name('admin.deletecategory');

//sub-category done
Route::get('/admin/product-sub-category', 'adminController@sub_category_list')->name('admin.subcategorylist');

Route::get('/admin/product-sub-category/{id}/edit', 'adminController@edit_sub_category')->name('admin.editsubcategory');
Route::post('/admin/product-sub-category/{id}/edit', 'adminController@update_sub_category')->name('admin.editsubcategory');

Route::get('/admin/product-sub-category/new', 'adminController@new_sub_category')->name('admin.newsubcategory');
Route::post('/admin/product-sub-category/new', 'adminController@insert_sub_category')->name('admin.newsubcategory');

Route::get('/admin/product-sub-category/{id}/delete', 'adminController@delete_sub_category')->name('admin.deletesubcategory');

//product item done
Route::get('/admin/product-item', 'adminController@item_list')->name('admin.itemlist');

Route::get('/admin/product-item/{id}/edit', 'adminController@edit_item')->name('admin.edititem');
Route::post('/admin/product-item/{id}/edit', 'adminController@update_item')->name('admin.edititem');

Route::get('/admin/product-item/new', 'adminController@new_item')->name('admin.newitem');
Route::post('/admin/product-item/new', 'adminController@insert_item')->name('admin.newitem');

Route::get('/admin/product-item/{id}/delete', 'adminController@delete_item')->name('admin.deleteitem');

//workers done

Route::get('/admin/workers', 'adminController@workers_list')->name('admin.workerslist');

Route::get('/admin/workers/{id}/edit', 'adminController@edit_worker')->name('admin.editworker');
Route::post('/admin/workers/{id}/edit', 'adminController@update_worker')->name('admin.editworker');

Route::get('/admin/workers/new', 'adminController@new_worker')->name('admin.newworker');
Route::post('/admin/workers/new', 'adminController@insert_worker')->name('admin.newworker');

Route::get('/admin/workers/{id}/delete', 'adminController@delete_worker')->name('admin.deleteworker');

//admin list done
Route::get('/admin/workers/admins', 'adminController@admins_list')->name('admin.adminlist');
//managers list done
Route::get('/admin/workers/managers', 'adminController@managers_list')->name('admin.managerlist');
//employee list done
Route::get('/admin/workers/employees', 'adminController@employees_list')->name('admin.employeelist');

//payment list 

Route::get('/admin/payments', 'adminController@payments_list')->name('admin.paymentslist');

Route::get('/admin/payments/{id}/edit', 'adminController@edit_payment')->name('admin.editpayment');
Route::post('/admin/payments/{id}/edit', 'adminController@update_payment')->name('admin.editpayment');

//orderlog list

Route::get('/admin/orders', 'adminController@orderlog_list')->name('admin.orderloglist');

Route::get('/admin/orders/{id}/edit', 'adminController@edit_order')->name('admin.editorderlog');
Route::post('/admin/orders/{id}/edit', 'adminController@update_order')->name('admin.editorderlog');

});

//sign up done
Route::get('/logout','logoutController@index')->name('logoutindex');
