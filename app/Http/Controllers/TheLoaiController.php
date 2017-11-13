<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;

class TheLoaiController extends Controller
{
//==================LIST==============================================//	
    public function getList(){
    	$theloai = TheLoai::all();
    //	$theloai = DB::table('TheLoai')->orderBy('id', 'desc')->get();
    	return view('admin.theloai.list', ['theloai' => $theloai]);
    }
//==================EDIT==============================================//
    public function getEdit($id){
    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.edit', ['theloai' => $theloai]);
    }
    public function postEdit(Request $request, $id){
    	$theloai = TheLoai::find($id);
    	$this->validate($request, 
    		[
    			// unique: ktra dk trùng
    			'name' => 'required|unique:TheLoai,Ten|min:3|max:100',
    		], 
    		[	
    			'name.required' => 'Please, enter name',
    			'name.unique' => 'Name already exists',
	    		'name.min' => 'the length to 3 char from 100 char',
	    		'name.max' => 'the length to 3 char from 100 char',
    		]);
    	$theloai->Ten = $request->name;
    	$theloai->TenKhongDau = changeTitle($request->name);
    	$theloai->save();
    	return redirect('admin/theloai/edit/'.$id)->with('notification', 'Edit successfully');
    }
//==================DELETE==============================================//    
    public function getDelete($id){
    	$theloai = TheLoai::find($id);
        $loaitin = LoaiTin::where('idTheLoai', $id);
        $tintuc = TinTuc::where('idLoaiTin', $loaitin);
       // dd($theloai, $loaitin, $tintuc);
       
        $tintuc->delete();
        $loaitin->delete();
    	$theloai->delete();
    
    	return redirect('admin/theloai/list')->with('notification', 'Deleted was success');
    }
//==================ADD==============================================//
    public function getAdd(){
    	return view('admin.theloai.add');
    }
    // nhận dl trả về và thêm vào csdl
    public function postAdd(Request $request){

    	$this->validate($request, 
    		[
    			// dkien bắt lỗi
    			'name' => 'required|unique:TheLoai,Ten|min:3|max:100',
    		], 
	    	[
	    		// hiển thị thông báo lỗi
	    		'name.required' => 'Please, enter name',
	    		'name.unique' => 'Name already exists',		
	    		'name.min' => 'the length to 3 char from 100 char',
	    		'name.max' => 'the length to 3 char from 100 char',
	    	]);
    	// lưu dl
    	$theloai = new TheLoai;
    	$theloai->Ten = $request->name;
    	// đổi sang tên k dấu
    	$theloai->TenKhongDau = changeTitle($request->name);
    	// lưu lại
    	$theloai->save();
    	return redirect('admin/theloai/add')->with('notification', 'Add successfully');
    }
}
