<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    // liên kết bảng tintuc
    public function tintuc(){
    	return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
    }
    // liên kết bảng User
    public function user(){
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
