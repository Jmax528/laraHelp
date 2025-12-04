<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'user_id',
        'chat_id',
        'message',
    ];

    public $timestamps = false;

    // Each message belongs to a chat
    public function chat()
    {
        return $this->belongsTo(Chats::class, 'chat_id');
    }

    // Each message belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
