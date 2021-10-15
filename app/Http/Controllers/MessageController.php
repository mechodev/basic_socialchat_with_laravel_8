<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    //public function create(){
    //  return view('todos.create', [
    //    "allTodos" => Todo::orderBy('created_at', "DESC")->get()
    // ]);
    // }








    public function index()
    {
        
        $allmessage = Messages::where('receiver_id',  '=',  auth()->user()->id)->orderBy('created_at', "DESC")->take(10)->get();
        /* dd($allmessage); */
        return view('layouts.message', [
            'allMessages' => $allmessage
        ]);
    }

    public function details($id)
    {
        
        $message = Messages::where('id',  '=',  $id)->first();

        $receiver=$message->receiver_id;
        $allRecu=Messages::where('receiver_id',  '=',  auth()->user()->id)->where('sender_id',  '=', $receiver)->orderBy('created_at', "DESC")->take(10)->get();

        
        $sender=$message->sender_id;
       // dd($sender);
        $allEnvoye=Messages::where('sender_id',  '=',  auth()->user()->id)->where('receiver_id',  '=', $sender)->orderBy('created_at', "DESC")->take(10)->get();
        
        return view('layouts.message_details', [
            'allEnvoyes' => $allEnvoye,
            'allRecus'=>$allRecu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenu' => ['required', 'string']
        ]);


        //dd($request->id);


        Messages::create([
            'contenu' => $request['contenu'],
            'receiver_id' =>$request->id ,
            'sender_id' => auth()->user()->id
        ]);

        return redirect()->back();

    }    
}
