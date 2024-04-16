<?php

namespace App\Http\Resources\Loan;

use App\Models\Coin;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public static $wrap = "loan";
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::find($this->user_id);
        $customer = Customer::find($this->customer_id);
        $coin = Coin::find($this->coin_id);


        return [
            "id" => $this->id,

            "user" => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'ci' => $user->ci,
                'image' => $user->image,

            ],

            "customer" => [
                "id" => $customer->id,
                "ci" => $customer->ci,
                "name" => $customer->name,
                "address" => $customer->address,
                "image" => $customer->image,

            ],

            "coin" => [
                "id" => $coin->id,
                "name" => $coin->name,
                "symbol" => $coin->symbol,
            ],



            "payment_start_date" => $this->payment_start_date,
            "loan_amount" => $this->loan_amount,
            "interest_percentage" => $this->interest_percentage,
            "dues" => $this->dues,
            "payment_methods" => $this->payment_methods,
            "value_per_fee" => $this->value_per_fee,
            "interest_value" => $this->interest_value,
            "total_value" => $this->total_value,
            "state" => $this->state,
           
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
