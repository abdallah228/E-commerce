<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::group(['prefix'=>'admin','namespace'=>'Dashboard','middleware'=>'auth:admin'],function(){


    route::get('/','DashboardController@index')->name('admin.dashboard');

});

route::group(['prefix'=>'admin','namespace'=>'Dashboard','middleware'=>'guest:admin'],function(){

    route::get('/login','LoginController@get_login')->name('admin.login');
    route::post('/login','LoginController@post_login')->name('admin.post.login');
    
    });
   

