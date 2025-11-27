<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    public string $message;
    public string $clientId;
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function broadcastOn(): array
    {
        return [new Channel('chat')];
    }

//    public function broadcastAs()
//    {
//        return 'message.sent';
//    }
}

