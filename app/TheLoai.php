<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "TheLoai";
    // liên kết bảng loaitin
    public function loaitin(){
    	return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');
    }
    // bang tintuc
    public function tintuc(){
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
