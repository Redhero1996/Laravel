<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
    	// in ds cac loaitin co idTheLoai
    	$loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
    	foreach ($loaitin as $lt) {
    		echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
    	}
    }
}
