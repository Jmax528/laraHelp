<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    /** @use HasFactory<\Database\Factories\ChatsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // A chat has many messages
    public function messages()
    {
        return $this->hasMany(Messages::class, 'chat_id');
    }

}
