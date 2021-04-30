<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
    public function getMessages(Request $request)
    {
        return Message::whereIn('user_id', [$request->user_id, $request->to_user_id])
                        ->whereIn('to_user_id', [$request->user_id, $request->to_user_id])
                        ->with('user')
                        ->get();
    }

    //Send the message
    public function sendMessages(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
           'to_user_id' => $request->to_user_id,
           'message' => $request->message
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

    //Get contacts
    public function getContacts()
    {
        return User::where('id', '!=', Auth::id())
                    ->get();
    }

}
