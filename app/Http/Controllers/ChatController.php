<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * 👤 Regular user: open own chat (auto-create)
     */
    public function userChat()
    {
        $user = auth()->user();

        // Admins should not use this route
        if ($user->isAdmin()) {
            abort(403);
        }

        $chat = Chats::firstOrCreate(
            ['user_id' => $user->id],
            ['title' => 'Support chat']
        );

        return redirect()->route('chat.show', $chat);
    }

    /**
     * 🛡 Admin: open chat with a specific user
     */
    public function openUserChat(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $chat = Chats::firstOrCreate(
            ['user_id' => $user->id],
            ['title' => 'Chat with ' . $user->name]
        );

        return redirect()->route('chat.show', $chat);
    }

    /**
     * 💬 Show an existing chat
     */
    public function show(Chats $chat): View|RedirectResponse
    {
        $user = auth()->user();

        if (!$user->isAdmin() && $chat->user_id !== $user->id) {
            return redirect()->route('chat.user');
        }

        $chat->load([
            'messages' => fn ($q) => $q->orderBy('id', 'asc'),
            'messages.user:id,name'
        ]);



        $users = User::with('chat')
            ->where('id', '!=', $user->id)
            ->whereHas('chat')
            ->orderBy('name')
            ->get();

        return view('chat', [
            'chat' => $chat,
            'users' => $users,
            'messages' => $chat->messages,
        ]);
    }

    /**
     * ✉ Send a message
     */
    public function create(Request $request, Chats $chat): JsonResponse
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = Messages::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => strip_tags($request->message),
        ]);

        broadcast(new MessageSent(
            $message->message,
            $chat->id,
            $message->user_id,
            Auth::user()->name
        ))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
}
