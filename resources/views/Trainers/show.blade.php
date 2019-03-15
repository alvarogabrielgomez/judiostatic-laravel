@extends('layouts.app')
@section('title', 'Trainer')

@section('content')
@include('common.success')

<div class="text-center">
<img style="background-color:#efefef;border-radius:50%; height:200px; width:200px; margin: 10px auto; display:block;
" class="card-img-top" src="/images/{{$trainer->avatar}}" alt="Card image cap">
<h3 class="card-text text-center">{{$trainer->name}}</h3>

<p class="card-text text-center">{{$trainer->description}}</p>

<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
    <form method="POST" action="/trainers/{{$trainer->slug}}">
        @csrf
        @method('DELETE');
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>
@endsection 