<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //==================LIST==============================================//	
    public function getList(){
      $slide = Slide::all(); 
      return view('admin.slide.list', ['slide' => $slide]);
    }
//==================EDIT==============================================//
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide' =>$slide]);
    }
    public function postEdit(Request $request, $id){
      $slide = Slide::find($id);
    	 $this->validate($request, 
        [  
          'name' => 'required',
          'NoiDung' => 'required',
        ], 
        [
          'name.required' => 'Please enter name',
          'NoiDung.required' => 'Please enter content',
        ]);
        $slide->Ten = $request->name;
        $slide->NoiDung = $request->NoiDung;
         $slide->link = $request->link;

        // Kiem tra co truyen hinh len k.
       if($request->hasFile('Hinh')){
            $file = $request->file("Hinh");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/slide/edit')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/slide/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/slide', $img);
            // Xoa hinh cu
            unlink('upload/slide/'.$slide->Hinh);
            $slide->Hinh = $img;
       }
       $slide->save();
       return redirect('admin/slide/edit/'.$id)->with('notification', 'Edited successfully');
    }
//==================DELETE==============================================//    
    public function getDelete($id){
    	$slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('notification', 'Deleted successfully');
    }
//==================ADD==============================================//
    public function getAdd(){
       $slide = Slide::all();
       return view('admin.slide.add', ['slide' => $slide]);
    }
    // nhận dl trả về và thêm vào csdl
    public function postAdd(Request $request){
       $this->validate($request, 
        [  
          'name' => 'required',
          'NoiDung' => 'required',
        ], 
        [
          'name.required' => 'Please enter name',
          'NoiDung.required' => 'Please enter content',
        ]);
       $slide = new Slide;
       $slide->Ten = $request->name;
       $slide->NoiDung = $request->NoiDung;
       //ktra link
       if($request->has('link')){
          $slide->link = $request->link;
       }
       // Kiem tra co truyen hinh len k.
       if($request->hasFile('Hinh')){
            $file = $request->file("Hinh");
            // Lay duoi file
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail !='png' && $tail != 'gif' && $tail != 'jpeg'){
                return redirect('admin/slide/add')->with('error', 'You have to choose jpg, png, gif, jpeg');
            }
            // ktra hinh da ton tai chua
            // lay ten hinh ra
            $img = $file->getClientOriginalName();
            // tao ten de k bi trung
            while (file_exists('upload/slide/'.$img)) {
                $img = $img.'('.str_random(1).')';
            }
            // luu hinh
            $file->move('upload/slide', $img);
            $slide->Hinh = $img;
       }else{
            $slide->Hinh = "";
       }
       $slide->save();
       return redirect('admin/slide/add')->with('notification', 'Add successfully');
    }
}
