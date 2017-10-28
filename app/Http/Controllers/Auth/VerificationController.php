<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
	// receive an instance of VerificationToken  model (we will use route binding for this). The actual verification using the token will be done here.
    public function verify(VerificationToken $token){

    }

    // The resend()  method will be used to resend the verification link to the user.
    public function resend(Request $request){
    	
    }
}
