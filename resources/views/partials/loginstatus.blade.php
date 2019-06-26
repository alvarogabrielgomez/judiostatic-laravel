<?php 
if(Auth::check()){
$icon = "fas fa-user";
}else{
$icon = "fas fa-user-ninja";
}
?>


        {{-- DropdownButton --}}
        <div class="dropdown">
                <button onclick="dropdownShow()" class="dropbtn">
                        <i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 1px;" 
                        class="dropbtn-i {{$icon}} "></i>
                        @if (Auth::check())
                        <span>{{Auth::user()->client_first}}</span>
                        @else
                        <span>Ninjaman</span>
                        @endif
                </button>

                {{-- DropdownMenu --}}
                <div id="dropdown-menu" class="dropdown-content">
                        <div id="whoisyou">
                                <div id="whoisyou-img"> 
                                <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="{{$icon}}"></i>    
                                </div> 
                                <div id="whoisyou-name">
                                        @if (Auth::check())
                                        <span>{{Auth::user()->client_first}}</span>
                                        @else
                                        <span>Ninjaman</span>
                                        @endif
                                
                                <div id="whoisyou-email">
                                        @if (Auth::check())
                                        <span>{{Auth::user()->email}}</span>
                                        @else
                                        <span>Anon</span>
                                        @endif  
                                </div>
                        </div>
                        </div>
                        <div id="dropdown-o-container">
                                @if (Auth::check())
                                <a href="/home">Dashboard</a>
                                <a><form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="logout-b" name="logout-submit">Logout</button>
                                </form></a>
                                @else
                                <a href="/login">Iniciar Sesion</a>
                                @endif  
                                
                                <div class="divider"></div>
                                <a href="#footer">Ayuda</a>   
                        </div>
                </div> {{-- id="dropdown-menu" --}}
                
        </div>

        