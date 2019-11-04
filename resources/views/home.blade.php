@extends('layouts.appmin')
@section('title',  __('messages.dashboard'))
@section('id',  'home')
@section('description',  'Dashboard User')
@section('heroimage',  'images/omeleth_red_image.png')
@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Scripts -->
<script id ="temp-script-locale">
    window.default_locale = "{{ config('app.locale') }}";
    window.fallback_locale = "{{ config('app.fallback_locale') }}";
    window.messages = @json($messages);
</script>

<div id="app">
    <section id="dashboard-clipper">

                <div id="loading-overlay" style="max-height: calc(100vh - 60px);">
                    <div class="loader-small-container">
                        <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                </div>

    <dashboard-layout userdata="{{$userdata}}"></dashboard-layout>
</section>
</div>

@endsection
