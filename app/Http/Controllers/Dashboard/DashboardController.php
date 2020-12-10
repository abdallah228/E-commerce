<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\NameSite\NameTrait;

class DashboardController extends Controller
{
    use NameTrait;
    //
    public function index()
    {
       
        $store_name = $this->name_site();
    return view('dashboard.index',compact('store_name'));
}
}
