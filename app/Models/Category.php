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
    protected $casts = [ // to return true or false not 0 or 1
      'is_active'=>'boolean',
    ];

##function scopes####
public function scopeActive($query)
{
  return $query->where('is_active',1);
}


//.............methods....for main categories
    public function getActive()
    {
      return $this->is_active == 0 ?' not active':'active';
    }
    //.............scopes
    //make scope parent
    public function scopeParent($query)
    {
      return $query->whereNull('parent_id');
    }
    //make scope child
    public function scopeChild($query)
    {
      return $query->whereNotNull('parent_id');
    }


    //...........relations between category and subcategory in same class....
    public function _parent()
    {
      return $this->belongsTo(self::class,'parent_id');
    }//end subcategory
    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_category','product_id','category_id');

    }//end relation between products and categories

}
