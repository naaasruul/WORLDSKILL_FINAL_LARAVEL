<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //

    public function showGallery(){
        return view('gallery');
    }

    public function showSlide(){
        return view('slide');
    }
}
