<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//首页信息
Route::get('/index','FrontController@index');
Route::get('/','FrontController@index');

//查看文章
Route::get('/article/query/{id}','FrontController@query');

//填写申报人信息
Route::get('/applicant/create','ApplicantController@create');
Route::post('/applicant/store','ApplicantController@store');
//添加伙伴信息
Route::post('/partner/store','ApplicantController@partnerStore');
Route::get('/partner/add','ApplicantController@addPartner');
//填写作品信息
Route::get('/work/create/{id}','WorkController@create');
//存储作品信息
Route::post('/work/store','WorkController@store');
//存储信息成功后的视图
Route::get('/work/storeSuccess','WorkController@storeSuccess');

//查询作品状态
Route::get('/query/status','WorkController@queryStatus');


//设置管理员
Route::get('/admin/setAdmin','AdminController@setAdmin');
//添加管理员
Route::post('/admin/addAdmin','AdminController@addAdmin');


//判断用户权限
Route::get('/admin/judge','AdminController@judge');

//使用中间件对权限进行判断
Route::group(['middleware'=>'schoolAdminJudge'],function(){
    //学校管理后台
    Route::get('/admin/schoolIndex','SchoolAdminController@index');
    //待审核作品
    Route::get('/admin/schoolWait','SchoolAdminController@wait');
    //已通过作品
    Route::get('/admin/schoolPass','SchoolAdminController@pass');
//待修改作品
    Route::get('/admin/schoolAlter','SchoolAdminController@alter');
//未通过作品
    Route::get('/admin/schoolNot','SchoolAdminController@not');
//查看某个作品详情
    Route::get('admin/schoolQuery/{id}','SchoolAdminController@query');
//设置作品状态
    Route::post('admin/schoolSetStatus','SchoolAdminController@setStatus');
//上报作品
    Route::get('admin/schoolUp','SchoolAdminController@up');
//上报作品时，修改状态
    Route::get('admin/schoolUpStore','SchoolAdminController@upStore');
});


Route::group(['middleware'=>'ProvinceAdminJudge'],function(){
    //省管理后台
    Route::get('/admin/provinceIndex','ProvinceAdminController@index');
//待审核项目
    Route::get('/admin/provinceWait','ProvinceAdminController@wait');
//已通过项目
    Route::get('/admin/provincePass','ProvinceAdminController@pass');
//待修改项目
    Route::get('/admin/provinceAlter','ProvinceAdminController@alter');
//未通过项目
    Route::get('/admin/provinceNot','ProvinceAdminController@not');
//发布文章
    Route::get('/admin/newArticle','ProvinceAdminController@newArticle');
//存储文章
    Route::post('admin/articleStore','ProvinceAdminController@articleStore');
//存储文章成功
    Route::get('/admin/articleSuccess','ProvinceAdminController@articleStoreSuccess');
//专家添加
    Route::get('/admin/addSpecialist','ProvinceAdminController@addSpecialist');
//存储专家
    Route::post('/admin/storeSpecialist','ProvinceAdminController@storeSpecialist');
//存储专家成功
    Route::get('/admin/storeSpecialistSuccess','ProvinceAdminController@storeSpecialistSuccess');
//专家信息统计
    Route::get('/admin/specialistStatistics','ProvinceAdminController@specialistStatistics');
//发送内部通知
    Route::get('admin/sendInformation','ProvinceAdminController@sendInformation');
    Route::post('admin/storeInformation','ProvinceAdminController@storeInformation');
    Route::get('admin/successSend','ProvinceAdminController@successSend');
});





// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');