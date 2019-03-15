@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
<div class="container">
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        @csrf
        @include('trainers.form');
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</div>
@endsection 