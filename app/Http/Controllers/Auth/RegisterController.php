<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function showRegister(){
        return view('register');
    }

    // create or edit usually we put Request
    public function register(Request $request){
        $request -> validate([
            'name'=>'required|unique:users|string',
            'password'=>'required|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'role'=>0
        ]);
        return redirect('/');
    }
}
