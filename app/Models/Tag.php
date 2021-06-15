<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Tag extends Model
{
    //
    use Translatable;
    protected $guarded=[];
    protected $translatedAttributes = ['name'];// item that has translation
    protected $with = ['translations'];// to return translation in other lang not necessary
    protected $hidden = ['translations'];//not return translation if i wanna return it in controller make it a visible
    ###relations 
    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_category','product_id','tag_id');

    }//end relation between products and tags
}
