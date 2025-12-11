<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat()
    {
        return view('chat');
    }
    public function sendMessage(Request $request)
    {
        //get message and send it to others, messages are not saved
        $message = $request->validate([
            'message' => 'required|string',
        ]);
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request)
    {

    }
}
