<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\NameSite\NameTrait;//to application name
use App\Http\Requests\ MainCategoryRequest;
use App\Traits\Categories\PhotoTrait;


class MainCategoriesController extends Controller
{
    use NameTrait;//to name of site
    use PhotoTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $store_name = $this->name_site();
        
        $categories = Category::with('_parent')->orderBy('id','desc')->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories','store_name'));
    }
    
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        $store_name = $this->name_site();
        $categories = Category::select('id','parent_id')->get();
        return view('dashboard.categories.create',compact('store_name','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request)
    {
        //
        try{

            //validation 
            //update
            if(!$request->has('is_active'))            
            $request->request->add(['is_active'=>0]);

            else
            $request->request->add(['is_active'=>1]);


            #####if user chooice main category it must remove parent-id from request
            if($request->type == 1)
            {
            $request->request->add(['parent_id'=> null ]);
            }
            else{
                $request->all();
            }
            //or
            //$request->except('parent_id');
            
            

            if($request->has('photo')){
            $photo =  $this->saveImage($request->photo,'admin/images/categories');
            Category::create(
               [
                'photo'=>$photo,
                'name'=>$request->name,
                'slug'=>$request->slug,
                'is_active'=>$request->is_active,
                'parent_id'=>$request->parent_id,
               ]
            );
        }
            return redirect()->route('admin.maincategories')->with(['success'=>'تم الحفظ بنجاح']);
            }

            catch(\Exception $e)
                {
        return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
                }
}

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
        $store_name = $this->name_site();
        $mainCategory = Category::find($id);
        $categories = Category::select('id','parent_id')->get();//sub categories
        if(!$mainCategory)
        return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما']);
       // $mainCategory->makeVisible(['translations']);//if i wanna show translations
       // return $mainCategory;
        return view('dashboard.categories.edit',compact('mainCategory','store_name','categories'));

    }

   
    public function update( MainCategoryRequest $request, $id)
    {
        //
         //
         
         try{
            if(!$request->has('is_active'))            
            $request->request->add(['is_active'=>0]);

            else
            $request->request->add(['is_active'=>1]);

            $category = Category::with('_parent')->find($id);
            if(!$category)//
            return redirect()->back()->with(['error'=>'هذا القسم غير موجود']);
            //$category->name = $category->name;
            //$category->slug = $category->slug;
            //$category->save();
            
            if($request->has('photo')){
            $photo =  $this->saveImage($request->photo,'admin/images/categories');
           $category->update(
                [
                    'photo'=>$photo,
                    'name'=>$request->name,
                    'slug'=>$request->slug,
                    'is_active'=>$request->is_active,
                    'parent_id'=>$request->parent_id,
                    
                ]);
            }
            return redirect()->route('admin.maincategories')->with(['success'=>'تم التحديث بنجاح']);
            }
            catch(\Exception $e)
    {
        return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }

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
        $mainCategory = Category::find($id);
        if(!$mainCategory)
        return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما']);

        $mainCategory->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
        }
        catch(\Exception $e)
        {
            return redirect()->route('admin.maincategories')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}
