<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
    public function create(Request $request)
    {
        //get message and send it to others, messages are not saved
        $message = $request->input('message');
        broadcast(new MessageSent($message))->toOthers();

        return ['success' => true];
    }
}
