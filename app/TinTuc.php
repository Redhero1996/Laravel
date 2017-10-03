<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "TinTuc";
    // bang loaitin
    public function loaitin(){
    	return $this->belongsTo('App\LoaiTin', 'idLoaiTin', 'id');
    }
   	// tu loai tin co the chuyen sang theloai nen k can khai bao theloai nua

   	// bang comment
   	public function comment(){
   		return $this->hasMany('App\Comment', 'idTinTuc', 'id');
   	}
}
