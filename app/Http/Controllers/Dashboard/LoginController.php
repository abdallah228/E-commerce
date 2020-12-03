<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    //
    public function get_login()
    {
        return view('dashboard.auth.login');
    }
    public function post_login(AdminLoginRequest $request)
    {
        // validation done
        //check that email&& password in admin table

    $remember_me = $request->has('remember_me')?true:false;
if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me))
        {
            return route('admin.dashboard');
        }
        else{
            return redirect()->back()->with(['error'=>'هناك خطا بالبيانات']);
        }
    }
}
