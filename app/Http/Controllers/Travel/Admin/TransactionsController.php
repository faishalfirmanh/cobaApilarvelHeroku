<?php

namespace App\Http\Controllers\Travel\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel\Transaction;
use Illuminate\Http\Request;


use App\Http\Requests\Travel\Admin\TravelPacageRequest;
use App\Http\Requests\Travel\Admin\TransactionRequest;
use Illuminate\Support\Str;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Transaction::with(['travel_packages','details_transctions','relasiUser'])->get();

        return view('Travel.pages.admin.transactions.index',[
                        'items'=> $items
                    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Travel.pages.admin.travelPackage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPacageRequest $request)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        TravelPacage::create($data);
        $items = TravelPacage::all();
        return view('Travel.pages.admin.travelPackage.index',[
            'items'=> $items
        ]);
       // echo"hallo";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //travel_pacages dll ambil dari relasi model
        $item = Transaction::with(['travel_packages','details_transctions','relasiUser'])->findOrFail($id);
        return view('Travel.pages.admin.transactions.detail',['item' => $item]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Transaction::findOrFail($id);
        return view('Travel.pages.admin.transactions.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Transaction::findOrFail($id);
        $item->update($data);
        return redirect('/Travel/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function succesDelete()
    {
        return view('Travel.pages.admin.travelPackage.succesdelete');
    }

    public function destroy($id)
    {
        //
        $transaksi = Transaction::findOrFail($id);
        if (is_null($transaksi)) {
          return response()->json('Data tidak ditemukan',404);
        }
        $transaksi->delete();
        return redirect('/Travel/transactions');
       
    }
}
