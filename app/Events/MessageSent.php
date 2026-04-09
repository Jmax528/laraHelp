<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public string $message;
    public string $chatId;
    public string $userId;
    public int $unreadCount;
    public string $type;



    /**
     * Create a new event instance.
     */
    public function __construct($message, $chatId, $userId, $unreadCount)
    {
        Log::info('chatId: ' . $chatId);
        $this->message = $message;
        $this->chatId = $chatId;
        $this->userId = $userId;
        $this->unreadCount = $unreadCount;
    }

    /**
     * Get the data to broadcast.
     *
     * @return array<string, mixed>
     */
    public function broadcastWith(): array

    {
        return [
            'message' => $this->message,
            'user_id' => $this->userId,
            'chat_id' => $this->chatId,
            'unread_count' => $this->unreadCount,
            'close_request' => $this->close_request ?? 'false',
            'system_message' => $this->system_message,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
//    public function broadcastOn()
//    {
//        return [
//            new PrivateChannel('chat.' . $this->chatId),
//            new PrivateChannel('admin.notification'),
//        ];
//    }

    public function broadcastOn()
    {
        \Log::info('Broadcasting to:', [
            'chat' => 'chat.' . $this->chatId,
            'admin' => 'admin.notification'
        ]);

        return [
            new PrivateChannel('chat.' . $this->chatId),
            new PrivateChannel('admin.notification'),
        ];
    }
    public function broadcastAs(): string
    {
        return 'message.sent';
    }


}
