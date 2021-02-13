<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\NameSite\NameTrait;//to application name
use App\Traits\Categories\PhotoTrait;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use DB;



class BrandsController extends Controller
{
    use NameTrait;//to name of site
    use PhotoTrait;
  

        public function index()
    {
        //
        $store_name = $this->name_site();
        $brands = Brand::orderBy('id','desc')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index',compact('brands','store_name'));
    }//end index function

        public function create()
    {
        //
        $store_name = $this->name_site();
        return view('dashboard.brands.create',compact('store_name'));
    }

    
    public function store(BrandRequest $request)
    {
      //  return $request->all();
        // validation done
        try{

            //validation 
            //update
            if(!$request->has('is_active'))            
            $request->request->add(['is_active'=>0]);
            else
            $request->request->add(['is_active'=>1]);

            if($request->has('photo')){
            $photo =  $this->saveImage($request->photo,'admin/images/brands');
            Brand::create(
               [
                'photo'=>$photo,
                'name'=>$request->name,
                'is_active'=>$request->is_active,
               ]
            );}
            else{
                
                Brand::create($request->all());}
            
            return redirect()->route('admin.brands')->with(['success'=>'تم الحفظ بنجاح']);
            }
            catch(\Exception $e)
            {
                return redirect()->route('admin.brands')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
            }
        

    }//end store function

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $store_name = $this->name_site();
        $brand = Brand::find($id);
        if(!$brand)
        {
            return redirect()->route('admin.brands')->with(['error'=>'هذه الماركه غير متوفره']);
        }
        return view('dashboard.brands.edit',compact('brand','store_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        try{

            //validation 
            //update
            if(!$request->has('is_active'))            
            $request->request->add(['is_active'=>0]);

            else
            $request->request->add(['is_active'=>1]);

            $brand = Brand::find($id);
            if(!$brand)//
            return redirect()->back()->with(['error'=>'هذا القسم غير موجود']);
            //$category->name = $category->name;
            //$category->slug = $category->slug;
            //$category->save();
            
            if($request->has('photo')){
            $photo =  $this->saveImage($request->photo,'admin/images/brands');
           $brand->update(
                [
                    'photo'=>$photo,
                    'name'=>$request->name,
                    'is_active'=>$request->is_active,
                ]);}
                else{
                $brand->update($request->all());}
            return redirect()->route('admin.brands')->with(['success'=>'تم التحديث بنجاح']);
            }
            catch(\Exception $e)
    {
        return redirect()->route('admin.brands')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }#end update function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        try{
        $brand = Brand::find($id);
        if(!$brand)
        {
            return redirect()->route('brand.index')->with(['error'=>'حدث خطا ما!']);
        }

        $brand->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
      
        }//end try
        catch(\Exception $e)
        {
            return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
        }//end catch

        }//end function destroy
}