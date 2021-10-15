<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use auth;
use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    //

    public function index()
    {
        $allPublication = Publication::orderBy('created_at', "DESC")->take(10)->get();

        return view('layouts.home', [
            'allPublications' => $allPublication
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenu' => ['required', 'string']
        ]);


        //dd($user);
        Publication::create([
            'contenu' => $request['contenu'],
            'user_id' => auth()->user()->id,
            'publications_id' => $request->id
        ]);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $publication = Publication::find($id);
        $commentaire=Commentaire::where('publications_id', '=', $id)->orderBy('created_at', "DESC")->get();
        return view('layouts.commentaire', [
            'publication' => $publication,
            'commentaires'=>$commentaire
    ]);
    }
}
