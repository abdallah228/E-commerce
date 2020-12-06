<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Setting;
use App\Models\SettingTranslation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingMethodRequest;
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

    return view('dashboard.settings.shipping_method.edit',compact('ShippingMethod'));   
}
   
public function update_shipping(ShippingMethodRequest $request ,$id)
{
    //return request();
    //validation
    $shipping = Setting::find($id); 
    $shipping->plain_value = $request->plain_value;
    if(app()->getLocale() == 'ar')
    {
        $shipping->translate('ar')->value = $request->value;
        $shipping->save();
    return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
    }
    else{
        $shipping->translate('en')->value = $request->value;
        $shipping->save();
    return redirect()->back()->with(['success'=>'every thing is ok']);
         }
    
    //update
}

}
