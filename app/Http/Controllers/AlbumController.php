<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //

    public function showAlbum(){
        return view('album');
    }
    public function manageAlbum(){
        return view('manage-album');
    }

    // create or edit usually we put Request
    public function register(Request $request){
        
    }
}

// POST