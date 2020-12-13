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

Route::group(//for package mcamara localization
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
route::group(['prefix'=>'admin','namespace'=>'Dashboard','middleware'=>'auth:admin'],function(){

    //logout admin
    route::get('/logout','LoginController@logout')->name('admin.logout');
    //dashboard
    route::get('/','DashboardController@index')->name('admin.dashboard');
    route::group(['prefix'=>'settings'],function(){
    route::get('/shipping-method/{type}','SettingsController@edit_shipping')->name('setting.shipping.method');
    route::put('/shipping-method/{id}','SettingsController@update_shipping')->name('setting.update');
    });

        //profile admin
        route::group(['prefix'=>'profile'],function(){
            route::get('/edit','ProfileController@edit')->name('profile.edit');
            route::put('/update','ProfileController@update')->name('profile.update');

        });

        ///////////////////////////////Categories Route///////////////////////////
    route::group(['prefix'=>'main-categories'],function(){
        route::get('/','MainCategoriesController@index')->name('admin.maincategories');
        route::get('/create','MainCategoriesController@create')->name('admin.maincategories.create');
        route::post('/store','MainCategoriesController@store')->name('admin.maincategories.store');
        route::get('/edit/{id}','MainCategoriesController@edit')->name('admin.maincategories.edit');
        route::post('update/{id}','MainCategoriesController@update')->name('admin.maincategories.update');
        route::get('/delete/{id}','MainCategoriesController@delete')->name('admin.maincategories.delete');


    });


});

route::group(['prefix'=>'admin','namespace'=>'Dashboard','middleware'=>'guest:admin'],function(){

    route::get('/login','LoginController@get_login')->name('admin.login');
    route::post('/login','LoginController@post_login')->name('admin.post.login');
    
    });
});
   


