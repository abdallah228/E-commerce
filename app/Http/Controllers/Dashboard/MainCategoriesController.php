<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\NameSite\NameTrait;
use App\Http\Requests\ MainCategoryRequest;


class MainCategoriesController extends Controller
{
    use NameTrait;//to name of site

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $store_name = $this->name_site();
        $categories = Category::where('parent_id',null)->paginate(PAGINATION_COUNT);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        $mainCategory = Category::find($id);
       // return $mainCategory;
        return view('dashboard.categories.edit',compact('mainCategory','store_name'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( MainCategoryRequest $request, $id)
    {
        //
        try{

                //validation 
                //update
                if(!$request->has('is_active'))
                
                    $request->request->add(['is_active'=>0]);
    
                else
                    $request->request->add(['is_active'=>1]);

                $category = Category::orderBy('id','DESC')->find($id);
                if(!$category)
                return redirect()->back()->with(['error'=>'هذا القسم غير موجود']);
                //$category->name = $category->name;
                //$category->slug = $category->slug;
                //$category->save();

                $category->update($request->all());
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
    public function destroy($id)
    {
        //
    }
}
