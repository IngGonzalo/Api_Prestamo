<?php

namespace App\Http\Resources\LoanDetail;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanDetailResource extends JsonResource
{
    public static $wrap = "loandetail";
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $loan = Loan::find($this->loan_id);


        return [
            "id" => $this->id,
            "pay_day" => $this->pay_day,
            "dues" => $this->dues,
            "fee_amount" => $this->fee_amount,
            "state" => $this->state,
            "date_paid" => $this->date_paid,
           
            "loan" => [
                "id" => $loan->id,
                "user_id" => $loan->user_id,
                "customer_id" => $loan->customer_id,
                "coin_id" => $loan->coin_id,
                "payment_start_date" => $loan->payment_start_date,
                "loan_amount" => $loan->loan_amount,
                "interest_percentage" => $loan->interest_percentage,
                "dues" => $loan->dues,
                "payment_methods" => $loan->payment_methods,
                "value_per_fee" => $loan->value_per_fee,
                "interest_value" => $loan->interest_value,
                "total_value" => $loan->total_value,
                "state" => $loan->state,
               

            ],
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
