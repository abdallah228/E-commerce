<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Category;
use App\Traits\NameSite\NameTrait;//to application name
use App\Traits\Categories\PhotoTrait;//trait for images
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\ProductStockRequest;
use App\Http\Requests\ImageProductRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{
    //
    use NameTrait;//to name of site
    use PhotoTrait;//trait images

    public function index()
    {
        $store_name = $this->name_site();

        $products = Product::SelectProduct()->paginate(PAGINATION_COUNT);//this is scope
       // return $products;
        return view('dashboard.products.general.index',compact('products','store_name'));

    }//end function index

    public function create()
    {

       // $store_name =
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
       $data['categories'] = Category::active()->get();
       $data['tags'] = Tag::select('id')->get();
       $data['store_name'] = $this->name_site();
       //return $data;
       return view('dashboard.products.general.create',$data);


    }//end function create
    public function store(GeneralProductRequest $request)
    {
        //validation done
        if($request->has('is_active'))
            $request->request->add(['is_active'=>1]);
        else
            $request->request->add(['is_active'=>0]);


        $products = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'short_description'=>$request->short_description,
            'slug'=>$request->slug,
            'is_active'=>$request->is_active,
        ]);
        $products->categories()-> attach($request->categories);//categories is a relation
        $products->tags()->attach($request->tags);//tags is a relations
        return redirect()->route('admin.products')->with(['success'=>'تم اضافه المنتج بنجاح']);

    }//end store function


    public function get_price($id)
    {
        $store_name = $this->name_site();
        $price_details = Product::findOrFail($id);
        return view('dashboard.products.price.create',compact('id','store_name','price_details'));

    }//end get price function
    public function store_price(ProductPriceRequest $request)
    {
       // dd($request->all());
       try{
            $price = Product::where('id',$request->product_id)->update([//update($request->only(['price','special_price','special_price_type','special_price_start','special_price_end',]))
               //
                'price'=>$request->price,
                'special_price'=>$request->special_price,
                'special_price_type'=>$request->special_price_type,
                'special_price_start'=>$request->special_price_start,
                'special_price_end'=>$request->special_price_end,
            ]);
                return redirect()->route('admin.products')->with('success','price product updated succesfully');
       }//end try
       catch(\Exception $e)
       {
           return redirect()->back()->with($e);
           return redirect()->route('admin.products')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا ']);
       }
    }//end store price
    ///////////stock//////////
    public function get_stock($id)
    {
        $stock_details = Product::findOrFail($id);
        $store_name = $this->name_site();
        return view('dashboard.products.stock.create',compact('id','store_name','stock_details'));
    }//end form stock
    public function store_stock(ProductStockRequest $request)
    {
       // dd($request->all());
       $stock_product  = Product::whereId($request->product_id)->update($request->except(['_token','product_id'
        //    'sku'=>$request->sku,
        //    'manage_stock'=>$request->manage_stock,
        //    'in_stock'=>$request->in_stock,
        //    'qty'=>$request->qty,
       ]));
       return redirect()->back()->with(['success'=>'تم تحديث بيانات المستودع بنجاح']);
    }//end store in stock

    public function add_images($id)
    {
        $store_name = $this->name_site();
        return view('dashboard.products.images.create',compact('id','store_name'));
    }//end form images
    
    public function store_images(Request $request)
    {
       // return $request;
       $file = $request->file('dzfile');
       $photo =  $this->saveImage($file,'admin/images/products');

       return response()->json([
           'name' => $photo,
           'original_name' => $file->getClientOriginalExtension(),
       ]);


    }//end save immages only in folder

    public function store_images_db(ImageProductRequest $request)
    {
      //  dd($request->all());
    //    try{
            if($request->has('document') && count($request->document) > 0){
           foreach($request->document as $image){
           // return $image;
           
            ProductImage::create([
                'product_id'=>$request->product_id,
                'photo'=>$image,
            ]);
           }
        } //task ظهور الصور لو ليه صور 
        //زر حذف للصور
        //morf relation
        //edit for general product
            return redirect()->back()->with('success','تم اضافه الصور بنجاح');

    //    }//end try
    //    catch(\Exception $e)
    //    {
    //     return $e;
    //    }//end catch
    }
    
}//end class
