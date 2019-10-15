<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8"> 
<style>
#qr-canvas{
    width:150px;
    height:150px;
    margin:auto;
    background-color:#eaeaea;
}

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
    max-width: 467px;
    padding: 16px 11px 7px;
    margin: auto;
    margin-top: 25px;
    background-color: #ffffff;
    min-height: 101px;
    height: fit-content;
    overflow: auto;
    border: 1px solid rgba(151,37,21,0.29);

}

#imagecode{

}

</style>

</head>

<body>
<div id='email-container'>
<p>Oi, {{$name}} {{$last}},</p>
<p>Seu código promocional é:</p>
<p id='code'>{{$transqr}}</p>
<div id='qr-canvas'>
<img id='imagecode' src="{!!$message->embedData(QrCode::format('png')->size(150)->generate($transqr), 'QrCode.png', 'image/png')!!}" />
</div>

<div class = 'buss-info-container'>
        <div class='deal-info-metadata'>
        <div class='deal-info-name'>{{$post_title}}</div>
        <div class='deal-info-box'>{{$post_desc}}</div>
        </div>
</div>

<p><br>Você pode mostrar este código quando chegar a {{$post_buss_name}} e seu desconto será feito imediatamente</p>
<p>Você pode conferir outros cupons em nosso site</p>
<div class='deal-map-box'>O endereço do lugar é
 <a href='https://www.google.com.br/maps/search/{{$post_buss_dir}}'>{{$post_buss_dir}}</a></div>
<p>Muito obrigado</p>
<p>Omeleth Cupon.</p>
<br>
<p style='text-align:center;font-size:12px;'>Você recebeu este e-mail porque fez um pedido no <a href='https://omeleth.com'>Omeleth.com</a></p>

</div>
    </body>
</html>
