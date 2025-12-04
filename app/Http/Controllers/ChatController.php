<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chats;
use App\Models\Messages;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index(): View
    {
        return view('chat');
    }
    public function create(Request $request, Chats $chat): JsonResponse
    {
        $message = $request->input('message');

        Log::info('chat ID: ' . $chat->id);
        Log::info('Message: ' . $message);

        // Save message to database
        Messages::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => $message,
        ]);

        broadcast(new MessageSent(
            $message,
            $chat->id,
            Auth::id()
        ))->toOthers();

        return response()->json([
            'success' => true,
        ]);
    }

    public function show(Chats $chat): View
    {
        Log::debug('chat.show', $chat->toArray());
        // Load participants and messages with user info
        $chat->load([
            'participants:id,name', // eager load participants (only id & name for brevity)
            'messages' => function ($query) {
                $query->orderBy('sent_at', 'asc'); // order messages chronologically
            },
            'messages.user:id,name' // eager load message sender info
        ]);

        // Return a Blade view instead of JSON
        return view('chat.show', [
            'chat' => $chat,
            'participants' => $chat->participants,
            'messages' => $chat->messages,
        ]);
    }
}
