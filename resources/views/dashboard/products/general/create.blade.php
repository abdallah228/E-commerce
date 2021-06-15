@extends('layouts.admin')
@section('title')
المنتــــجات
@endsection
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.products')}}"> المنتــــجات  </a>
                                </li>
                                <li class="breadcrumb-item active"> اضافه منتج
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> اضافه منتج جديد </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.include.alert.success')
                                @include('dashboard.include.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.products.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات المنتج </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم المنتج
                                                               </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  " name="name"
                                                                   value="{{old('name')}}"
                                                                   >
                                                            @error("name")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم بالرابط
                                                               </label>
                                                            <input type="text" id="slug"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('slug')}}"
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> وصف المنتج
                                                               </label>
                                                            <textarea id="description"
                                                                   class="form-control"
                                                                    name="description"
                                                                   value=""
                                                                   >  {{old('description')}}</textarea>
                                                            @error("description")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الوصف المختصر
                                                               </label>
                                                            <textarea id="short_description"
                                                                   class="form-control"
                                                                   name="slug">{{old('short_description')}} </textarea>
                                                            @error("short_description")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>




                                            <div class="row " id="cats_list">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label>اختر القسم </label>
                                                    <select name="categories[]" class="select2 form-control" multiple>
                                                    <optgroup label="من فضلك اختر القسم" >
                                                    @if($categories && $categories->count() > 0)
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                    @endif
                                                    </optgroup>
                                                        </select>
                                                        @error('categories')
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label>اختر العلامه التجاريه</label>
                                                    <select name="tags[]" class="select2 form-control" multiple>
                                                    <optgroup label="من فضلك اختر العلامه التجاريه" >
                                                    @if($tags && $tags->count() > 0)
                                                    @foreach($tags as $tags)
                                                    <option value="{{$tags->id}}">{{$tags->name}}</option>
                                                    @endforeach
                                                    @endif
                                                    </optgroup>
                                                        </select>
                                                        @error('tags')
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                            </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label>اختر الماركه التجاريه</label>
                                                    <select name="brand_id" class="select2 form-control" >
                                                    <optgroup label="من فضلك اختر الماركه التجاريه" >
                                                    @if($brands && $brands->count() > 0)
                                                    @foreach($brands as $brands)
                                                    <option value="{{$brands->id}}">{{$brands->name}}</option>
                                                    @endforeach
                                                    @endif
                                                    </optgroup>
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value=""
                                                                   name="is_active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحاله
                                                            </label>

                                                            @error("is_active")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
