<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'coin_id',
        
        'payment_start_date',
        'loan_amount',
        'interest_percentage',
        'dues',
        'payment_methods',
        'value_per_fee',
        'interest_value',
        'total_value',
        'state',
    ];
    
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function coins()
    {
        return $this->belongsTo(Coin::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function loandetails()
    {
        return $this->hasMany(LoanDetail::class);
    }
}
