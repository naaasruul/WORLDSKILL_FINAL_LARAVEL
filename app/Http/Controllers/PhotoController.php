<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    //

    public function showGallery(){
        $user = Auth::user();
        if($user && $user->role == 0){
            $albums = Album::where('status',0)->with('user')->get();
            return view('gallery',['user'=>$user,'albums'=>$albums]);
        }
        redirect('');
    }

    public function showSlide(){
        return view('slide');
    }
}
