@extends('Travel.layouts.admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="card-body">
            <h1>Create Page</h1>
            <form action="{{route('travel-pacage.store')}}" method="POST" style="margin-left: 20px;margin-right:20px;">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="title" value="{{old('title')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="location" placeholder="location" value="{{old('location')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">about</label>
                    <textarea name="about" 
                            placeholder="about" 
                            rows="10" value="{{old('about')}}" 
                            class="d-block w-100 form-control">
                            {{old('about')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="featured_events" placeholder="featured_events" value="{{old('featured_events')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="leagueges" placeholder="leagueges" value="{{old('leagueges')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="food" placeholder="food" value="{{old('food')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="date" name="departure_date" value="{{old('departure_date')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="duration" placeholder="duration" value="{{old('duration')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="type" placeholder="type" value="{{old('type')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="price" placeholder="price" value="{{old('price')}}" class="form-control">
                </div>
                <button class="btn btn-primary btn-block">
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