
@extends('Travel.layouts.app')

@section('title')
    Detail Travel
@endsection

@php
    $urlAsli =  $item->travel_galleries->first->image->image;
    $remove = str_replace('C:\laragon\www\cobaLaravellatihan\public\imagesUpload\\', '', $urlAsli);
@endphp

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
      <div class="container">
        <div class="row">
          <div class="col p-0">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  Paket travel
                </li>
                <li class="breadcrumb-item active">
                  Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
              <h1 class="titleWisata">{{ $item->title }}</h1>
              <p class="negara">
               {{ $item->location }}
              </p>
              @if ($item->travel_galleries->count())
                <div class="gallery">
                  <div class="xzoom-container">
                    <img 
                      src="/imagesUpload/{{ $remove }}" 
                      class="xzoom" 
                      id="xzoom-default" 
                      xoriginal="/imagesUpload/{{ $remove }}"  
                      alt="">
                  <!-- diatas untuk priview -->
                     <div class="xzoom-thumbs">

                        @foreach ($item->travel_galleries as $gambar)

                            @php
                                $patGmbarFull = $gambar->image;
                                $removePathJustFileImg = str_replace('C:\laragon\www\cobaLaravellatihan\public\imagesUpload\\', '', $patGmbarFull);
                            @endphp

                            <a href="/imagesUpload/{{ $removePathJustFileImg }}">
                              <img src="/imagesUpload/{{ $removePathJustFileImg }}" 
                              class="xzoomGalery rataList" 
                              width="130" 
                              height="80"
                              xpreview="/imagesUpload/{{ $removePathJustFileImg }}">
                            </a>

                        @endforeach

                      </div>
                  </div> 
                </div> 
              @endif
              <h2>
                Tentang wisata
              </h2>
              <p>
                {{ $item->about }}
              </p>
            
              <div class="features row">
                <!--  -->
                <div class="col-md-4 border-left">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTT-fO0Y_mDT8whgRdvO75YtzKut9-ZzbcgqQ&usqp=CAU" class="features-image"/>
                  <div class="descriptions">
                    <h3>Features event</h3>
                    <p>{{ $item->featured_events }}</p>
                  </div>
                </div>
                <!--  -->
                 <!--  -->
                 <div class="col-md-4 border-left">
                   <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/language-1408420-1191250.png" class="features-image"/>
                  <div class="descriptions">
                    <h3>Bahasa</h3>
                    <p>{{ $item->leagueges }}</p>
                  </div>
                </div>
                <!--  -->
                 <!--  -->
                 <div class="col-md-4 border-left">
                   <img src="https://saran.id/downloadpng/wallpaper/20201026/icon-food-png-wallpaper-food-icons-4-000-free-files-in-png-eps-svg-format-png-preview.jpg" class="features-image"/>
                  <div class="descriptions">
                    <h3>Foods</h3>
                    <p>{{ $item->food }}</p>
                  </div>
                </div>
                <!--  -->
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Members are going</h2>
              <div class="members my-2">
                <img src="https://cdn-2.tstatic.net/tribunnews/foto/bank/images/cristiano-ronaldo-nih2_20181008_133445.jpg" class="members-image mr-1">
                <img src="https://asset.kompas.com/crops/hhehkNnpb713N4EGbKtbpJz0C6M=/61x92:861x626/750x500/data/photo/2018/03/05/1087778527.jpg" class="members-image mr-1">
                <img src="https://i.pinimg.com/170x/3e/fd/a1/3efda1cd33147b7239974416260958dd.jpg" class="members-image mr-1">
                <img src="https://static.republika.co.id/uploads/images/inpicture_slide/eminem-_170808074740-217.jpg" class="members-image mr-1">
                <img src="https://kembangpetedotcom2.files.wordpress.com/2014/11/foto-seksi-scarlett-johansson.jpg" class="members-image mr-1">
              </div>
              <hr>
              <h2>Trip informations</h2>
              <table class="trip-informations">
                <tr>
                  <th width="50%">Date of depature</th>
                  <td width="50%" class="text-right">
                      05-03-2021
                  </td>
                </tr>
                <tr>
                  <th width="50%">Durations</th>
                  <td width="50%" class="text-right">
                      4d 3N
                  </td>
                </tr>
                <tr>
                  <th width="50%">Type</th>
                  <td width="50%" class="text-right">
                     Open trip
                  </td>
                </tr>
                <tr>
                  <th width="50%">Price</th>
                  <td width="50%" class="text-right">
                     $120.00 /person
                  </td>
                </tr>
              </table>
            </div>
            <div class="join-container">
              <a href="#" class="btn btn-block btn-join mt-3 py-2">
                Join now
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection

@push('prepand-style')
    <link rel="stylesheet" href="{{url('frontend/library/x-zoom/xzoom.css')}}"/>
@endpush

@push('addon-script')
 <script src="{{url('frontend/library/x-zoom/xzoom.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('.xzoom, .xzoomGalery').xzoom({
        zoomWidth: 500,
        title:false,
        tint:'blue',
        Xoffset:15,

        });
    });
 </script>
@endpush