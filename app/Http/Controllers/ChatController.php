<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{

    //Default
    public function __construct()
    {
        $this->middleware('auth');
    }

    //View chats
    public function index()
    {
        return view('chat');
    }

    //Get messages    
    public function getMessages()
    {
        return Message::with('user')->get();
    }

    //Send the message
    public function sendMessages(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
           'message' => $request->message
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

}
