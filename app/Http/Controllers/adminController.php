<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Carbon\Carbon;

class adminController extends Controller
{
    public function profile(Request $req)
    {
       $ur = DB::table('user')
                    ->where('uid',$req->session()->get('uid'))
                    ->first();
      return view('admin/profile',['user'=>$ur]);
    } 

    public function category_list(Request $req)
    {
      $categories = DB::table('category')
                    ->get();
      return view('admin/category_list',['categories'=>$categories]);
    }

    public function sub_category_list(Request $req)
    {
      $subcategories = DB::table('subcategory')
                    ->join('category', 'subcategory.cid', '=', 'category.cid')
                    ->select('subcategory.*', 'category.cname')
                    ->get();
      return view('admin/sub_category_list',['subcategories'=>$subcategories]);
    }

    public function item_list(Request $req)
    {
      $items = DB::table('item')
                    ->join('subcategory', 'subcategory.scid', '=', 'item.scid')
                    ->select('item.*', 'subcategory.scname')
                    ->get();
      return view('admin/item_list',['items'=>$items]);
    } 

    public function workers_list(Request $req)
    {
      $users = DB::table('user')
                    ->where('role','!=','Customer')
                    ->get();
      return view('admin/workers_list',['users'=>$users,'page'=>'All']);
    }

    public function admins_list(Request $req)
    {
      $users = DB::table('user')
                    ->where('role','=','Admin')
                    ->get();
      return view('admin/workers_list',['users'=>$users,'page'=>'Admin']);
    }

    public function managers_list(Request $req)
    {
      $users = DB::table('user')
                    ->where('role','=','Manager')
                    ->get();
      return view('admin/workers_list',['users'=>$users,'page'=>'Manager']);
    }

    public function employees_list(Request $req)
    {
      $users = DB::table('user')
                    ->where('role','=','Employee')
                    ->get();
      return view('admin/workers_list',['users'=>$users,'page'=>'Employee']);
    }

    public function payments_list(Request $req)
    {
      $payments = DB::table('payment')
                    ->get();
      return view('admin/payments_list',['payments'=>$payments]);
    }

    public function customers_list(Request $req)
    {
      $users = DB::table('user')
                    ->where('role','=','Customer')
                    ->get();
      return view('admin/customers_list',['users'=>$users]);
    }
    
    public function edit_profile(Request $req,$id)
    {
      $user = DB::table('user')
                    ->where('uid',$id)
                    ->first();
      return view('admin/edit_profile',['user'=>$user]);
    }

