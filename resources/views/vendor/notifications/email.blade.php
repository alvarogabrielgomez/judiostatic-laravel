<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8"> 
</head>
<body>
    <style>
    
    .deal-info-metadata{
        padding: 0px 10PX;
        float: right;
        BOX-SIZING: BORDER-BOX;
        WIDTH: 100%;
      }

#email-container{
    max-width: 600px;
    width: 100%;
    height: auto;
    padding: 20px 44px;
    margin: auto;
    display: block;
    font-size: 16px;
    font-family: helvetica;
    border-radius: 10px 10px 0px 0px;
    background-color: #fbfbf2;
    border: 1px solid rgba(151, 37, 21, 0.29);
    border-top: 4px solid rgb(151, 37, 21);
}
#code{
    text-align: center;
    box-sizing: border-box;
    background-color: #ffffd6;
    padding: 8px;
    font-size: 27px;
}

.deal-info-name{
    padding: 0px 18px;
    font-size: 16px;
    font-weight: 600;
    word-wrap: break-word;

  }
  .deal-info-box{
    padding: 4px 18px;
    font-size: 16px;
    height: fit-content;
    overflow-y: auto;
    word-wrap: break-word;
  }

  .buss-info-container{
    display: block;
    max-width: 467px!important;
    padding: 16px 11px 7px!important;
    margin: auto;
    margin-top: 25px;
    background-color: #ffffff;
    min-height: 101px;
    height: fit-content;
    overflow: auto;
    border: 1px solid rgba(151,37,21,0.29)!important;
}
.button {
    border-radius: 50px!important;
    border: none;
    color: #fff;
    padding: 12px 39px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px!important;
    height: auto;
    box-sizing: border-box;
    box-shadow: 0px 0px 4px 0px #d1d1d1;
    cursor: pointer;
}
.red {
    background-color: #BC2D19 !important;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;
    box-shadow: 0px 1px 2px 0px rgba(128,128,128,.49) !important;
    border: 1px solid #bc2d1942;
}
    </style>


<div id='email-container'>
        <p>Oi,</p>
        <p>Estas recibiendo este email porque has intentado resetear tu contraseña</p>
        <a href="{{$actionUrl}}" class="button red" style="margin:0px;width: 221px;">Resetear Password</a>
        <br>
        <br>
        <p>Este link expirara en 60 minutos</p>
        
        <p>Si no has intentado resetear tu contraseña ignora este email</p>
        <br>
        <p>Muito obrigado</p>
        <p> {{ config('app.name') }}.</p>
        <br>
        <p style='text-align:center;font-size:12px;'>Si estas teniendo problemas para resetear la contraseña copia y pega este URL en tu barra de direcciones: 
        {{$actionUrl}}</p>
        
        </div>

</body>
</html>