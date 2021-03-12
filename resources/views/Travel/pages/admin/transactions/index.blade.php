@extends('Travel.layouts.admin')

@section('content')


<div class="content">
    <h1>Transactions</h1>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered" width="100%" cellspacing="0">  
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Travel</th>
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{ $item->travel_packages->title }}</th>
                            <th>{{$item->relasiUser->name}}</th> 
                            {{-- relasiUser nama relasi --}}
                            <th>{{$item->additional_visa}}</th>
                            <th>{{ $item->transactions_total }}</th>
                            <th>{{ $item->transaction_status }}</th>
                            <th>
                                <a href="{{ route('transactions.show', $item->id)}}" class="btn btn-success">
                                    detail <i class="material-icons">preview</i>
                                </a>
                                <a href="{{ route('transactions.edit', $item->id)}}" class="btn btn-info">
                                    edit <i class="material-icons">border_color</i>
                                </a>
                                <form action="{{ route('transactions.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        delete
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <th>Data kosong</th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection