

@extends('Travel.layouts.app')

@section('title')
    Home
@endsection

@section('content')
<header class="text-center">
    <h1>Jelajah kenikmatan wisata lebih menyenagkan </h1>
    <br>
    <h1> dengan mojopahit tour</h1>
    <p class="mt-3">
      be yourself and never sourneder
    </p>
    <p>
      top global badang is comming
    </p>
    <a href="#" class="btn btn-get-strated px-4 mt-4">
      Mari mulai
    </a>
</header>

<main>
    <div class="container">
      <section class="section-stats row justify-content-center" id="stats">
        <div class="col-3 col-md-2 stats-detail">
          <h2>20k</h2>
          <p>Members</p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
          <h2>12</h2>
          <p>Countries</p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
          <h2>3k</h2>
          <p>Hotels</p>
        </div>
        <div class="col-3 col-md-2 stats-detail">
          <h2>72 </h2>
          <p>Partner</p>
        </div>
      </section>
    </div>
    
    <section class="section-popular" id="popular">
      <div class="container">
        <div class="row">
          <div class="col text-center section-popular-heading">
            <h2>Wisata Popular</h2>
            <p>
              Someting that never try
              <br/>
              before in this word
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-popular-content" id="popularContent">
      <div class="container">
        <div class="section-popular-travel row justify-content-center">
          <!-- batas -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div 
            class="card-travel text-center d-flex flex-column" 
            style="background-image:url('https://merahputih.com/media/f1/b9/9b/f1b99b35dd23c297064c39a3b9145dfa.jpg')"
            > 
              <div class="travel-country">Indonesia</div>
              <div class="travel-location">Papua,raja ampat</div>
              <div class="travel-button mt-auto">
                <a href="{{url('/Travel/detail')}}" class="btn btn-travel-detail px-4">
                  view details
                </a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3">
            <div 
            class="card-travel text-center d-flex flex-column" 
            style="background-image:url('https://fv2-1.failiem.lv/thumb_show.php?i=8vgxme4bm&view&download_checksum=82e57122e51246d2edf210973c17b56be5f63340&download_timestamp=1614822737')"
            > 
              <div class="travel-country">Indonesia</div>
              <div class="travel-location">Yogjakarta, borobudur</div>
              <div class="travel-button mt-auto">
                <a href="{{url('/Travel/detail')}}" class="btn btn-travel-detail px-4">
                  view details
                </a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3">
            <div 
            class="card-travel text-center d-flex flex-column" 
            style="background-image:url('https://fv2-1.failiem.lv/thumb_show.php?i=s7nmb3aje&view&download_checksum=02baa69719e336a93fbe47282341567f194acdb7&download_timestamp=1614822801')"
            > 
              <div class="travel-country">Indonesia</div>
              <div class="travel-location">Kawah ijen,Banyuwangi</div>
              <div class="travel-button mt-auto">
                <a href="{{url('/Travel/detail')}}" class="btn btn-travel-detail px-4">
                  view details
                </a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3">
            <div 
            class="card-travel text-center d-flex flex-column" 
            style="background-image:url('https://fv2-2.failiem.lv/thumb_show.php?i=axzbr48kx&view&download_checksum=c4b7d897dbf9a6421ee8ef316877df11b94c3a2f&download_timestamp=1614822766')"
            > 
              <div class="travel-country">Indonesia</div>
              <div class="travel-location">Bali, bedugul</div>
              <div class="travel-button mt-auto">
                <a href="{{url('/Travel/detail')}}" class="btn btn-travel-detail px-4">
                  view details
                </a>
              </div>
            </div>
          </div>
          <!-- card -->
        </div>
      </div>
    </section>

    <!-- section network -->
    <section class="section-network" id="netword">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>Our network</h2>
            <p>
              Company are truseted
              <br/>
              more then just trip
            </p>
          </div>
          <div class="col-md-8 text-center">
            <img 
              style="width: 120px;height: 70px;"
              src="https://www.marjayatrans.com/wp-content/uploads/2019/02/Adiputro-logo-.png" 
              alt=""
              >
              <img 
              style="width: 120px;height: 80px;"
              src="https://upload.wikimedia.org/wikipedia/commons/7/72/MasterCard_early_1990s_logo.png" 
              alt=""
              >
              <img 
              style="width: 120px;height: 70px;"
              src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Logo_Pesona_Indonesia_%28Kementerian_Pariwisata%29.png" 
              alt=""
              >
              <img 
              style="width: 120px;height: 90px;"
              src="https://i.pinimg.com/originals/2f/88/4b/2f884b66c1a53b93a9e4826e5f4c459d.png" 
              alt=""
              >
              <img 
              style="width: 120px;height: 70px;"
              src="https://image.cermati.com/q_70,w_1200,h_800,c_fit/v1431504749/ogxuwgtitfwxavibahws.jpg" 
              alt=""
              >
              
          </div>
        </div>
      </div>
    </section>

    <!-- testimonial -->
    <section class="section-testimonial-heading" id="testimony">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2>Mereka menyukai pelayanan kita</h2>
            <p>
              apa kata mereka 
              <br/>
              pengalaman terbaik
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- testimonial content rivew orang -->

    <section class="section-testimonial-content" id="rivewTestimony">
      <div class="container">
        <div class="section-popular-travel row justify-content-center">
          <!--  -->
          <div class="col-sm-6 com-md-6 col-lg-4">
            <div class="card card-testimonial text-center">
              <div class="testimonial-content">
                  <img class="mb-4" src="https://media1.popsugar-assets.com/files/thumbor/f24SV83aQnTs0oyJZecR7GKBPY0/413x72:2216x1875/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2020/06/18/943/n/1922398/6c31632d5eebdeb9cb6252.86135421_/i/Jennifer-Lawrence.jpg" alt="user">
                  <h3 class="mb-4">Jennifer lawrence</h3>
                  <p class="testimonial">
                    "perjalan yang sungguh luar biasah, saya dibawa kenegri dongeng hhh fasdfasdf adfnadf kasdjfkadsf akjdfkadjsf aksdjfkajsdf"
                  </p>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to bali
                  </p>
             </div>
            </div>
          </div>
          <!--  -->

          <div class="col-sm-6 com-md-6 col-lg-4">
            <div class="card card-testimonial text-center">
              <div class="testimonial-content">
                  <img class="mb-4" src="https://www.biography.com/.image/t_share/MTE4MDAzNDEwNzkxOTI1MjYy/scarlett-johansson-13671719-1-402.jpg" alt="">
                  <h3 class="mb-4">Scarlet johanson</h3>
                  <p class="testimonial">
                    "ufuf awus osasa uss fuaf"
                  </p>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to hawai
                  </p>
             </div>
            </div>
          </div>

          <div class="col-sm-6 com-md-6 col-lg-4">
            <div class="card card-testimonial text-center">
              <div class="testimonial-content">
                  <img class="mb-4" src="https://i.pinimg.com/originals/12/bb/eb/12bbebd498b45fe4461ca21cfda074d2.jpg" alt="">
                  <h3 class="mb-4">Zlatan ibrahimovic</h3>
                  <p class="testimonial">
                    "Zlatan tidak butuh liburan, liburan yang membutuhkan zlatan, sebagai penambah devisa"
                  </p>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to Land Of Dawn
                  </p>
             </div>
            </div>
          </div>
          <!-- batas card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
            I need help
          </a>
          <a href="#" class="btn btn-started px-4 mt-4 mx-1">
           get started
          </a>
        </div>
      </div>
    </section>
</main>
@endsection