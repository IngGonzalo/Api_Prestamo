<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'loan_id',
        
        
        'pay_day',
        'dues',
        'fee_amount',
        'state', 
        'date_paid',
    ];
    
    public function loans()
    {
        return $this->belongsTo(Loan::class);
    }


}
