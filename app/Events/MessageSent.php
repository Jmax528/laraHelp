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



    /**
     * Create a new event instance.
     */
    public function __construct($message, $chatId, $userId)
    {
        Log::info('chatId: ' . $chatId);
        $this->message = $message;
        $this->chatId = $chatId;
        $this->userId = $userId;
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
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        Log::info('sending message on chat.'.$this->chatId);
        return [
            new PrivateChannel('chat.' . $this->chatId),
        ];
    }
//    public function broadcastAs(): string
//    {
//        return 'message.sent';
//    }


}
