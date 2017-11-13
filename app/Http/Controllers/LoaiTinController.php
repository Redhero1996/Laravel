<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;


class LoaiTinController extends Controller
{
    //==================LIST==============================================//	
    public function getList(){
    	$loaitin = LoaiTin::orderBy('id', 'DESC')->get();
    //	$theloai = DB::table('TheLoai')->orderBy('id', 'desc')->get();
    	return view('admin.loaitin.list', ['loaitin' => $loaitin]);
    }
//==================EDIT==============================================//
    public function getEdit($id){
        $theloai = TheLoai::all();
    	$loaitin = LoaiTin::find($id);
        return view('admin.loaitin.edit', ['loaitin' => $loaitin, 'theloai' =>$theloai]);
    }
    public function postEdit(Request $request, $id){
    	 $this->validate($request, 
            [
                'name' => 'required|unique:LoaiTin,Ten|min:3|max:100',
                'TheLoai' => 'required',
            ], 
            [
                'name.required' => 'Please, enter name',
                'name.unique' => 'Name already exists',
                'name.min' => 'the length to 3 char from 100 char',
                'name.max' => 'the length to 3 char from 100 char',
                'TheLoai.required' => "You haven't selected a category yet",
            ]);
         $loaitin = LoaiTin::find($id);
         $loaitin->Ten = $request->name;
         $loaitin->TenKhongDau = changeTitle($request->name);
         $loaitin->idTheLoai = $request->TheLoai;
         $loaitin->save();
         return redirect('admin/loaitin/edit/'.$id)->with('notification', ' Edit successfully');
    }
//==================DELETE==============================================//    
    public function getDelete($id){
    	$loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id);
        // dd($tintuc, $loaitin);
        $tintuc->delete();
        $loaitin->delete();
        return redirect('admin/loaitin/list')->with('notification', 'Deleted was success');
    }
//==================ADD==============================================//
    public function getAdd(){
        // Truyền ds thể loại sang trang Add
        $theloai = TheLoai::all();
    	return view('admin.loaitin.add', ['theloai' => $theloai]);
    }
    // nhận dl trả về và thêm vào csdl
    public function postAdd(Request $request){
        $this->validate($request, 
            [
                'name' => 'required|unique:LoaiTin,Ten|min:3|max:100',
                'TheLoai' => 'required',
            ], 
            [
                'name.required' => 'Please, enter name',
                'name.unique' => 'Name already exists',
                'name.min' => 'the length to 3 char from 100 char',
                'name.max' => 'the length to 3 char from 100 char',
                'TheLoai.required' => "You haven't selected a category yet",
            ]);
    	$loaitin = new LoaiTin;
        $loaitin->Ten = $request->name;
        $loaitin->TenKhongDau = changeTitle($request->name);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/add')->with('notification', 'Add successfully');
    }
}
