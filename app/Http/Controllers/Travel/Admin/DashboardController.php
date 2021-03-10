<?php

namespace App\Http\Controllers\Travel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('Travel.pages.admin.dashboard');
    }
}
