<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Travel\TravelPacage;

class HomeController extends Controller
{
    //

    public function index()
    {   
        $dataPackage = TravelPacage::with(['travel_galleries'])->get();
        return view('Travel.pages.home',['data' => $dataPackage]);
    }
}
