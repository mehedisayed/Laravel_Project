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

Route::get('/admin/payments/excel', 'adminController@payments_list_genarate')->name('admin.genaratepaymentlist');

Route::get('/admin/payments/{id}/edit', 'adminController@edit_payment')->name('admin.editpayment');
Route::post('/admin/payments/{id}/edit', 'adminController@update_payment')->name('admin.editpayment');

//orderlog list

Route::get('/admin/orders', 'adminController@orderlog_list')->name('admin.orderloglist');


Route::get('/admin/orders/excel', 'adminController@orders_list_genarate')->name('admin.genarateorderlist');

Route::get('/admin/orders/{id}/edit', 'adminController@edit_order')->name('admin.editorderlog');
Route::post('/admin/orders/{id}/edit', 'adminController@update_order')->name('admin.editorderlog');

//manager 

//customers list done
Route::get('/manager/customers', 'managerController@customers_list')->name('manager.customerslist');

//profile done
Route::get('/Manager/profile', 'managerController@profile')->name('manager.profile');

Route::get('/manager/profile/{id}/edit', 'managerController@edit_profile')->name('manager.editprofile');
Route::post('/manager/profile/{id}/edit', 'managerController@update_profile')->name('manager.editprofile');

//category done
Route::get('/manager/product-category', 'managerController@category_list')->name('manager.categorylist');

Route::get('/manager/product-category/{id}/edit', 'managerController@edit_category')->name('manager.editcategory');
Route::post('/manager/product-category/{id}/edit', 'managerController@update_category')->name('manager.editcategory');

Route::get('/manager/product-category/new', 'managerController@new_category')->name('manager.newcategory');
Route::post('/manager/product-category/new', 'managerController@insert_category')->name('manager.newcategory');

Route::get('/managern/product-category/{id}/delete', 'managerController@delete_category')->name('manager.deletecategory');

//sub-category done
Route::get('/manager/product-sub-category', 'managerController@sub_category_list')->name('manager.subcategorylist');

Route::get('/manager/product-sub-category/{id}/edit', 'managerController@edit_sub_category')->name('manager.editsubcategory');
Route::post('/manager/product-sub-category/{id}/edit', 'managerController@update_sub_category')->name('manager.editsubcategory');

Route::get('/manager/product-sub-category/new', 'managerController@new_sub_category')->name('manager.newsubcategory');
Route::post('/manager/product-sub-category/new', 'managerController@insert_sub_category')->name('manager.newsubcategory');

Route::get('/manager/product-sub-category/{id}/delete', 'managerController@delete_sub_category')->name('manager.deletesubcategory');

//product item done
Route::get('/manager/product-item', 'managerController@item_list')->name('manager.itemlist');

Route::get('/manager/product-item/{id}/edit', 'managerController@edit_item')->name('manager.edititem');
Route::post('/manager/product-item/{id}/edit', 'managerController@update_item')->name('manager.edititem');

Route::get('/manager/product-item/new', 'managerController@new_item')->name('manager.newitem');
Route::post('/manager/product-item/new', 'managerController@insert_item')->name('manager.newitem');

Route::get('/manager/product-item/{id}/delete', 'managerController@delete_item')->name('manager.deleteitem');

//workers done

Route::get('/manager/workers', 'managerController@workers_list')->name('manager.workerslist');

Route::get('/manager/workers/{id}/edit', 'managerController@edit_worker')->name('manager.editworker');
Route::post('/manager/workers/{id}/edit', 'managerController@update_worker')->name('manager.editworker');

Route::get('/manager/workers/new', 'managerController@new_worker')->name('manager.newworker');
Route::post('/manager/workers/new', 'managerController@insert_worker')->name('manager.newworker');

Route::get('/manager/workers/{id}/delete', 'managerController@delete_worker')->name('manager.deleteworker');

//admin list done
Route::get('/manager/workers/managers', 'managerController@admins_list')->name('manager.managerlist');
//managers list done
Route::get('/manager/workers/managers', 'managerController@managers_list')->name('manager.managerlist');
//employee list done
Route::get('/manager/workers/employees', 'managerController@employees_list')->name('manager.employeelist');

//payment list 

Route::get('/manager/payments', 'managerController@payments_list')->name('manager.paymentslist');

Route::get('/manager/payments/{id}/edit', 'managerController@edit_payment')->name('manager.editpayment');
Route::post('/manager/payments/{id}/edit', 'managerController@update_payment')->name('manager.editpayment');

//orderlog list

Route::get('/manager/orders', 'managerController@orderlog_list')->name('manager.orderloglist');

Route::get('/manager/orders/{id}/edit', 'managerController@edit_order')->name('manager.editorderlog');
Route::post('/manager/orders/{id}/edit', 'managerController@update_order')->name('manager.editorderlog');

});

//sign up done
Route::get('/logout','logoutController@index')->name('logoutindex');
