<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function showlogin(){
        return view('login');
    }
    // kalau post kena hantar request
    public function login(Request $request){
        $credentials = $request->validate([
             'name'=>'required',
             'password'=>'required',
        ]);

        // try to login and login
        if(Auth::attempt($credentials)){
            // to cancel the previous sessions
            $request->session()->regenerate();

            $user = Auth::user();
            if($user->role == 0){
                return redirect('gallery');
            }else{
                return redirect('users');
            }
        }

        return back()->withErrors('The credentials is not in database')->onlyInput('email');

        

    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('');

    }
}
