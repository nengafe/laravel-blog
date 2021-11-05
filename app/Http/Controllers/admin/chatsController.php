<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\clientmessageresponse;
use App\Mail\newmessage; 
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class chatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::all();
        $messages = Chat::where('status', 'waiting')->get();
        return view('admin.all-chats')->with('chats', $chats)->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'recipient' => 'required|email',
            'description' => 'required|string'
        ]); 
        $post = new Chat;
        $post->title = $request->input('title'); 
        $post->status = 'waiting';
        $post->response = 'not replied';
        $post->receiver = $request->input('recipient');
        $post->publisher = auth()->user()->email;
        $post->message = $request->input('description');

        $post->save();
        $title = $request->input('title');
        $email = $request->input('recipient');
        $message = $request->input('description');
        Mail::to($email)->send(new newmessage($title, $message, $email));
        return redirect()->route('chats.index')->with('post', 'You have added a new post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $chat = Chat::findOrFail($id);
        return view('admin.send-message-response')->with('chat', $chat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $this->validate($request, [
        'response' => 'required'
    ]); 
        $response = $request->input('response');
        $chat = Chat::findOrFail($id);
        $chat->response = $response;
        $chat->save();
        
        $title = $chat->title;
        $email = $chat->receiver;
        $message = $chat->message;
        
        return redirect()->route('chats.index')->with('chatupdate', 'Response sent to client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
