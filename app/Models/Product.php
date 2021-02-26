<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use Translatable;
    use SoftDeletes;
    protected $guarded=[];
    protected $translatedAttributes = ['name','description','short_description'];// item that has translation
    protected $with = ['translations'];// to return translation in other lang not necessary
    //protected $hidden = ['translations'];//not return translation if i wanna return it in controller make it a visible
    protected $casts = [ // to return true or false not 0 or 1
      //
      'manage_stock'=>'boolean',
      'in_stock'=>'boolean',
      'is_actice'=>'boolean',
    ];
    protected $date =[
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deletes_at',
    ];

    ###########Relations#############
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id')->withDefault();
    }//end relation between product and brands

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_category','product_id','category_id');

    }//end relation between products and categories

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','product_tag','product_id','tag_id');

    }//end relations between products and tags








    ###############EndRelations##########
}
