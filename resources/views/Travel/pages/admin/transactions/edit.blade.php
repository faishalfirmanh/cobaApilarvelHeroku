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
            
            <h1>Edit Status Trnsaksi</h1>
            <form action="{{route('transactions.update', $item->id )}}" enctype="multipart/form-data" method="POST" style="margin-left: 20px;margin-right:20px;">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status">Transaction Status</label>
                    <select name="transaction_status" required class="form-control">
                        <option value="{{ $item->transaction_status }}">
                            Jangan diubah ({{ $item->transaction_status }})
                        </option>
                        <option value="IN_CART">IN CART</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SUCCES">SUCCES</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="FAILED">FAILED</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-block" style="margin-top: 80px">
                   Ubah data
                </button>
            </form>
        </div>
    </div>
</div>



@endsection