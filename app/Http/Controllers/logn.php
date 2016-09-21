<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;

use Auth;



class logn extends Controller
{
    public function logn(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->guest('/');
        }
        //return redirect()->back();
    }
}
