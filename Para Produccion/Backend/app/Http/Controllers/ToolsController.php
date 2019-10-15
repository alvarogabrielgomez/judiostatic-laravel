<?php

namespace judiostatic\Http\Controllers;

use QrCode;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    
    public function qrcode(Request $request){
        $response = "error";
        $data = $request->data;
        $format = 'png';
        $size = 100;
        $margin = 1;
        $errorCorrection =  "H";
        $colorsRGB = array('R' => 0,'G' => 0, 'B' => 0);
        $backgroundColorRGB = array('R' => 255,'G' => 255, 'B' => 255);

        if($request->has('format')){
            $format = $request->format;
            if($format != 'svg' && $format != 'png' && $format != 'eps'){
                $format = 'png';
            }else if($format == 'jpeg' || $format == 'jpg'){
                $format = 'png'; 
            }
        }

        if($request->has('size')){
            $size = intval($request->size);
        }

        if($request->has('margin')){
            $margin = intval($request->margin);
        }

        if($request->has('errorCorrection')){
            $errorCorrection = $request->errorCorrection;
        }

        if($request->has('color')){
            $color = $request->color;
            
            //dd(strpos($color, '#'));
            if(strpos($color, '#') == 0){
                //str_replace('#', '', $color);
                list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
                $colorsRGB = array('R' => $r,'G' => $g, 'B' => $b);
            }else{
                $colorsRGB = explode(",", $color, 3);
                $colorsRGB = array('R' => $colorsRGB[0],'G' => $colorsRGB[1], 'B' => $colorsRGB[2]);
            }
        }

        if($request->has('backgroundColor')){
            $backgroundColor = $request->backgroundColor;
            
            //dd(strpos($color, '#'));
            if(strpos($backgroundColor, '#') == 0){
                //str_replace('#', '', $color);
                list($r, $g, $b) = sscanf($backgroundColor, "#%02x%02x%02x");
                $backgroundColorRGB = array('R' => $r,'G' => $g, 'B' => $b);
            }else{
                $backgroundColorRGB = explode(",", $color, 3);
                $backgroundColorRGB = array('R' => $backgroundColorRGB[0],'G' => $backgroundColorRGB[1], 'B' => $backgroundColorRGB[2]);
            }
        }

        $margin =  $request->margin;
        
        $qrcode = QrCode::format($format)
                    ->size($size)
                    ->color($colorsRGB['R'],$colorsRGB['G'],$colorsRGB['B'])
                    ->backgroundColor($backgroundColorRGB['R'],$backgroundColorRGB['G'],$backgroundColorRGB['B'])
                    ->margin($margin)
                    ->errorCorrection($errorCorrection)
                    ->encoding('UTF-8')
                    ->generate($data);
        if($qrcode){
            $qrcode = base64_encode($qrcode);
            $response = "success";
        }else{
            $qrcode = ""; 
        }
        
        return response()->json(array('response' => $response, 'qrcode' => $qrcode, 'format' => $format, 'size' => $size),200);

    }
}
