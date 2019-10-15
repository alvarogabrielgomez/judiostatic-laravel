@extends('layouts.loginapp')
@section('title', 'Login')
@section('content')
<!-- Scripts -->
<script>
        window.default_locale = "{{ config('app.locale') }}";
        window.fallback_locale = "{{ config('app.fallback_locale') }}";
        window.messages = @json($messages);
</script>

<section>
<div id="main-container" style="margin-top: 0px; min-height: 594px;">
    <div class="login-img" ></div>
     <div id='main-login-container'>



     <div id="main-login">   


            

                 <div id="app">
                     <login-form-component></login-form-component>
                 </div>

                



    </div>  
</div> 

</section>
@endsection

