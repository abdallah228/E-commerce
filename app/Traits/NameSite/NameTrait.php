<?php

namespace App\Traits\NameSite;
use Lang;
use App\Models\Setting;

Trait NameTrait
{
    protected function name_site()
    {
        $store_name = Setting::where('key','store_name')->first();
        if(app()->getLocale() == 'en')
        {
        $store_name->translate('en')->value = Lang::get('admin/index/index.store_name');
      //  $store_name->value = Lang::get('admin/index/index.store_name');
        $store_name->save();
        return $store_name;
        }
        elseif(app()->getLocale() == 'ar')
        {
            $store_name->translate('ar')->value = Lang::get('admin/index/index.store_name');
           //$store_name->value = Lang::get('admin/index/index.store_name');
            $store_name->save();
            return $store_name;
       
    }
    }
}


