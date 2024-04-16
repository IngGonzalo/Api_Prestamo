<?php

namespace App\Http\Resources\Coin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoinResource extends JsonResource
{
    public static $wrap = "coin";
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "symbol" => $this->symbol,
           
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
