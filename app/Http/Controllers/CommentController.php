<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use App\Comment;
use App\TinTuc;


class CommentController extends Controller
{
    public function __construct()
    {
        
    }
    public function getDelete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/edit/'.$comment->idTinTuc);
    }
//==================DELETE==============================================//    
    public function deleteComment(Request $request, $tintuc_id, $comment_id){
     
    	$comment = Comment::findOrFail($comment_id);
        // if($request->ajax()){
            $comment->delete();
            $count = Comment::where('idTinTuc', $tintuc_id)->count();
             return ['comment' =>$comment, 'count' => $count];
        // }
        
      

        // return redirect('admin/tintuc/edit/'.$comment->idTinTuc)->with('notification', 'Deleted comment successfully');
    }	
    // add comment
    public function postComment(Request $request, $tintuc_id){
        // $request->noiDung

            $comment = new Comment;
            $comment->idTinTuc = $tintuc_id;   
            $comment->idUser = Auth::user()->id;
            $comment->NoiDung = $request->noiDung;
            // $comment->created_at = $request->created_at;
            $comment->TinTuc()->associate($tintuc_id);
            $comment->save();
            $count = Comment::where('idTinTuc', $tintuc_id)->count();
            // dump($count);
            return ['comment' =>$comment, 'count' => $count];
        // 
        // return $request->noiDung;
    	
    }
}
