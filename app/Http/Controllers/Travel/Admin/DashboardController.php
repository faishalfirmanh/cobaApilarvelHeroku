<?php

namespace App\Http\Controllers\Travel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Travel\TravelPacage;
use App\Models\Travel\Transaction;


class DashboardController extends Controller
{
    //
    public function index(Request $req)
    {
        return view('Travel.pages.admin.dashboard',[
            'travel_pacakge' =>TravelPacage::count(),
            'transaksi' =>Transaction::count(),
            'transaksiPanding' =>Transaction::where('transaction_status', 'PENDING')->count(),
            'transaksiSucces' =>Transaction::where('transaction_status', 'SUCCES')->count(),
        ]);
    }
}
