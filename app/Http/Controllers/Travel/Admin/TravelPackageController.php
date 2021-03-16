<?php

namespace App\Http\Controllers\Travel\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel\TravelPacage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\Travel\Admin\TravelPacageRequest;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = TravelPacage::all();
        return view('Travel.pages.admin.travelPackage.index',[
            'data'=> $items
           //'data' => DB::table('travel_pacages')->paginate(5)
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
            'data'=> $items
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
        //
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
        $item = TravelPacage::findOrFail($id);
        return view('Travel.pages.admin.travelPackage.edit',[
            'data' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPacageRequest $request, $id)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = TravelPacage::findOrFail($id);
        $item->update($data);
        return redirect('/Travel/travel-pacage');
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
        $pacage = TravelPacage::findOrFail($id);
        if (is_null($pacage)) {
          return response()->json('Data tidak ditemukan',404);
        }
        $pacage->delete();
        $items = TravelPacage::all();
        return view('Travel.pages.admin.travelPackage.index',[
            'data'=> $items]);
       // return view('Travel.pages.admin.travelPackage.succesdelete');
       
    }
}