    public function update_profile(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'uname'=>'required',
        'email'=>'bail|required|email|exists:user,email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editprofile')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('user')
            ->where('uid',$id)
            ->update(
              [
                'uname' => $req->uname,
                'email' => $req->email,
                'password' => $req->password,
                'gender' => $req->gender,
                'phone' => $req->phone,
                'address' => $req->address
                ]
            );
            return redirect()->route('admin.profile');
        }
    }

    public function edit_category(Request $req,$id)
    {
      $category = DB::table('category')
                    ->where('cid',$id)
                    ->first();
      return view('admin/edit_category',['category'=>$category]);
    } 

    public function update_category(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'cname'=>'required'
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editcategory')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('category')
            ->where('cid',$id)
            ->update(
              [
                'cname' => $req->cname
                ]
            );
            return redirect()->route('admin.categorylist');
        }
    }

    public function new_category(Request $req)
    {
      return view('admin/new_category');
    }

    public function insert_category(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'cname'=>'required'
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.newcategory')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('category')
            ->insert(
              [
                'cname' => $req->cname
                ]
            );
            return redirect()->route('admin.categorylist');
        }
    }

    public function delete_category(Request $req,$id)
    {
      DB::table('category')
              ->where('cid', $id)
              ->delete();
      return redirect()->route('admin.categorylist');
    }

    public function edit_sub_category(Request $req,$id)
    {
      $subcategory = DB::table('subcategory')
                    ->where('scid',$id)
                    ->first();
      $categories = DB::table('category')
                    ->get();
      return view('admin/edit_sub_category',['subcategory'=>$subcategory,'categories'=>$categories]);
    } 

    public function update_sub_category(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'scname'=>'required',
        'cid'=>'required',
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editsubcategory')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('subcategory')
            ->where('scid',$id)
            ->update(
              [
                'scname' => $req->scname,
                'cid' => $req->cid,
                ]
            );
            return redirect()->route('admin.subcategorylist');
        }
    }

    public function new_sub_category(Request $req)
    {
      $categories = DB::table('category')
                    ->get();
      return view('admin/new_sub_category',['categories'=>$categories]);
    }

    public function insert_sub_category(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'scname'=>'required',
        'cid'=>'required'
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.newsubcategory')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('subcategory')
            ->insert(
              [
                'scname' => $req->scname,
                'cid' => $req->cid
                ]
            );
            return redirect()->route('admin.subcategorylist');
        }
    }

    public function delete_sub_category(Request $req,$id)
    {
      DB::table('subcategory')
              ->where('scid', $id)
              ->delete();
      return redirect()->route('admin.subcategorylist');
    }

    public function edit_item(Request $req,$id)
    {
      $item = DB::table('item')
                    ->where('iid',$id)
                    ->first();
      $subcategories = DB::table('subcategory')
                    ->get();
      return view('admin/edit_item',['item'=>$item,'subcategories'=>$subcategories]);
    } 

    public function update_item(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'iname'=>'required',
        'iprice'=>'required',
        'description'=>'required',
        'scid'=>'required',
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.edititem')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('item')
            ->where('iid',$id)
            ->update(
              [
                'iname' => $req->iname,
                'iprice' => $req->iprice,
                'description' => $req->description,
                'scid' => $req->scid
                ]
            );
            return redirect()->route('admin.itemlist');
        }
    }

    public function new_item(Request $req)
    {
      $subcategories = DB::table('subcategory')
                    ->get();
      return view('admin/new_item',['subcategories'=>$subcategories]);
    }

    public function insert_item(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'iname'=>'required',
        'iprice'=>'required',
        'description'=>'required',
        'scid'=>'required',
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.newitem')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('item')
            ->insert(
              [
                'iname' => $req->iname,
                'iprice' => $req->iprice,
                'description' => $req->description,
                'scid' => $req->scid,
                ]
            );
            return redirect()->route('admin.itemlist');
        }
    }

    public function delete_item(Request $req,$id)
    {
      DB::table('item')
              ->where('iid', $id)
              ->delete();
      return redirect()->route('admin.itemlist');
    }

    public function edit_worker(Request $req,$id)
    {
      $user = DB::table('user')
                    ->where('uid',$id)
                    ->first();
      return view('admin/edit_worker',['user'=>$user]);
    }

    public function update_worker(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'uname'=>'required',
        'email'=>'bail|required|email|exists:user,email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'role' => 'required',
        'status' => 'required',
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editworker')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('user')
            ->where('uid',$id)
            ->update(
              [
                'uname' => $req->uname,
                'email' => $req->email,
                'password' => $req->password,
                'gender' => $req->gender,
                'phone' => $req->phone,
                'address' => $req->address,
                'role' => $req->role,
                'status' => $req->status,
                ]
            );
            return redirect()->route('admin.workerslist');
        }
    }

    public function new_worker(Request $req)
    {
      return view('admin/new_worker');
    }

    public function insert_worker(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'uname'=>'required',
        'email'=>'bail|required|email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'role' => 'required',
        'status' => 'required',
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.newworker')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('user')
            ->insert(
              [
                'uname' => $req->uname,
                'email' => $req->email,
                'password' => $req->password,
                'gender' => $req->gender,
                'phone' => $req->phone,
                'address' => $req->address,
                'role' => $req->role,
                'status' => $req->status,
                ]
            );
            return redirect()->route('admin.workerslist');
        }
    }
    public function delete_worker(Request $req,$id)
    {
      DB::table('user')
              ->where('uid', $id)
              ->delete();
      return redirect()->route('admin.workerslist');
    }

    public function edit_payment(Request $req,$id)
    {
      $payment = DB::table('payment')
                    ->where('pid',$id)
                    ->first();
      return view('admin/edit_payment',['payment'=>$payment]);
    }
    public function update_payment(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'status'=>'required'
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editpayment')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('payment')
            ->where('pid',$id)
            ->update(
              [
                'status' => $req->status
              ]
            );
            $ol=DB::table('payment')
            ->where('pid',$id)
            ->first();
            DB::table('orderlog')
            ->where('olid',$ol->olid)
            ->update(
              [
                'status' =>"Shipping Ready"
              ]
            );
            return redirect()->route('admin.paymentslist');
        }
    }

    public function orderlog_list(Request $req)
    {
      $orders = DB::table('orderlog')
                    ->get();
      return view('admin/orderlog_list',['orders'=>$orders]);
    }
    public function edit_order(Request $req,$id)
    {
      $order = DB::table('orderlog')
                    ->where('olid',$id)
                    ->first();
      return view('admin/edit_orderlog',['order'=>$order]);
    }
    public function update_order(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'status'=>'required'
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.editorder')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('orderlog')
            ->where('olid',$id)
            ->update(
              [
                'status' =>$req->status
              ]
            );
            return redirect()->route('admin.orderloglist');
        }
    }
}