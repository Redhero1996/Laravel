<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use App\Comment;
use App\TinTuc;

class CommentController extends Controller
{
  
//==================DELETE==============================================//    
    public function getDelete($id){
    	$comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/edit/'.$comment->idTinTuc)->with('notification', 'Deleted comment successfully');
    }	
    // add comment
    public function postComment($id, Request $request){
    	$idTinTuc = $id;
    	$tintuc = TinTuc::find($id);
    	$comment = new Comment;
    	$comment->idTinTuc = $idTinTuc;	
    	$comment->idUser = Auth::user()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();
    	return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html");
    }
}
