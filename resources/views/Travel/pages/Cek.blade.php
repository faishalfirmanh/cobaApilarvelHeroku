
@extends('Travel.layouts.cekoutLayout')

@section('title')
    Checkout 
@endsection

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
              <li class="breadcrumb-item">
                Details
              </li>
              <li class="breadcrumb-item active">
                Checkout
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1 class="titleWisata">Who is going ?</h1>
            <p class="negara">
              Trip to land of down. Moonton
            </p>
            <div class="attende">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                    <td>Picture</td>
                    <td>Name</td>
                    <td>Nasionality</td>
                    <td>Vissa</td>
                    <td>Passpord</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 
                      <img 
                        style="width: 70px;height: 55px;"
                        src="https://asset.kompas.com/crops/hhehkNnpb713N4EGbKtbpJz0C6M=/61x92:861x626/750x500/data/photo/2018/03/05/1087778527.jpg">
                    </td>
                    <td class="align-middle">
                        Nama Orang
                    </td>
                    <td class="align-middle">
                      Indo
                    </td>
                    <td class="align-middle">
                      N/a
                    </td>
                    <td class="align-middle">
                      Active
                    </td>
                    <td class="align-middle">
                      <a href="#">X</a>
                    </td>
                  </tr>
                  <tr>
                    <td> 
                      <img 
                        style="width: 70px;height: 65px;"
                        src="https://i.pinimg.com/170x/3e/fd/a1/3efda1cd33147b7239974416260958dd.jpg">
                    </td>
                    <td class="align-middle">
                        Daniele rose roussel
                    </td>
                    <td class="align-middle">
                      Usa
                    </td>
                    <td class="align-middle">
                      N/a
                    </td>
                    <td class="align-middle">
                      Active
                    </td>
                    <td class="align-middle">
                      <a href="#">X</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="member mt-3">
                <h2>Add member</h2>
                <form action="" class="form-inline">
                  <label for="inputUsername" class="sr-only">Name</label>
                  <input type="text" name="inputUsername" class="form-control mb-2 mr-sm-2" id="inputUsername" placeholder="username">
                  <label for="inputVisa" class="sr-only">Visa</label>
                  <select name="inputVisa" id="" class="custom-select mb-2 mr-sm-2" id="inputVisa">
                    <option value="VISA" selected>Visa</option>
                    <option value="30 Days">30 Days</option>
                    <option value="N/A">N/A</option>
                  </select>
                  <label for="doePasspord" class="sr-only">DOE Passpord</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control tanggal" name="" id="doePasspord" placeholder="DOE PASSPORD">
                  </div>
                  <button class="btn btn-add-now mb-2 px-4">
                    Add now
                  </button>
                </form>
                <h5 class="mt-2 mb-0">
                  Note
                </h5>
                <p class="disclaimer mb-0">
                  You are only able to invite members that registerted in Mojopahittour
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
           
  
            <h2>Checkout informations</h2>
            <table class="trip-informations">
              <tr>
                <th width="50%">Members</th>
                <td width="50%" class="text-right">
                   2 Person
                </td>
              </tr>
              <tr>
                <th width="50%">Additional Visa</th>
                <td width="50%" class="text-right">
                    4d 3N
                </td>
              </tr>
              <tr>
                <th width="50%">Trip price</th>
                <td width="50%" class="text-right">
                  $120 / Person
                </td>
              </tr>
              <tr>
                <th width="50%">Subtotal</th>
                <td width="50%" class="text-right">
                   $240.00 /person
                </td>
              </tr>
            </table>
            <hr/>
            <h3>payment intructions</h3>
             <p class="payment">Please complete your payment befores you go to trips</p>
             <div class="bank">
               <div class="bank-item pb-3">
                 <img 
                 class="bank-img"
                 src="https://p1.hiclipart.com/preview/187/239/827/master-card-logo-card-icon-credit-card-icon-debit-card-icon-master-card-icon-line-meter-redm-png-clipart.jpg">
                 <div class="desc-bank">
                   <h3>Pt Mojopahittour</h3>
                   <p>
                     1239432130
                     <br/>
                     Bank Started Cartert
                   </p>
                 </div>
                 <div class="clearfix"></div>
               </div>
               <div class="bank-item pb-3">
                <img 
                class="bank-img"
                src="https://p1.hiclipart.com/preview/187/239/827/master-card-logo-card-icon-credit-card-icon-debit-card-icon-master-card-icon-line-meter-redm-png-clipart.jpg">
                <div class="desc-bank">
                  <h3>Pt Mojopahittour</h3>
                  <p>
                    1239432130
                    <br/>
                    Bank Started Cartert
                  </p>
                </div>
                <div class="clearfix"></div>
               </div>
             </div>
          </div>
         
          <div class="join-container">
            <a href="{{ route('cekout') }}" class="btn btn-block btn-join mt-3 py-2">
              I have made payment
            </a>
          </div>
          <div class="text-center mt-3">
            <a href="{{ url('Travel/detail') }}" class="text-muted">
              Cencel booking
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('prepand-style')
    <link rel="stylesheet" href="{{url('frontend/library/gijgo/css/gijgo.min.css')}}"/>
@endpush

@push('addon-script')
 <script src="{{url('frontend/library/gijgo/js/gijgo.min.js')}}"></script>
 <script>
      $('.tanggal').datepicker({
            uilibrary:'bootstrap4',
            icons: {
              rightIcon: '<img src="https://i.pinimg.com/originals/d2/28/d0/d228d012b5f3852abb2b66d9da526801.png" style="width: 25px; height: 25px;"/>'
            }
          })
 </script>
@endpush

  