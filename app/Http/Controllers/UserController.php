<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;

class UserController extends Controller
{
    //==================LIST==============================================//	
    public function getList(){
      $user = User::all();
      return view('admin.user.list', ['user' => $user]);
    }
//==================EDIT==============================================//
    public function getEdit($id){
       $user = User::find($id);
       return view('admin.user.edit', ['user' => $user]);
    }
    public function postEdit(Request $request, $id){
      $user = User::find($id);
       $this->validate($request, 
        [ 
          'name' =>'required',
        ], [
          'name.required' => 'Please enter name',
        ]);
      $user->name = $request->name;
      $user->quyen = $request->quyen;

      // kiem tra password
      if($request->changePassword == 'on'){
         $this->validate($request, 
        [ 
          'password' => 'required|min:6',
          'passwordAgain' => 'required|same:password'
        ], [
          'password.required' => 'Please enter password',
          'password.min' => 'The lenght less 6 char',
          'passwordAgain.required' => 'Please enter password',
          'passwordAgain.same' => 'Not right password. Please try again!'
       ]);
          $user->password = bcrypt($request->password);
      }
      if($request->hasFile('image')){
            $file = $request->file("image");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/user/edit')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
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
          //  unlink('upload/users/'.$user->image);
            $user->image = $img;
       }
      $user->save();
      return redirect('admin/user/edit/'.$id)->with('notification', 'Add user successfully');
    }
//==================DELETE==============================================//    
    public function getDelete($id){
    	$user = User::find($id);
      $comment = Comment::where('idUser',$id); //Tìm các comment của user
      $comment->delete(); //Xóa các comment của user
      $user->delete();
      return redirect('admin/user/list')->with('notification', 'Deleted user successfully');
    }
//==================ADD==============================================//
    public function getAdd(){
      $user = User::all();
      return view('admin.user.add', ['user' => $user]);
    }
    // nhận dl trả về và thêm vào csdl
    public function postAdd(Request $request){
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
      $user->quyen = $request->quyen;
       // Kiem tra co truyen hinh len k.
       if($request->hasFile('image')){
            $file = $request->file("image");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/user/add')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
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
      return redirect('admin/user/add')->with('notification', 'Add user successfully');
    }

 //==================LOG IN==============================================//  
  public function getLoginAdmin(){
    return view('admin.login');
  } 

  public function postLoginAdmin(Request $request){
      $this->validate($request, [
        'email' => 'required',
        'password' => 'required|min:6',
      ], [
        'email.required' => 'Please enter email',
        'password.required' => 'Please enter password',
        'password.min' => 'the lenght less 6 char',
      ]);

      // Ktra dang nhap đã tồn tại chưa
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        // dang nhap thanh cong
        return redirect('admin/theloai/list');
      }else{
        return redirect('admin/login')->with('notification', 'Login fail');
      }
  }

  //==================LOG OUT==============================================//  
    public function getLogoutAdmin(){
      Auth::logout();
      return redirect('admin/login');
    }
}
