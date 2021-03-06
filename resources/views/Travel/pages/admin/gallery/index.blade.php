@extends('Travel.layouts.admin')

@section('content')


<div class="content">
    <h1>Gallery</h1>
    <div class="container-fluid">
        <a href="{{route('gallery.create')}}" class="btn btn-sm btn-primary shadow-sm">
            +Tambah Gallery
        </a>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered" width="100%" cellspacing="0">  
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Travel</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($items as $item)
                    @php
                        $nameTravel = $item->travel_pacage;
                        $urlAsli = $item->image;
                        $remove = str_replace('C:\laragon\www\cobaLaravellatihan\public\imagesUpload\\', '', $urlAsli);
                    @endphp
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{ $nameTravel->title }}</th>
                            <th>
                                @if(file_exists(public_path() . '/imagesUpload/' . $remove)) 
                                    <img src="/imagesUpload/{{ $remove }}" width="208px" height="138" class="img-thumbnail" alt="">
                                @else
                                    <h3>Maaf domain gratis gambar tidak ada</h1>
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('gallery.edit', $item->id)}}" class="btn btn-info">
                                    edit
                                </a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="POST">
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