<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Mail;

use App\Models\Travel\Transaction;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;


class MidtransController extends Controller
{
    //
    public function notificationHandler(Request $req )
    {
        Config::$serverKey = config('midtrans.serverkey');
        Config::$isProduction  = config('midtrans.isProduction');
        Config::$isSanitized  = config('midtrans.isSanitized');
        Config::$is3ds  = config('midtrans.is3ds');
        
        $notification = new Notification();
        $order = explode('_', $notification->order_id);

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $orderId = $order[2];

        $transaction = Transaction::findOrFail($orderId);
        //handleNotification
        if ($status == 'capture') 
        {
            if ($type == 'credit_card') 
            {
               if ($fraud == 'challenge') 
               {
                   $transaction->transaction_status = 'CHALLENGE'; //isi colom trnascation_status dari tabel travel_transaction
               }
               else 
               {
                   $transaction->transaction_status = 'SUCCESS';
               }
            }    
        }
        else if($status == 'settlement') 
        {
            $transaction->transaction_status = 'SUCCESS';
        }
        else if($status == 'pending') 
        {
            $transaction->transaction_status = 'PENDING';
        }
        else if($status == 'deny') 
        {
            $transaction->transaction_status = 'FAILED';
        }
        else if($status == 'expire') 
        {
            $transaction->transaction_status = 'EXPIRED';
        }
        else if($status == 'cancel') 
        {
            $transaction->transaction_status = 'FAILED';
        }

        $transaction->save();
        
        //email
        if ($transaction) 
        {
            if ($status == 'capture' && $fraud == 'accept') 
            {
               Mail::to($transaction->relasiUser)->send(new TransactionSuccess($transaction));
            }
            else if ($status == 'settlement') 
            {
                Mail::to($transaction->relasiUser)->send(new TransactionSuccess($transaction));
            }
            else if ($status == 'success') 
            {
                Mail::to($transaction->relasiUser)->send(new TransactionSuccess($transaction));
            } 
            else if ($status == 'capture' && $fraud == 'challenge') 
            {
                return response()->json
                ([
                    'meta'=>
                    [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json
                ([
                    'meta'=>
                    [
                        'code' => 200,
                        'message' => 'Midtrans Payment Not setllement'
                    ]
                ]);
            }

            return response()->json
                ([
                    'meta'=>
                    [
                        'code' => 200,
                        'message' => 'Midtrans notitfication Success'
                    ]
                ]);
        }

    }

    public function finishRedirect()
    {
        return view('Travel.pages.succes');
    }

    public function unfinishRedirect()
    {
        return view('Travel.pages.transactionNotif.unfinish');
    }

    public function errorRedirect()
    {
        return view('Travel.pages.transactionNotif.failuer');
    }
}
