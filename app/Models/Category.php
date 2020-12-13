<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use Translatable;
    protected $guarded=[];
    protected $translatedAttributes = ['name'];// item that has translation
    protected $with = ['translations'];// to return translation in other lang not necessary
    protected $hidden = ['translations'];//not return translation if i wanna return it in controller make it a visible

    public function getActive()
    {
      return $this->is_active == 0 ?' مفعل':'غير مفعل';
    }

}
