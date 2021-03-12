<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryTravelPacage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'travel_galleries';

    protected $fillable = [ //mess asigment, menyimpan secara langsung
        'travel_pacages_id','image'
    ];

    protected $hidden =[

    ];

    public function travel_pacage()
    {
        return $this->belongsTo(TravelPacage::class, 'travel_pacages_id', 'id' );
    }

}
