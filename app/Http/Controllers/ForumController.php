<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function index()
    {
        $forum = Forum::orderBy('created_at', "DESC")->take(10)->get();

        return view('layouts.forum', [
            'allDiscussions' => $forum
        ]);
    }

    public function store(Request $request)
    {
       // dd($request['contenu']);
        
        $request->validate([
            'contenu' => ['required', 'string']
        ]);



        //dd($user);
        Forum::create([
            'contenu' => $request['contenu'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('forum');
    }
}
