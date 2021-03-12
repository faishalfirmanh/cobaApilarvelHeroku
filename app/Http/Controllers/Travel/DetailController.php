<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Travel\TravelPacage;

class DetailController extends Controller
{
    //
    public function index(Request $req, $slug)
    {
        $data = TravelPacage::with('travel_galleries')->where('slug',$slug)->firstOrFail();
        return view('Travel.pages.details',[ 'item' => $data ]);
    }
}
