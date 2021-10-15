<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Abonne;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $user = User::all();
        $abonne = Abonne::where('user_id',  '=',  auth()->user()->id)->get();
       // dd($abonne);
        return view('layouts.friend', [
            'users' => $user,
            'abonnes' => $abonne
        ]);
    }

    public function store($request)
    {
        $user = User::find($request);

        // dd($user);


        Abonne::create([
            'nom' => $user->lastname,
            'prenom' => $user->firstname,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('friend_liste');
    }

    public function profile(){
        $user=User::find(auth()->user()->id);
        return view('layouts.profile', [
            'user' => $user
        ]);
    }

    public function approuve(){

    }
}
