<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    /** @use HasFactory<\Database\Factories\ChatsFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    // A chat has many messages
    public function messages()
    {
        return $this->hasMany(Messages::class, 'chat_id');
    }

    // A chat has many participants (users) via pivot
    public function participants()
    {
        return $this->belongsToMany(User::class, 'chat_participants', 'chat_id', 'user_id');
    }
}
