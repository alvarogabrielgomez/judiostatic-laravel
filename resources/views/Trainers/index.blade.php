@extends('layouts.app')
@section('title', 'Trainers')

@section('content')

@include('common.errors')
@include('common.success')

<div class="row">
    @foreach ($trainers as $trainer)
    <div class="col-sm">
        <div class="card text-center" style="width: 18rem; margin-top:70px ">
                <img style="background-color:#efefef;border-radius:50%; height:120px; width:120px; margin: 10px auto;"class="card-img-top" src="/images/{{$trainer->avatar}}" alt="Card image cap">            <div class="card-body">
                <h5 class="card-title">{{$trainer->name}}</h5>
            
                <p class="card-text">{{$trainer->description}}</p>
            <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver mas...</a>
            </div>
        </div>
    </div>

    @endforeach

</div>



@endsection