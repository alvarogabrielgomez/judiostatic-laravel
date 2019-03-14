@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
<div class="container">

    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="name">      
        </div>
        <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="avatar">      
            </div>
            <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description">      
                </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</div>
@endsection 