<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Travel\GalleryTravelPacage;
class TravelPacage extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [ //mess asigment, menyimpan secara langsung
        'title','slug','location','about','featured_events','leagueges',
        'food','departure_date','duration','type','price'
    ];

    protected $hidden =[

    ];

    public function travel_galleries()
    {
        return $this->hasMany(GalleryTravelPacage::class, 'travel_pacages_id', 'id'); //hasmany = memiliki banyak
    }

}
 