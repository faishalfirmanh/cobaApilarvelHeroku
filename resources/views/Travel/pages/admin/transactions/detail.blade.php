@extends('Travel.layouts.admin')

@section('content')

<div class="content">
    <div class="row">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-dangerr">
                    <ul>
                        @foreach ($errors->all() as $eror)
                            <li>{{ $eror }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <h1>Details Trnsaction {{$item->relasiUser->name}}</h1>
            <table class="table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Paket travel</th>
                    <td>{{ $item->travel_packages->title }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $item->relasiUser->name }}</td>
                </tr>
                <tr>
                    <th>Additional visa</th>
                    <td>${{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Total Transactions</th>
                    <td>${{ $item->transactions_total }}</td>
                </tr>
                <tr>
                    <th>Transaction Status</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Pembelian</th>
                    <td>
                        <table class="table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Visa</th>
                                <th>Doe Passpord </th>
                            </tr>
                            {{-- details_transaction = relasi --}}
                            @foreach ($item->details_transctions as $detail) 
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->username }}</td>
                                    <td>{{ $detail->nationaloty }}</td>
                                    <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                    <td>{{ $detail->doe_passport }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>



@endsection