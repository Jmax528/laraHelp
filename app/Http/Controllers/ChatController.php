<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function openUserChat(User $user){
        $chat = Chats::firstOrCreate([
            ['user_id' => $user->id],
            ['title' => 'Chat with ' . $user->name]
        ]);
        return redirect()->route('chat.show', $chat->id);
    }

    /**
     * Show a chat with users + messages
     */
    public function show(Chats $chat): View
    {
        // Load chat messages + sender
        $chat->load([
            'participants:id,name',
            'messages' => fn ($q) => $q->orderBy('sent_at', 'asc'),
            'messages.user:id,name'
        ]);

        // Load users for admin sidebar (exclude yourself)
        $users = User::with('chats')
            ->where('id', '!=', Auth::id())
            ->orderBy('name')
            ->get();

        return view('chat', [
            'chat' => $chat,
            'users' => $users,
            'messages' => $chat->messages,
        ]);
    }

    /**
     * Send a message
     */
    public function create(Request $request, Chats $chat): JsonResponse
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = Messages::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        broadcast(new MessageSent(
            $message->message,
            $chat->id,
            $message->user_id,
            Auth::user()->name
        ))->toOthers();

        return response()->json([
            'success' => true,
        ]);
    }
}
