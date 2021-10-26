<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 后台中间件
Route::get('admin/login','Admin\IndexController@login');//后台登入
Route::post('admin/dologin','Admin\IndexController@dologin');//后台登入处理

Route::group(['middleware' => 'login'],function(){
    //路由分组
    Route::prefix('admin')->group(function () {
        Route::get('index','Admin\IndexController@index');//后台首页
        Route::get('exit','Admin\IndexController@exit');//后台首页
//        Route::get('excel/{uid}','Admin\IndexController@excel');//excel列表
//        Route::get('user_list','Admin\IndexController@user_list');//excel列表
        Route::get('Rolling_Schedule/excel_derive','Admin\ScheduleController@excel_derive');//excel导出
        Route::get('Rolling_Schedule/{id}/particulars','Admin\ScheduleController@particulars');//详情
        Route::get('Rolling_Schedule/creates','Admin\ScheduleController@creates');//creates
        Route::get('Rolling_Schedule/del/{id}','Admin\ScheduleController@del');//del
        Route::post('Rolling_Schedule/creates_post','Admin\ScheduleController@creates_post');//creates_post
        Route::post('excel_post','Admin\IndexController@excel_post');//excel提交
        Route::resource('Create_Load','Admin\LoadController');//Load
        Route::resource('user','Admin\UserController');//user
        Route::resource('Rolling_Schedule','Admin\ScheduleController');//Schedule

        Route::resource('Producing_bundle','Admin\ProducingController');//Producing
        Route::get('Producing_bundle_excel_derive','Admin\ProducingController@excel_derive');//Producing
        Route::get('excel_log','Admin\IndexController@excel_log');//excel_log
        Route::get('excel_log/clearing','Admin\IndexController@excel_log_clearing');//excel_log
        Route::get('excel_log_derive','Admin\IndexController@excel_log_derive');//excel_log
        Route::get('excel_log_search','Admin\IndexController@excel_log_search');//excel_log




    });

});