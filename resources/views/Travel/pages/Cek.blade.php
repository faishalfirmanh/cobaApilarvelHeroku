
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
            @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif
            <h1 class="titleWisata">Who is going ?</h1>
            <p class="negara">
              Trip to {{ $item->travel_packages->title }}, {{ $item->travel_packages->location }}
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
                  @forelse ($item->details_transctions as $detail)
                    <tr>
                      <td> 
                        <img 
                          style="width: 70px;height: 65px;"
                          src="https://ui-avatars.com/api/?name={{ $detail->username }}" class="rounded-circle"/>
                      </td>
                      <td class="align-middle">
                         {{ $detail->username }}
                      </td>
                      <td class="align-middle">
                         {{ $detail->nationaloty }}
                      </td>
                      <td class="align-middle">
                        {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                      </td>
                      <td class="align-middle">
                       {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('checkout_remove', $detail->id )}}">X</a>
                      </td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="6" class="text-center">
                            No Visitor
                        </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
              <div class="member mt-3">
                <h2>Add member</h2>
                <form action="{{ route('checkout_create', $item->id) }}" class="form-inline" method="POST">
                  @csrf
                  <label for="username" class="sr-only">username</label>
                  <input type="text" required name="username" class="form-control mb-2 mr-sm-2" id="username" placeholder="username">
                  <label for="nationaloty" class="sr-only">nationality</label>
                  <input type="text"  required style="with:50px;" name="nationaloty" class="form-control mb-2 mr-sm-2" id="nationaloty" placeholder="national">
                  <label for="is_visa" class="sr-only">Visa</label>
                  <select name="is_visa" id="" class="custom-select mb-2 mr-sm-2" required id="is_visa">
                    <option value="" selected>Visa</option>
                    <option value="1">30 Days</option>
                    <option value="0">N/A</option>
                  </select>
                  <label for="doe_passport" class="sr-only">DOE Passpord</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control tanggal" name="doe_passport" id="doe_passport" placeholder="DOE PASSPORD">
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
                   {{ $item->details_transctions->count() }} Person
                </td>
              </tr>
              <tr>
                <th width="50%">Additional Visa</th>
                <td width="50%" class="text-right">
                   {{ $item->additional_visa }}
                </td>
              </tr>
              <tr>
                <th width="50%">Trip price</th>
                <td width="50%" class="text-right">
                  $ {{ $item->travel_packages->price }} / Person
                </td>
              </tr>
              <tr>
                <th width="50%">Subtotal</th>
                <td width="50%" class="text-right">
                   $ {{ $item->transactions_total }}
                </td>
              </tr>
              <tr>
                <th width="50%">total (UNIQUE)</th>
                <td width="50%" class="text-right">
                  <span> $ {{ $item->transactions_total }}</span>
                  <span style="color: orange">( {{ mt_rand(0, 99) }} )</span>
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
                 src="/images/gopay.png">
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
            <a href="{{ route('checkout_succes', $item->id) }}" class="btn btn-block btn-join mt-3 py-2">
              I have made payment
            </a>
          </div>
          <div class="text-center mt-3">
            <a href="{{ url('Travel/detail', $item->travel_packages->slug) }}" class="text-muted">
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
            format: 'yyyy-mm-dd',
            uilibrary:'bootstrap4',
            icons: {
              rightIcon: '<img src="https://i.pinimg.com/originals/d2/28/d0/d228d012b5f3852abb2b66d9da526801.png" style="width: 25px; height: 25px;"/>'
            }
          })
 </script>
@endpush

  