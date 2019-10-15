<?php 
$hasAvatar = false;
if(Auth::check()){ //Logueado
$avatar = Auth::user()->avatar;
$hasAvatar = false;
if(strlen($avatar) > 5) { // Has Avatar
$hasAvatar = true;
}
}

//dd($hasAvatar);
?>


        {{-- DropdownButton --}}
        <div class="dropdown">
                <button onclick="dropdownShow()" class="dropbtn">
                



                        @if (Auth::check())
                        
                        @if($hasAvatar == false)
                        
                        <i class="dropbtn-i fas fa-user"></i>
                        @else
                        <div class="dropbtn-avatar">
                        <img src="{{Auth::user()->avatar}}" alt="avatar">
                        </div>
                        @endif
                        
                        <span>{{Auth::user()->client_first}}</span>
                        @else
                        <i class="dropbtn-i fas fa-user-ninja"></i>
                        <span>Ninjaman</span>
                        
                        @endif
                        
                        
                </button>

                {{-- DropdownMenu --}}
                <div id="dropdown-menu" class="dropdown-content">
                        <div id="whoisyou">
                                <div id="whoisyou-img"> 
                                        @if(Auth::check())
                                        @if($hasAvatar == false)
                                        <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="fas fa-user"></i>    
                                        @else
                                        <div class="dropbtn-avatar-drop">
                                        <img src="{{Auth::user()->avatar}}" alt="avatar">
                                        </div>
                                        @endif
                                        @else
                                        <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="fas fa-user-ninja"></i>
                                        @endif
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
                                <a href="/home">{{ __('messages.dashboard') }}</a>
                                <a><form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="logout-b" name="logout-submit">{{ __('UILogin.logout') }}</button>
                                </form></a>
                                @else
                                <a href="/login">{{ __('UILogin.login') }}</a>
                                @endif  
                                
                                <div class="divider"></div>
                                <a href="#footer">{{ __('messages.help') }}</a>   
                        </div>
                </div> {{-- id="dropdown-menu" --}}
                
        </div>

        