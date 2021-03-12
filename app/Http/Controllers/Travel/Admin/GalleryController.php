<?php

namespace App\Http\Controllers\Travel\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel\GalleryTravelPacage;
use App\Models\Travel\TravelPacage;

use Illuminate\Http\Request;


use App\Http\Requests\Travel\Admin\GalleryRequest;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = GalleryTravelPacage::with(['travel_pacage'])->get(); //relasi dengan nama fungsi travel_pacage
        return view('Travel.pages.admin.gallery.index',[
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
        $taravelPacages = TravelPacage::all();
        return view('Travel.pages.admin.gallery.create',
        [
            'travel_pacage' => $taravelPacages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        //
        $data = $request->all();
        $filename = time() . '.'.$request->image->extension();
        $data['image'] = $request->file('image')->move(public_path('imagesUpload'), $filename); //uplaod image
        GalleryTravelPacage::create($data);
        return redirect('/Travel/gallery');
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
        $item = GalleryTravelPacage::findOrFail($id);
        $travelPacages = TravelPacage::all();

        return view('Travel.pages.admin.gallery.edit',[
            'item' => $item,
            'travell' => $travelPacages
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        //
        $data = $request->all();
        $filename = time() . '.'.$request->image->extension();
        $data['image'] = $request->file('image')->move(public_path('imagesUpload'), $filename);
        $item = GalleryTravelPacage::findOrFail($id);
        $item->update($data);
        return redirect('/Travel/gallery');
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
        $pacage = GalleryTravelPacage::findOrFail($id);
        if (is_null($pacage)) {
          return response()->json('Data tidak ditemukan',404);
        }
        $pacage->delete();
        $items = GalleryTravelPacage::all();
        return redirect('/Travel/gallery');
        
       
    }
}
