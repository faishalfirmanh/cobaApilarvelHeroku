<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Travel\Transaction;
use App\Models\Travel\TravelPacage;
use App\Models\Travel\TransactionDetail;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades;

use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{
    //
    public function index(Request $req, $id)
    {
        $data = Transaction::with(['details_transctions','travel_packages','relasiUser'])->findOrFail($id);
        return view('Travel.pages.Cek',['item' => $data]);
    }
    public function tes()
    {
        return view('Travel.pages.Cek');
    }

    public function process(Request $req, $id) //post data ke tabel transaksi
    {   
        $travelPackage = TravelPacage::findOrFail($id);
        $transactions = Transaction::create([
            'travel_package_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transactions_total' => $travelPackage->price,
            'transaction_status' => 'IN_CART',
        ]);

        TransactionDetail::create([
            'transactions_id' => $transactions->id,
            'username' => Auth::user()->username,
            'nationaloty' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout',$transactions->id);
    }

    public function create(Request $reques, $id)
    {   
        $reques->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'nationaloty' => 'required',
            'doe_passport' => 'required'
        ]);

        $data = $reques->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);
        $transavions = Transaction::with(['travel_packages'])->find($id);
        
        if ($reques->is_visa) 
        {
          $transavions->transactions_total += 10;
          $transavions->additional_visa += 10;
        }
        $transavions->transactions_total += $transavions->travel_packages->price;
        $transavions->save();

        return redirect()->route('checkout',$id);

    }

    public function remove(Request $req, $detailId)
    {
        $item = TransactionDetail::findOrFail($detailId);
        $transaction = Transaction::with(['details_transctions','travel_packages'])->findOrFail($item->transactions_id);

        if ($item->is_visa) 
        {
            $transaction->transactions_total -= 190;
            $transaction->additional_visa -= 190;
        }
        $transaction->transactions_total -= $transaction->travel_packages->price;
        $transaction->save();
        $item->delete(); 

        return redirect()->route('checkout',$item->transactions_id);
    }

    public function succes(Request $req, $id)
    {
        $transactions = Transaction::with(['relasiUser','travel_packages','details_transctions'])->findOrFail($id);
        $transactions->transaction_status = 'PENDING';
       $transactions->save();
       //return view('Travel.pages.succes');

  //     row baru midtrans
        Config::$serverKey = config('midtrans.serverkey');
        Config::$isProduction  = config('midtrans.isProduction');
        Config::$isSanitized  = config('midtrans.isSanitized');
        Config::$is3ds  = config('midtrans.is3ds');

       $midtransTransaction = [ // pake snap
           'transaction_details' =>[
               'order_id' => 'MIDTRANS_dev_' . $transactions->id,
               'gross_amount' => (int) $transactions->transactions_total
           ],

           'customer_details' =>[
               'first_name' => $transactions->relasiUser->name,
               'email' => $transactions->relasiUser->email,
           ],
           'enabled_payments' => ['gopay'],
           'vtweb' => []
        ];

        // dd(config('midtrans.serverkey'));
        try 
        {
            $paymentUrl = Snap::createTransaction($midtransTransaction)->redirect_url;
            //redirect succes
            header('Location: ' . $paymentUrl);
            exit();
        } 
        catch (Exception $error) 
        {
            echo $error->getMessage();
        }
        
    }
}
