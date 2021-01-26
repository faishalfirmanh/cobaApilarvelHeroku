<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Http;
use File;
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
        //

    //
      if ($request->file('image') == null)
      {
          return "gambar tidak boleh kosong";
      }else
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

         // $prod->name =  'hallo edit Statis';
         // print_r($prod->name);
        $nnn = $request->all();
        $name2 = $request->input('name');

        dd($request->input('name'));
       if (Product::where('id',$id)->exists())
       {
         $prod = Product::find($id);
         $prod->name =  'hallo edit Statis';
         $prod->image = "imagetes.jpg";
         dd('ada');

        // $prod->save();
        //  return response()->json([
        //     "message" => "records updated successfully staticc"
        // ], 200);

       }else
       {
         return "maaf id tidak ada";
       }


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

      $imgNow = $prod->image; //ambil gmbar yang lama full url
      $nameImg = str_replace('C:\laragon\www\cobaLaravellatihan\public\images\\','',$imgNow);
      $image_path = 'C:/laragon/www/cobaLaravellatihan/public/images/'.$nameImg;
      if(File::exists($image_path))
      {
        File::delete($image_path);
      }
      //File::delete($image_path);

      $prod->delete();
      return 'Sukses dihapus';
    }

    public function updateNew(Request $request, $id)
    {
      if (Product::where('id',$id)->exists())
      {
        $name = $request->input('name');
        $prod = Product::find($id);
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

        $imgNow = $prod->image; //ambil gmbar yang lama full url
        $nameImg = str_replace('C:\laragon\www\cobaLaravellatihan\public\images\\','',$imgNow);
        $image_path = 'C:/laragon/www/cobaLaravellatihan/public/images/'.$nameImg;
        if(File::exists($image_path))
        {
          File::delete($image_path);
        }else
        {
          print_r('tidak ada file gambar');
        }
       $filename = time() . '.'.$request->image->extension();
       $newImgInput = $request->file('image')->move(public_path('images'), $filename);
       $prod->name =  $name;
       $prod->image = $newImgInput;
        $prod->save();
          return response()->json([
             "message" => "records updated successfully staticc"
         ], 200);

      }else
      {
        return "maaf id tidak ada";
      }

    }
}
