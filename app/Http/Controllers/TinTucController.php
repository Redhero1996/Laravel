<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;

class TinTucController extends Controller
{
    //==================LIST==============================================//	
    public function getList(){
    	$tintuc = TinTuc::all();
    	return view('admin.tintuc.list', ['tintuc' => $tintuc]);
    }
//==================EDIT==============================================//
    public function getEdit($id){
         $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.edit', ['tintuc' => $tintuc, 'theloai'=>$theloai, 'loaitin' =>$loaitin]);
    }
    public function postEdit(Request $request, $id){
    	$tintuc = TinTuc::find($id);
         $this->validate($request, 
        [
            'LoaiTin' =>'required',
            'TieuDe' => 'required|min:3|unique:TinTuc,TieuDe',
            'TomTat' => 'required',
            'NoiDung' => 'required'
        ], 
        [
            'LoaiTin.required' => 'Please enter Product',
            'TieuDe.required' => 'Please enter title',
            'TieuDe.min' => 'the lenght less 3 char',
            'TieuDe.unique' => 'Title already existed',
            'TomTat.required' => 'Please enter summary',
            'NoiDung.required' => 'Please enter content'
        ]);
       $tintuc->TieuDe = $request->TieuDe;
       $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
       $tintuc->idLoaiTin = $request->LoaiTin;
       $tintuc->TomTat = $request->TomTat;
       $tintuc->NoiDung = $request->NoiDung;

       // Kiem tra co truyen hinh len k.
       if($request->hasFile('Hinh')){
            $file = $request->file("Hinh");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/tintuc/edit')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/tintuc/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/tintuc', $img);
            // Xoa hinh cu
            unlink('upload/tintuc/'.$tintuc->Hinh);
            $tintuc->Hinh = $img;
       }
       $tintuc->save();
       return redirect('admin/tintuc/edit/'.$id)->with('notification', ' Edit successfully');

    }
//==================DELETE==============================================//    
    public function getDelete($id){
    	$tintuc = TinTuc::find($id);
      $comment = Comment::where('idTinTuc', $id);
      $comment->delete();
      $tintuc->delete();
      return redirect('admin/tintuc/list')->with('notification', 'Deleted successfully');
    }
//==================ADD==============================================//
    public function getAdd(){
        // Truyền ds thể loại sang trang Add
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin.tintuc.add', ['theloai' => $theloai, 'loaitin' => $loaitin]);
    }
    // nhận dl trả về và thêm vào csdl
    public function postAdd(Request $request){
       $this->validate($request, 
        [
            'LoaiTin' =>'required',
            'TieuDe' => 'required|min:3|unique:TinTuc,TieuDe',
            'TomTat' => 'required',
            'NoiDung' => 'required'
        ], 
        [
            'LoaiTin.required' => 'Please enter Product',
            'TieuDe.required' => 'Please enter title',
            'TieuDe.min' => 'the lenght less 3 char',
            'TieuDe.unique' => 'Title already existed',
            'TomTat.required' => 'Please enter summary',
            'NoiDung.required' => 'Please enter content'
        ]);
       $tintuc = new TinTuc;
       $tintuc->TieuDe = $request->TieuDe;
       $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
       $tintuc->idLoaiTin = $request->LoaiTin;
       $tintuc->TomTat = $request->TomTat;
       $tintuc->NoiDung = $request->NoiDung;
       $tintuc->SoLuotXem = 0;

       // Kiem tra co truyen hinh len k.
       if($request->hasFile('Hinh')){
          // Lấy file ra
            $file = $request->file("Hinh");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/tintuc/add')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/tintuc/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/tintuc', $img);
            $tintuc->Hinh = $img;
       }else{
            $tintuc->Hinh = "";
       }
       $tintuc->save();
       return redirect('admin/tintuc/add')->with('notification', ' Add successfully');
    }
}
