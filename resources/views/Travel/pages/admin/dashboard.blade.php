@extends('Travel.layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">hotel</i>
              </div>
              <p class="card-category">Paket Travel</p>
              <h3 class="card-title">
                {{ $travel_pacakge }}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">monetization_on</i>
              </div>
              <p class="card-category">Transaksi</p>
              <h3 class="card-title">{{ $transaksi }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">schedule</i>
              </div>
              <p class="card-category">Pandding</p>
              <h3 class="card-title">{{ $transaksiPanding }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
               
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">insert_emoticon</i>
              </div>
              <p class="card-category">Suksess</p>
              <h3 class="card-title"> {{ $transaksiSucces }} </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection