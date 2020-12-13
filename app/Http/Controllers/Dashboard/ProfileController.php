<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use App\Http\Requests\ProfileRequest;
use App\Models\Setting;
use App\Traits\NameSite\NameTrait;

class ProfileController extends Controller
{
    //
    use NameTrait;
    public function edit()
    {

        $store_name = $this->name_site();//function in trait

       $id = auth('admin')->user()->id;
       $admin = Admin::find($id);
       return view('dashboard.profile.profile',compact('admin','store_name'));
    }
    public function update(ProfileRequest $request)
    {
        //validate
        //update
        
        try{
            $admin = auth('admin')->user()->id;
            $profile = Admin::find($admin);
            if($request->filled('password'))
            {
               $profile->password = bcrypt($request->password);
               $profile->save();
                
            }
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->save();
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);

        }
        catch(Exception $ex)
        {
            return redirect()->back()->with(['error'=>'عفوا يوجد هناك خطا ما']);
        }
    }
}
