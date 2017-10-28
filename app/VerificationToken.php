<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
	protected $table = "verification_tokens";

    // public function user(){
    // 	return $this->belongsTo(User::class);
    // }

    //We will use the token  field rather than the id  field to do an implicit model binding when we fetch the token from the link.
    public function getRouteKeyName(){
    	return 'token';
    }
}
