<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('chat.{id}', function (User $user, $id) {
    return true;
});
