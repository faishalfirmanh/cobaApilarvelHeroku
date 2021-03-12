<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{   
    protected $table = 'travel_transaction_details'; 

    use HasFactory;
    protected $fillable = [ 
        'transactions_id',
        'username',
        'nationaloty',
        'is_visa',
        'doe_passport'
     ];

     public function transactions()
     {
         return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
     }
}
