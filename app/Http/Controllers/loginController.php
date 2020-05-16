<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;

class loginController extends Controller
{
    public function index(Request $req)
    {    
    	return view('login/index'); 
    }

    public function verification(Request $req)
    {
       $validation = Validator::make($req->all(), [
            'email'=>'bail|required|email|exists:user,email',
            'password'=>'required|min:6'  
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
            }

            else {
                 $user = DB::table('user')
                    ->where('email', $req->email)
                    ->where('password', $req->password)
                    ->first();
           
              if($user->role=='Admin'){
                $req->session()->put('role', $user->role);
                $req->session()->put('uid', $user->uid);
                   return redirect()->route('admin.profile');
               }
              else if($user->role=='manager'){
                $req->session()->put('role', $user->role);
                $req->session()->put('uid', $user->id);
                   return redirect()->route('manager.index');
               }
               else if($user->role=='employee'){
                $req->session()->put('role', $user->role);
                $req->session()->put('uid', $user->id);
                return redirect()->route('employee.index');
            }
            else if($user->role=='customer'){
                $req->session()->put('uid', $user->id);
                $req->session()->put('role', $user->role);
                return redirect()->route('customer.index');
            }
               else{
                   return redirect()->route('loginindex');
               }
        }
    }
            
}