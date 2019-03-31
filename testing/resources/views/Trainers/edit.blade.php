@extends('layouts.app')

@section('title', 'Trainers Edit')

@section('content')
<div class="container">

<form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('trainers.form');
        {{-- <div class="form-group">
            <label for="">Nombre</label>
        <input value="{{$trainer->name}}" type="text" class="form-control" name="name">      
        </div>
        <div class="form-group">
                <label for="">Avatar</label>
                <br/>
                <img style="background-color:#efefef;border-radius:50%; height:120px; width:120px; margin: 10px auto;"class="card-img-top" src="/images/{{$trainer->avatar}}" alt="Card image cap">
                <input type="file" class="form-control" name="avatar">      
            </div>
            <div class="form-group">
                    <label for="">Description</label>
                    <input  value="{{$trainer->description}}" type="text" class="form-control" name="description">      
                </div> --}}
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

</div>
@endsection 