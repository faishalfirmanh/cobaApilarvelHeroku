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

     public function Nextartikel($id)
     {
      $data = Product::find($id+1);
      if($data == null)
      {
        $res['message'] = "kosong";
        return response($res);
      }
      else
      {
        return $data;
      }
     }
     public function NextArticelCategory(Request $request)
     {
      
      $inputCat = $request->input('categoryid');
      $data = DB::table('products')->where('categoryid', $inputCat);
      $data2 = Product::where('categoryid', '=', $inputCat)->get();
      $toJson = json_encode($data2);
      return response($toJson);
     }

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


    public function ByKategory(Request $request)
    {
   //  $category = $request->input('categoryid');
     $idKat = $request->input('categoryid');
     $data = DB::table('products')->where('categoryid', $idKat);
     $data2 = Product::where('categoryid', '=', $idKat)->get();
     $toJson = json_encode($data2);
     return response($toJson);
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
     $name = $request->input('name');
     $artcl = $request->input('article');
     $category = $request->input('categoryid');
     $jumlahInputKat = strlen($category);
    if ($request->hasFile('image') && $name !== null)
      {
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $filename = time() . '.'.$request->image->extension();
       $image = $request->file('image')->move(public_path('images'), $filename);
      if($jumlahInputKat>1)
      {
        return response()->json([
          "message" => "input hanya berupa angka 1-4",
      ]);
      }
       $data = new Product();
         $data->name = $name;
         $data->article =$artcl;
         $data->categoryid = $category;
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
      else
     {
       return response()->json([
          "message" => "failed save",
          "validasi" =>"name & image is null"
      ]);
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
      // $data->image = url('images') . '/' . $filename;
      $tes = url('images') . '/' ;
      $imgNow = $prod->image; //ambil gmbar yang lama full url
      $nameImg = str_replace($tes,'',$imgNow);
      $image_path = $tes . $nameImg;
      if(File::exists($image_path))
      {
         File::delete($image_path);
      }

      $prod->delete();
      return 'Sukses dihapus';

      // print_r($nameImg);
      // echo "<br>";
      // print_r($imgNow);
    }

    public function updateNew(Request $request, $id)
    {
      if (Product::where('id',$id)->exists())
      {
        $name = $request->input('name');
        $artcl = $request->input('article');
        $prod = Product::find($id);

        $imgNow = $prod->image; //ambil gmbar yang lama full url
        $urlImg =  url('images') . '/' ;
        $nameImg = str_replace('C:\laragon\www\cobaLaravellatihan\public\images\\','',$imgNow);
        $image_path = 'C:/laragon/www/cobaLaravellatihan/public/images/'.$nameImg;
        if(File::exists($image_path))
        {
          File::delete($image_path);
        }else
        {
          // print_r('tidak ada file gambar');
          // echo "<br>";
        }
        if ($request->hasFile('image') && $name !== null)
        {
          $request->validate([
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $filename = time() . '.'.$request->image->extension();
          $newImgInput = $request->file('image')->move(public_path('images'), $filename);
          $prod->name =  $name;
          $prod->article =  $artcl;
          $prod->image = url('images') . '/' . $filename;
           $prod->save();
             return response()->json([
                "message" => "succces save",
            ], 200);

      	}else
        {
          return response()->json([
             "message" => "failed save",
             "validasi" =>"name & image is null"
         ], 200);
        }

      }
      else
      {
        return "maaf id tidak ada";
      }

    }
}
