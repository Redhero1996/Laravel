<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use Validator;
use App\User;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;

// Quản lý các trang trong pages
class PagesController extends Controller
{
	function __construct(){
  // $this->middleware('auth');
    
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);

	}
	// truyền các thể loại sang
    function homepage()
    {
    	return view('pages.homepage');
    }
    // trang contact
    function contact()
    {
    	return view('pages.contact');
    }
    // trang loai tin
    function loaitin($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
    	return view('pages.loaitin', ['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }
    // trang tin tuc
    function tintuc($id){
    	$tintuc = TinTuc::find($id);
    	$tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
    	// tìm các tin tức có idLoaiTin bằng vs tintuc->idLoaiTin đã tìm
    	$tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
    	return view('pages.tintuc', ['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat, 'tinlienquan' => $tinlienquan]);
    }
    // Dang nhap
    function getLogin(){
    	return view('auth.login');
    }
    function postLogin(Request $request){
      // Cach 1:
    	$this->validate($request, [
	        'email' => 'required',
	        'password' => 'required|min:6',
	      ], [
	        'email.required' => 'The email field is required.',
	        'password.required' => 'The password field is required.',
	        'password.min' => 'The password must be at least 6 characters.',
	      ]);

      // Cach 2:
      // $rules = [
      //     'email' => 'required',
      //     'password' => 'required|min:6',
      // ];
      // $validator = Validator::make($request->all(), $rules);
      // if($validator->fails()){
      //   return redirect()->back()->withErrors($validator)->withInput();
      // }else{

           // Ktra dang nhap đã tồn tại chưa
          if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember_token'))){
            // dang nhap thanh cong
            return redirect('homepage');
          }else{
            return redirect('login')->withInput()->with('notification', 'Incorrect email or password');
          }
     // }

    	
    }
    // Tai khoan nguoi dung
    function getUser(){
    	return view('pages.users');
    }
    function postUser(Request $request){
    	$user = Auth::user();
       $this->validate($request, 
        [ 
          'name' =>'required',
        ], [
          'name.required' => 'Please enter name',
        ]);
      $user->name = $request->name;

      // kiem tra password
      if($request->changePassword == 'on'){
         $this->validate($request, 
        [ 
          'password' => 'required|min:6',
          'passwordAgain' => 'required|same:password'
        ], [
          'password.required' => 'The password field is required',
          'password.min' => 'The password must be at least 6 characters',
          'passwordAgain.required' => 'The password field is required',
          'passwordAgain.same' => 'Not right password. Please try again!'
       ]);
          $user->password = bcrypt($request->password);
      }
       if($request->hasFile('image')){
            $file = $request->file("image");
            // Lay duoi file
           // $tail = $file->getClientOriginalExtension();
            // if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
            //     return redirect('user')->with('error', 'You have to choose jpg, png, gif, jpeg');
            // }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/users/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/users', $img);
           // Xoa hinh cu
           unlink('upload/users/'.$user->image);
            $user->image = $img;
       }
      $user->save();
      return redirect('user')->with('notification', 'Edit successfully');
    }

    // Sign up
    function getSignup(){
    	return view('auth.signup');
    }
    function postSignup(Request $request){
         $this->validate($request, 
        [ 
          'name' =>'required',
          'email' => 'required|unique:users,email|email',
          'password' => 'required|min:6',
          'passwordAgain' => 'required|same:password'
        ], [
          'name.required' => 'Please enter name',
          'email.required' => 'Please enter email',
          'email.unique' => 'Email already existed',
          'email.email' => 'Not right email',
          'password.required' => 'Please enter password',
          'password.min' => 'The lenght less 6 char',
          'passwordAgain.required' => 'Please enter password',
          'passwordAgain.same' => 'Not right password. Please try again!'
        ]);
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->quyen = 0;
       // Kiem tra co truyen hinh len k.
       if($request->hasFile('image')){
            $file = $request->file("image");
            // Lay duoi file
            // $tail = $file->getClientOriginalExtension();
            // if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
            //     return redirect('signup')->with('error', 'You have to choose jpg, png, gif, jpeg');
            // }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/users/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/users', $img);
            $user->image = $img;
       }else{
            $user->image = "";
       }
      $user->save();
      return redirect('login')->with('created', 'Created successfully');
    }

    //Search
    function search(Request $request){
      $keyword = $request->keyword;
      // tim theo tieude, tomtat, noidung
      $tintuc = TinTuc::where('TieuDe', 'like', "%$keyword%")->orwhere('TomTat', 'like', "%$keyword%")->orwhere('NoiDung', 'like', "%$keyword%")->take(30)->paginate(5);
      return view('pages.search', ['tintuc' => $tintuc, 'keyword' => $keyword]);
    }

    // About
    function about(){
      return view('pages.about');
    }

    // logout
    function logout(){
    	Auth::logout();
    	return redirect('homepage');
    }
}
