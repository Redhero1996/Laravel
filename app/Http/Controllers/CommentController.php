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
  
//==================DELETE==============================================//    
    public function deleteComment($id){
    	$comment = Comment::find($id);
        $comment->delete();

        // return redirect('admin/tintuc/edit/'.$comment->idTinTuc)->with('notification', 'Deleted comment successfully');
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
    	
        echo '<div class="media">
                    <div class="glyphicon glyphicon-remove" style="float: right; color: gray"></div>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="'.$comment->user->avatar.'" alt="" name="img" style="width: 50px; height: 50px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">'.$comment->user->name.'
                            <small>'.$comment->created_at.'</small>
                        </h4>
                        <span>'.$comment->NoiDung.'</span>
                    </div>
            </div> ';
    }
}
