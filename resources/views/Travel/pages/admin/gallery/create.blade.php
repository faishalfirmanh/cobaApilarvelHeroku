@extends('Travel.layouts.admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="card-body">
            <h1>Create Gallery</h1>
            <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST" style="margin-left: 20px;margin-right:20px;">
                @csrf
                <div class="form-group">
                    <select name="travel_pacages_id" class="form-control" required id="">
                        <option value="">Pilih Paket Travel</option>
                        @foreach ($travel_pacage as $travel)
                            <option value="{{ $travel->id }}">
                                {{ $travel->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="image">image</label>
                    <input type="file" name="image" placeholder="image" class="form-control">
                </div>
                <button class="btn btn-primary btn-block" style="margin-top: 50px">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-dangerr">
        <ul>
            @foreach ($errors->all() as $eror)
                <li>{{ $eror }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection