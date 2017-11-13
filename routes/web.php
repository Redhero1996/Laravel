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

//======================= SERVER SIDE ==============================================//
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

	Route::group(['prefix' => 'ajax'], function(){
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
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

	

	// admin/comment/
	Route::group(['prefix' => 'comment'], function(){
		// Delete
		Route::get('delete/{id}', 'CommentController@getDelete');
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

//========================= CLIENT SIDE ===================================================//

// homepage
Route::get('homepage', 'PagesController@homepage');
// contact
Route::get('contact', 'PagesController@contact');
// loai tin
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
// tin tuc
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');
// Log in
Route::get('login', 'Auth\LoginController@getLogin');
Route::post('login', 'Auth\LoginController@postLogin');

Route::get('/login/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\SocialController@handleProviderCallback');
// sign up
Route::get('register', 'PagesController@getSignup');
Route::post('register', 'PagesController@postSignup');
// logout
Route::get('logout', 'PagesController@logout');
// account users
Route::get('user/{id}','PagesController@getUser');
Route::post('user/{id}', 'PagesController@postUser');
// Comment
Route::post('comment/{tintuc_id}', 'CommentController@postComment');
Route::post('tintuc/{tintuc_id}/comment/{comment_id}', 'CommentController@deleteComment');
// Search
Route::get('search', 'PagesController@Search');
// About
Route::get('about', 'PagesController@about');

// ======================Ajax================================//


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Reset password
Route::group(['middleware' => 'web'], function(){
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
