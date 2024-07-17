<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    //
    public function showUsers(){
        $user = Auth::user();
        if($user && $user->role == 1){
            $users = User::withCount('albums')->with('albums.photos.likes')->get();

            // for loop untuk calc like
            foreach($users as $currUser){
                $totalLikes=0;
                $totalPhotos=0;

                foreach($currUser->albums as $album){
                    $totalPhotos += $album->photos->count();
                    foreach($album->photos as $photo){
                        $totalLikes += $photo->likes->count();
                    }
                }

                $currUser->totalLikes = $totalLikes;
                $currUser->totalPhotos = $totalPhotos;
            }
            return view('user',['user'=>$user, 'users'=>$users]);

        }
        redirect('');
    }
}
