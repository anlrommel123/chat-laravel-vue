<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    //
    // public function getMessages()
    // {

    // }

    // //
    // public function sendMessages()
    // {

    // }

}
