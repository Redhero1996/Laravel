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
    	// App\TinTuc: model cuối, 
    	// App\LoaiTin: model trung gian,
    	// idTheLoai: khóa ngoại trên model trung gian
    	// idLoaiTin: khóa ngoại trên model cuối
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
