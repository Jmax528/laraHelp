<?php

namespace App\Http\Controllers;

use App\Events\CloseRequest;
use App\Events\MessageSent;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
//    regular users open their own chat or one needs to be created
    public function userChat()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $users = User::with(['chat' => function ($q) {
                $q->where('closed', 0);
            }]) -> whereHas('chat', function ($q) {
                $q->where('closed', 0);
            }) -> orderBy('name')
                -> get();
            return view('chat', [
                'chat' => null,
                'users' => $users,
                'messages' => [],
                'unread_count' => 0,
            ]);
        }


        $chat = Chats::where('user_id', $user->id)
            ->where('closed', 0)
            ->first();

        if (!$chat) {
            return view('create');
        }

        return redirect()->route('chat.show', $chat->id);
    }

//    Admin chat, if not an admin abort 403
    public function openUserChat(User $user): RedirectResponse
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $chat = Chats::where('user_id', $user->id)
            ->where('closed', 0)
            ->first();

//        chat doesn't exists
        if (!$chat) {
            abort(404);
        }

        return redirect()->route('chat.show', $chat->id);
    }


//   show existing chats
    public function show(Chats $chat): View|RedirectResponse
    {
        $chat->refresh();

        $user = auth()->user();

        if ($chat->closed) {
            return redirect()->route('chat.user');

        }

        if (!$user->isAdmin() && $chat->user_id !== $user->id) {
            return redirect()->route('chat.user');
        }

        if ($user->isAdmin()) {
            $chat->update(['unread_count' => 0]);
        }

        $chat->load([
            'messages' => fn ($q) => $q->oldest(),
            'messages.user:id,name'
        ]);

        $users = User::with(['chat' => function ($q) {
            $q->where('closed', 0);
        }])
            ->where('id', '!=', $user->id)
            ->whereHas('chat', function ($q) {
                $q->where('closed', 0);
            })
            ->orderBy('name')
            ->get();

        return view('chat', [
            'chat' => $chat,
            'users' => $users,
            'messages' => $chat->messages,
        ]);
    }

    public function storeCreateChat(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->anon = $request -> boolean('anon');
        $user->save();

        $existingChat = Chats::where('user_id', Auth::id())
            ->where('closed', 0)
            ->first();

        if ($existingChat) {
            return redirect()->route('chat.show', $existingChat->id);
        }

        $chat = Chats::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'message' => strip_tags($request->message),
            'unread_count' => 0,
        ]);

        return redirect()->route('chat.show', $chat->id);
    }


//    send a message
    public function sendMessage(Request $request, Chats $chat): JsonResponse
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = Messages::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => strip_tags($request->message),
        ]);

        if (!auth()->user()->isAdmin()) {
            $chat->increment('unread_count');
            $chat->update(['last_message_at' => now()]);
            $chat->refresh();
        }

        broadcast(new MessageSent(
            $message->message,
            $chat->id,
            $message->user_id,
            $chat->unread_count,
        ))->toOthers();


        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }


    //request to close chat
    public function closeRequest(Request $request, Chats $chat)
    {
        $chat->close_request = $request->boolean('close_request');
        $chat->save();

        broadcast(new CloseRequest(
            $chat->id,
            $chat->close_request
        ))->toOthers();

        return response()->json([
            'success' => true,
        ]);
    }



    //admins can close chats, users can't
    public function closeChat($chatId) {

        if(!auth()->user()->isAdmin()) {
            abort(403);
        }

        $chat = Chats::findOrFail($chatId);
        $chat->closed = 1;
        $chat->save();
        return redirect()->route('chat')->with('success', 'Chat closed successfully.');
    }

}


