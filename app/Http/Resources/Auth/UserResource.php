<?php

namespace App\Http\Resources\Auth;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public static $wrap = "user";
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rol = Role::find($this->role_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'ci' => $this->ci,
            'image' => $this->image,
            "role" => [
                "id" => $rol->id,
                "name" => $rol->name,
                
            ],
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
