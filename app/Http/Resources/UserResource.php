<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currentUser = $request->user();

        if (!$currentUser->isAdmin) {
            return [];
        }

        $isAnon = $this->isAnon();

        return [
            'id' => $this->id,
            'name' => $isAnon ? 'Anonymous' : $this->name,
            'email' => $isAnon ? null : $this->email,
            'anon' => $isAnon,
            'chat' => [$this->chat->id ?? null,

            ],
        ];
    }
}
