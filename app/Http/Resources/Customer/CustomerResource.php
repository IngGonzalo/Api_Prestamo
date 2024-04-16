<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    public static $wrap = "customer";

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "ci" => $this->ci,
            "name" => $this->name,
            "address" => $this->address,
            "image" => $this->image,
           
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
