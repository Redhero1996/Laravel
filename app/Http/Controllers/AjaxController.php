<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use App\LoaiTin;
use App\TheLoai;
use App\User;
use App\Comment;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
    	// in ds cac loaitin co idTheLoai
    	$loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
    	foreach ($loaitin as $lt) {
    		echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
    	}
    }

    public function getComment()
}
