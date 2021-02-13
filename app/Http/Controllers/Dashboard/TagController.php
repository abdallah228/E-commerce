<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Traits\NameSite\NameTrait;//to application name
use App\Http\Requests\TagRequest;


class TagController extends Controller
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
        $tags = Tag::all();
        return view('dashboard.tags.index',compact('tags','store_name'));
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
        return view('dashboard.tags.create',compact('store_name'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //validation
        try{
        $tags = Tag::create($request->all());
        return redirect()->route('admin.tags')->with(['success'=>'تمت اضافه العلامه التجاريه بنجاح']);
        }
        catch(\Exception $e)
        {
            return redirect()->route('admin.tags')->with(['error'=>'حدث خطا ما']);
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
        $tags = tag::find($id);
        if(!$tags)
        {
            return redirect()->route('tags.index')->with(['error'=>'حدث خطا ما']);
        }
        return view('dashboard.tags.edit',compact('tags','store_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request,$id)
    {
        //
        $tags = Tag::find($id);
        //return $tags;
        if(!$tags)
        {
            return redirect()->route('admin.tags')->with(['error'=>'حدث خطا ما برجاء المحاوله لاحقا']);
        }
            $tags->update($request->all());
            return redirect()->route('admin.tags')->with(['success'=>'تم تحديث العلامه التجاريه بنجاح']);
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
        $tags = Tag::find($id);
        if(!$tags)
        {
            return redirect()->route('admin.tags')->with(['error'=>'حدث خطا ما برجاء المحاوله فيما بعد']);
        }
        $tags->delete();
        return redirect()->route('admin.tags')->with(['error'=>'تمت عمليه الحذف بنجاح']);
    }
}
