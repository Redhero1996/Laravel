<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "LoaiTin";
    // bang theloai
    public function theloai(){
    	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');
    }
    // bang tintuc
    public function tintuc(){
    	return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}
