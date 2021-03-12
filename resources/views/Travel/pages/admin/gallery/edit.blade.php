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
            
            <h1>Edit Pacage Page</h1>
            <form action="{{route('gallery.update', $item->id )}}" enctype="multipart/form-data" method="POST" style="margin-left: 20px;margin-right:20px;">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="travel_pacages_id">Paket travel</label>
                    <select name="travel_pacages_id" class="form-control" required id="">
                        <option value="{{ $item->travel_pacages_id }}">Jangan diubah</option>
                        @foreach ($travell as $travel)
                            <option value="{{ $travel->id }}">
                                {{ $travel->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="image">image</label>
                    <input type="file" name="image" placeholder="image" class="form-control">
                    @php
                        $urlAsli = $item->image;
                        $remove = str_replace('C:\laragon\www\cobaLaravellatihan\public\imagesUpload\\', '', $urlAsli);
                    @endphp
                        <img src="/imagesUpload/{{ $remove }}" width="208px" height="138" class="img-thumbnail" alt="">
                </div>
                <button class="btn btn-primary btn-block" style="margin-top: 200px">
                   Ubah data
                </button>
            </form>
        </div>
    </div>
</div>



@endsection