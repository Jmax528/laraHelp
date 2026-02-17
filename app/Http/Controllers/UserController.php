<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('chat')->get(); // include chat relation

        // Transform users through UserResource
        $users = UserResource::collection($users);

        return view('chat', compact('users'));
    }

}
