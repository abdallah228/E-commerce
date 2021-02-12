<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    use Translatable;
    protected $guarded=[];
    protected $translatedAttributes = ['name'];// item that has translation
    protected $with = ['translations'];// to return translation in other lang not necessary
    protected $hidden = ['translations'];//not return translation if i wanna return it in controller make it a visible
    protected $casts = [ // to return true or false not 0 or 1
      'is_active'=>'boolean',
    ];



    ######## active or not for brands #######
    public function getActive()
    {
      return $this->is_active == 0 ?' not active':'active';
    }
    #########getPhotoAttribute#####
    public function getPhotoAttribute($val)
    {
      return  $val !== null ? asset('admin/images/brands/'.$val) :''; 
    }
}
