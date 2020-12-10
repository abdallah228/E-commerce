<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    use Translatable;
    protected $guarded=[];
    protected $translatedAttributes = ['value'];// item that has translation


   // protected $with = ['translations'];// to return translation in other lang not necessary


    //function setSetting in seeder setting

    public static function setSetting($setting)
    {
        foreach($setting as $key=>$value)
        {
            self::set($key,$value);   //self replace $this but method is static then i use self this for dinamic
            //set is method that i will create it now in this page
            //can use it a dynamic this as u like
        }
    }
    public static function set($key,$value){
        if($key === 'translatable')
        {
            return static::setTranslatable($value);//setTranslatable is a function that i will make it now

        }
        if(is_array($value))
        {
            $value = json_encode($value);
        }
        static::updateOrCreate(['key'=>$key],['plain_value'=>$value]);//json_encode to prove array as a string or any type
    }
    public static function setTranslatable($setting)
    {
        foreach($setting as $key=>$value)
        {
            static::updateOrCreate(
                [
                    'key'=>$key,
                ],
                [
                    'is_translatable'=>true,
                    'value'=>$value,
                ]
                );

        }
    }
}
