@extends('layouts.appmin')
@section('title',  __('messages.dashboard'))
@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>

<div id="app">
    <section id="dashboard-clipper">

                <div id="loading-overlay" style="max-height: 100vh;">
                    <div class="loader-small-container">
                        <div class="loader-small">{{ __('messages.loading') }}...</div>
                    </div>
                </div>

    <dashboard-layout userdata="{{$userdata}}"></dashboard-layout>
</section>
</div>

@endsection
