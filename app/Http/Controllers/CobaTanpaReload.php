<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Http;
use File;
use App\Models\Coba;
class CobaTanpaReload extends Controller
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
        $data = Coba::all();
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

      $name = $request->input('name');
     if ($request->hasFile('image') !== null)
       {
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filename = time() . '.'.$request->image->extension();
         $image = $request->file('image')->move(public_path('images'), $filename);

        $data = new Coba();
          $data->name = $name;
          $data->image = url('images') . '/' . $filename;
          if($data->save())
          {
            $res['value'] = "$data";
            $res['message'] = "success";
            return response($res);
              return response()->json('sukses add',200);
          }
          else
          {
              return "failed save";
          }
      }
      else {
        print_r('gagal');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function updateNew(Request $request, $id)
    {

    }
}
