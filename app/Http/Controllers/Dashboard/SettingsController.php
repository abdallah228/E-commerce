<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function edit_shipping($type)
    {
    if($type == 'freeshipping')
    $ShippingMethod = Setting::where('key','free_shipping_label')->get();
        
    elseif($type == 'innershipping')
    $ShippingMethod = Setting::where('key','local_shipping_label')->get();
    
    elseif($type == 'outershipping')
    $ShippingMethod = Setting::where('key','outer_shipping_label')->get();
    
    else 
    $ShippingMethod = Setting::where('key','free_shipping_label')->get();// free will be default

    return view('dashboard.settings.shipping_method.edit')->with('ShippingMethod',$ShippingMethod);   
}
    public function update_shipping($id)
    {

    }


}
