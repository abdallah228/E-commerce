<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Setting;
use App\Models\SettingTranslation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingMethodRequest;
use Lang;
class SettingsController extends Controller

{
    //
    public function edit_shipping($type)
    {
    if($type == 'freeshipping')
    $ShippingMethod = Setting::where('key','free_shipping_label')->first();
        
    elseif($type == 'innershipping')
    $ShippingMethod = Setting::where('key','local_shipping_label')->first();
    
    elseif($type == 'outershipping')
    $ShippingMethod = Setting::where('key','outer_shipping_label')->first();
    
    else 
    $ShippingMethod = Setting::where('key','free_shipping_label')->first();// free will be default


    $store_name = Setting::where('key','store_name')->first();
    if(app()->getLocale() == 'en')
    {
    $store_name->translate('en')->value = Lang::get('admin/index/index.store_name');
    //$store_name->value = Lang::get('admin/index/index.store_name');
    $store_name->save();
    }
    elseif(app()->getLocale() == 'ar')
    {
        $store_name->translate('ar')->value = Lang::get('admin/index/index.store_name');
       //$store_name->value = Lang::get('admin/index/index.store_name');
        $store_name->save();
    }
    

return view('dashboard.settings.shipping_method.edit',compact('ShippingMethod'))->with('store_name',$store_name);   
}
   
public function update_shipping(ShippingMethodRequest $request ,$id)
{
    //return request();
    //validation
    
    $shipping = Setting::find($id); 
    $shipping->plain_value = $request->plain_value;
    if(app()->getLocale() == 'ar')
    {
       // $shipping->translate('ar')->value = $request->value;
       $shipping->value = $request->value;
        $shipping->save();
        return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
    }
    elseif(app()->getLocale() == 'en')
    {
       // $shipping->translate('en')->value = $request->value;
         $shipping->value = $request->value;
        $shipping->save();
        return redirect()->back()->with(['success'=>'every thing is ok']);
    }
    
    
    //update
}

}
