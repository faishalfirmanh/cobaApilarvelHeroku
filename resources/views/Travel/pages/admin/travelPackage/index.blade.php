@extends('Travel.layouts.admin')

@section('content')


<div class="content">
    <h1>Paket Travel</h1>
    <div class="container-fluid">
        <a href="{{route('travel-pacage.create')}}" class="btn btn-sm btn-primary shadow-sm">
            +Tambah Paket Travel
        </a>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered" width="100%" cellspacing="0">  
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Departured date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{$item->title}}</th>
                            <th>{{$item->location}}</th>
                            <th>{{$item->type}}</th>
                            <th>{{$item->departure_date }}</th>
                            <th>
                                <a href="{{ route('travel-pacage.edit', $item->id)}}" class="btn btn-info">
                                    edit
                                </a>
                                <form action="{{ route('travel-pacage.destroy', $item->id) }}" method="POST">
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