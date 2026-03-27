<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CloseRequest implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $chatId;
    public $closeRequest;

    public function __construct($chatId, $closeRequest)
    {
        $this->chatId = $chatId;
        $this->closeRequest = $closeRequest;
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('admin.notification'),
        ];
    }

    public function broadcastAs()
    {
        return 'close.request';
    }

    public function broadcastWith()
    {
        return [
            'chat_id' => $this->chatId,
            'close_request' => $this->closeRequest,
        ];
    }
}
