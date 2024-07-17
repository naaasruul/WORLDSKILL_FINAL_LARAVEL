<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Photo;
class AlbumController extends Controller
{
    //

    public function showAlbum(){

        $user = Auth::user();

        if($user && $user->role == 0){
            // keluarkan album
            $albums = Album::where('user_id',$user->id)->get();
            return view('album',['user'=>$user,'albums'=>$albums]);
            
        }
        redirect('');
        
    }
    public function manageAlbum($album_id){
        $user = Auth::user();

        $album = Album::find($album_id);
        if($album != null){
            if($user && $user->role == 0){
                return view('manage-album',['user'=>$user,'album'=>$album]);
            }
        }else{
            "Error id not find";
        }

        
        redirect('');

    }

    public function store(Request $request){
        $user = Auth::user();
        if(!$user){
            redirect('');
        }
        $request->validate([
            'title'=>'required'
        ]);

        $album = Album::create([
            'title'=>$request->title,
            'status'=>$request->status,
            'user_id'=>$user->id,
            'thumbnail_url'=>''
        ]);
        if($album){
            return redirect('album');
        }
        return back()->withErrors([
            'name'=>'something wrong. please check'
        ]);
    }

    public function updateAlbum(Request $request, $album_id){
        $album = Album::find($album_id);
        $album->title = $request->title;
        $album->status = $request->status;
        $album->save();
        return redirect('album');

    }

    public function uploadPhoto(Request $request, $album_id){
        // ada 3 benda kena ingat

        // 1 This is how to handle the file
        if($request->hasFile('file')){
            $file = $request->file('file');
            // 030824_fileName
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // dia akan store kat dalam uploads
            $path = $file->storeAs('uploads',$filename);
            
            // 2 This is how we store the file in database
            $photo = Photo::create([
                'title'=>$path,
                'status'=>0,
                'album_id'=>$album_id
            ]);

            // 3  if everything is okey!
            if($photo){
                return response()->json(['success'=>true, 'path'=>$path]);
            }
            return response()->json(['success'=>false]);

        }
    }

}

// POST