<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index()
    {
        return view('Travel.pages.details');
    }
}