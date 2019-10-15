<?php

namespace judiostatic\Http\Controllers;

use App;
use Config;
use Cookie;
use Illuminate\Support\Facades\Redirect;
use judiostatic\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{

    public function index()
    {
        $locale = App::getLocale();
        
        return view('index');
    }

    public function changeLang($lang, $next = "", $id = ""){
        $cookie = null;

        if (array_key_exists($lang, Config::get('app.locales'))) {
            $cookie = Cookie::forever('locale', $lang);
        }
        
        if ($cookie) {
            app()->setLocale($lang);
            
            if($next && empty($id)){
                //dd("Solo ".$next);
                return redirect($next)->withCookie($cookie)->with('status', __('messages.lang_changed'));
            }
            if($id){
                //dd("Dir ".$next."/".$id);
                return redirect($next."/".$id)->withCookie($cookie)->with('status', __('messages.lang_changed'));
            }
            if(empty($next) && empty($id)) {
                //dd("Solo ".$lang);
                return back()->withCookie($cookie)->with('status', __('messages.lang_changed'));
            }
            

            // return back()->withCookie($cookie);
        } 

        return Redirect::back();

    }
}
