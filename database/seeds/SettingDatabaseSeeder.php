<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::SetSetting([    //SetSetting is a function that i make it in setting model
                'default_locale'=>'ar',
                'default_time_zone'=>'Africa/Cairo',
                'reviews_enable'=>true,
                'auto_approve_review'=>true,
                'supported_currencies'=>['USD','LE','SAR'],
                'default_curency'=>'USD',
                'store_email'=>'store@store.com',
                'search_engine'=>'mysql',
                'local_shipping_cost'=>0,
                'outer_shipping_cost'=>0,
                'free_shipping_cost'=>0,
                'translatable'=>[  
                    'store_name'=>'Rashid Store',
                    'free_shipping_label'=> 'Free Shipping',
                    'outer_shipping_label'=>'Outer Shipping',
                    'local_shipping_label'=>'Local Shipping',
            
                ],
        ]);
        

    }
}
