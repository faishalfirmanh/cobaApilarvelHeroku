<?php

namespace App\Models\Travel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
       'travel_package_id',
       'users_id',
       'additional_visa',
       'transactions_total',
       'transaction_status'
    ];

    protected $table = 'travel_transactions'; //kalau nama model tidak sama dengan nama table dikasih ini

    protected $hidden =[

    ];

    public function details_transctions()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id'); //id pertama merpakan foreign key, 2//primary
    }

    public function travel_packages()
    {
        return $this->belongsTo(TravelPacage::class, 'travel_package_id', 'id');
         //1 id pertama merpakan foreign key dari tabel lain
         // 2//primary
    }

    public function relasiUser()
    {
        return $this->belongsTo(User::class, 'users_id', 'id'); 
    }

}
 