<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;


Broadcast::channel('chat.{id}', function (User $user, $id) {
    // Should be changed to actual authentication
    return true;
});
Broadcast::channel('admin.notification', function (User $user) {
    return $user->isAdmin();
});
