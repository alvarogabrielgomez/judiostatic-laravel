<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    
    public function qrcode(Request $request){
        $data = $request->data;
        $size = $request->size;
        $format = 'png';
        if(Request::has('format')){
            $format = $request->format;
        }
        $color = $request->color;
        $backgroundColor = $request->backgroundColor;
        $margin =  $request->margin;
        $errorCorrection =  $request->errorCorrection;

    }
}
