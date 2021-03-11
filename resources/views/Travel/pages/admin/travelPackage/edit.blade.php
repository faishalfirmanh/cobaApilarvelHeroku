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
            <form action="{{route('travel-pacage.update', $item->id )}}" method="POST" style="margin-left: 20px;margin-right:20px;">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="title" value="{{ $item->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="location" placeholder="location" value="{{ $item->location }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">about</label>
                    <textarea name="about" 
                            placeholder="about" 
                            rows="10"
                            class="d-block w-100 form-control">
                           {{ $item->about }}
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="featured_events" placeholder="featured_events" value="{{ $item->featured_events }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="leagueges" placeholder="leagueges" value="{{ $item->leagueges}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="food" placeholder="food" value="{{ $item->food }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="date" name="departure_date" value="{{ old($item->departure_date) }}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="duration" placeholder="duration" value="{{ $item->duration }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="type" placeholder="type" value="{{ $item->type }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="price" placeholder="price" value="{{ $item->price }}" class="form-control">
                </div>
                <button class="btn btn-primary btn-block">
                   Ubah data
                </button>
            </form>
        </div>
    </div>
</div>



@endsection