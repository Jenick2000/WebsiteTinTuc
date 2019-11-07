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
use App\TheLoai;

Route::get('admin/login','usersController@getLoginAdmin');
Route::post('admin/login','usersController@postLoginAdmin');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin']], function () {
    // admin/theloai/add
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('add', 'theLoaiController@getadd');
        Route::get('list', 'theLoaiController@getlist');
        Route::get('edit/{id}', 'theLoaiController@getedit');
        Route::post('edit/{id}', 'theLoaiController@postedit');
        Route::post('add', 'theLoaiController@postadd');
        Route::get('delete/{id}', 'theLoaiController@getdelete');
    });
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('add', 'loaiTinController@getadd');
        Route::get('list', 'loaiTinController@getlist');
        Route::get('edit/{id}', 'loaiTinController@getedit');
        Route::post('edit/{id}', 'loaiTinController@postedit');
        Route::post('add', 'loaiTinController@postadd');
        Route::get('delete/{id}', 'loaiTinController@getdelete');
    });
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('add', 'tinTucController@getadd');
        Route::get('list', 'tinTucController@getlist');
        Route::get('edit/{id}', 'tinTucController@getedit');
        Route::post('edit/{id}', 'tinTucController@postedit');
        Route::post('add', 'tinTucController@postadd');
        Route::get('delete/{id}', 'tinTucController@getdelete');
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', 'ajaxController@getloaitin');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('delete/{idcomment}', 'commentController@getdelete');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('list','usersController@getlist');
        Route::get('add','usersController@getadd');
        Route::post('add','usersController@postadd');
        Route::get('edit/{id}','usersController@getedit');
        Route::post('edit/{id}','usersController@postedit');
        Route::get('delete/{id}', 'usersController@getdelete');
    });
    Route::get('logout/{id}', 'usersController@getLogoutAdmin');
});

// route trang tin tuc 
Route::get('/', 'pagesController@home');
Route::get('/contact', 'pagesController@contact');
Route::get('/about', 'pagesController@about');
Route::get('/category/{idtheloai}','pagesController@category');
Route::get('/type-news/{id}/{tenkhongdau}.html','pagesController@typeNews');
//ajax load more tin tuc
Route::get('tintuc/loadmore/{idLoaiTin}/{i}', 'ajaxController@getLoadMore');
//detail tin tuc
Route::get('news-detail/{id}/{tenkhongdau}.html','pagesController@newsDetail');
//ajax count visitor
Route::get('tintuc/visit-count/{id}', 'ajaxController@visitCount');
//dang nhap nguoi dung
Route::get('/login', 'pagesController@getLogin');
Route::post('/login', 'pagesController@postLogin');
Route::get('/logout', 'pagesController@getLogout');

// post comment
Route::post('/comment/post/{idTinTuc}', 'commentController@postComment');

// user page
Route::get('/user' ,'pagesController@getUser');
Route::post('/user' ,'pagesController@postUser');
Route::get('/signup' ,'pagesController@getSignup');
Route::post('/signup' ,'pagesController@postSignup');

 //search 
 Route::get('/search','pagesController@getSearch');   

   