<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Http;

use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tes = "212";
        $data = Product::all();
       if(count($data) > 0)
       { //mengecek apakah data kosong atau tidak
           $res['message'] = "Berhasil!";
           $res['values'] = $data;
           return response($res);
       }
       else
       {
           $res['message'] = "Kosong!";
           return response($res);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $filename = time() . '.'.$request->image->extension();
       $name = $request->input('name');
       $image = $request->file('image')->move(public_path('images'), $filename);
       $data = new Product();
         $data->name = $name;
         $data->image = $image;
         if($data->save())
         {
           $res['message'] = "Berhasil!";
           $res['value'] = "$data";
           return response($res);
          return response()->json('sukses add',200);
         }
         else
         {
             return "failed save";
         }




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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

      $filename = time() . '.'.$request->image->extension();
      $name = $request->input('name');
      $image = $request->file('image')->move(public_path('images'), $filename);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $prod = Product::find($id);
      if (is_null($prod)) {
        return response()->json('Data tidak ditemukan',404);
      }
      $prod->delete();
      return 'Sukses dihapus';
    }
}
