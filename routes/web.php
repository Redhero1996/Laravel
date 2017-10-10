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

Route::get('/', function () {
    return view('welcome');
});

//=======================SIDE SERVER==============================================//
// Login
Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');

// logout
Route::get('admin/logout', 'UserController@getLogoutAdmin');


// Tạo group admin
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function(){
	// admin/theloai/
	Route::group(['prefix' => 'theloai'], function(){
		// Chuyển đến trang danh sách
		Route::get('list', 'TheLoaiController@getList');
		// Chuyển đến trang sửa
		Route::get('edit/{id}', 'TheLoaiController@getEdit');
		Route::post('edit/{id}', 'TheLoaiController@postEdit');
		// Chuyển đến trang thêm
		Route::get('add', 'TheLoaiController@getAdd'); // gọi trang add lên
		Route::post('add', 'TheLoaiController@postAdd'); // send dl lên server
		// Delete
		Route::get('delete/{id}', 'TheLoaiController@getDelete');
	});

	// admin/loaitin/
	Route::group(['prefix' => 'loaitin'], function(){
		// Chuyển đến trang danh sách
		Route::get('list', 'LoaiTinController@getList');
		// Chuyển đến trang sửa
		Route::get('edit/{id}', 'LoaiTinController@getEdit');
		Route::post('edit/{id}', 'LoaiTinController@postEdit');
		// Chuyển đến trang thêm
		Route::get('add', 'LoaiTinController@getAdd');
		Route::post('add', 'LoaiTinController@postAdd');
		// Delete
		Route::get('delete/{id}', 'LoaiTinController@getDelete');
	});

	// admin/tintuc/
	Route::group(['prefix' => 'tintuc'], function(){
		// Chuyển đến trang danh sách
		Route::get('list', 'TinTucController@getList');
		// Chuyển đến trang sửa
		Route::get('edit/{id}', 'TinTucController@getEdit');
		Route::post('edit/{id}', 'TinTucController@postEdit');
		// Chuyển đến trang thêm
		Route::get('add', 'TinTucController@getAdd');
		Route::post('add', 'TinTucController@postAdd');
		// Delete
		Route::get('delete/{id}', 'TinTucController@getDelete');
	});

	Route::group(['prefix' => 'ajax'], function(){
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
	});

	// admin/comment/
	Route::group(['prefix' => 'comment'], function(){
		// Delete
		Route::get('delete/{id}/{idTinTucs}', 'CommentController@getDelete');
	});

	// admin/slide/
	Route::group(['prefix' => 'slide'], function(){
		// Chuyển đến trang danh sách
		Route::get('list', 'SlideController@getList');
		// Chuyển đến trang sửa
		Route::get('edit/{id}', 'SlideController@getEdit');
		Route::post('edit/{id}', 'SlideController@postEdit');
		// Chuyển đến trang thêm
		Route::get('add', 'SlideController@getAdd');
		Route::post('add', 'SlideController@postAdd');
		// Delete
		Route::get('delete/{id}', 'SlideController@getDelete');
	});

	// admin/user/
	Route::group(['prefix' => 'user'], function(){
		// Chuyển đến trang danh sách
		Route::get('list', 'UserController@getList');
		// Chuyển đến trang sửa
		Route::get('edit/{id}', 'UserController@getEdit');
		Route::post('edit/{id}', 'UserController@postEdit');
		// Chuyển đến trang thêm
		Route::get('add', 'UserController@getAdd');
		Route::post('add', 'UserController@postAdd');
		// Delete
		Route::get('delete/{id}', 'UserController@getDelete');
	});
});

//========================SIDE CLIENT===================================================//

// homepage
Route::get('homepage', 'PagesController@homepage');
// contact
Route::get('contact', 'PagesController@contact');
// loai tin
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
// tin tuc
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');
// Log in
Route::get('login', 'PagesController@getLogin');
Route::post('login', 'PagesController@postLogin');

Route::get('/login/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\SocialController@handleProviderCallback');
// sign up
Route::get('register', 'PagesController@getSignup');
Route::post('register', 'PagesController@postSignup');
// logout
Route::get('logout', 'PagesController@logout');
// account users
Route::get('user','PagesController@getUser');
Route::post('user', 'PagesController@postUser');
// Comment
Route::post('comment/{id}', 'CommentController@postComment');
// Search
Route::post('search', 'PagesController@search');
// About
Route::get('about', 'PagesController@about');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
