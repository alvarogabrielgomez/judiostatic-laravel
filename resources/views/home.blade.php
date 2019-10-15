@extends('layouts.appmin')
@section('title',  __('messages.dashboard'))
@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<section>
        <div id="main-container" class="dashboard-container">
                
            <div id="sidebar-dashboard">
                <nav class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="sidebar-icon"></div>
                                <div class="sidebar-label">Cupones Activos</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        <li>
                        
                            <a href="#">
                                    <div class="sidebar-icon"></div>
                                    <div class="sidebar-label">Historial</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        <li>
                            
                            <a href="#">
                                <div class="sidebar-icon"></div>
                                <div class="sidebar-label">Por calificar</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        
                        <li class = "sidebar-menu-list" onclick="custom.toggleSidebarMenu('menu-list-config')" id='menu-list-config'>
                            
                                <a href="#">
                                    <div class="sidebar-icon"></div>
                                    <div class="sidebar-menu-arrow arrow"></div>
                                    <div class="sidebar-label">Configuraciones</div>
                                </a>
                                <div class="sidebar-menu-hover"></div>
                                <nav class="sidebar-menu-list-items">
                                <ul>
                                  <li><a class="sidebar-list-item" href="#">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#">Lorem</a></li>

                                </ul>
                                <nav>
                            </li>

                    </ul>
                </nav>
            </div>
            <div id="main-posts-container">
             <div class="main-post">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        You are logged in!
                    </div>
                    
             </div>
            </div>
        </div>
        
    </section>

@endsection
