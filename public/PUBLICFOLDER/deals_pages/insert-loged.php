
<div class="header-insert">Oi de novo, <?php echo $_SESSION["client_first"];?>!</div>

<div class="main-box admin-signup main-box-simple">

<div class="nav-signup">

<form method="POST" id="insert-form" action="./includes/insert-inc.php?id=<?php echo $post_url_id;?>" >

<button id="btn_send" type="submit" class="selecting-user" name="signup-submit">
<div id="whoisyou" style="background-color:transparent;">
  <div id="whoisyou-img">
  <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="
fas fa-user"></i>
  </div>
  <div id="whoisyou-name"><span>
  <?php echo $_SESSION["client_first"];?>  
    </span>
  <div id="whoisyou-email"><span>
  <?php echo $_SESSION["client_email"];?>
</span>
</div>
</div>
</div>
</button>


    <input style="display:none;"  id="first" type="text" name="first"  value="<?php echo $_SESSION["client_first"]; ?>" autofocus>
    <input style="display:none;"  id="first" type="text" name="last"  value="<?php echo $_SESSION["client_last"]; ?>">
    <input style="display:none;"  id="first" type="email" name="email"  value="<?php echo $_SESSION["client_email"]; ?>">
    <span style='' class="response"></span>
    <div><a class="cancelar">Cancelar</a></div>
<div><a class="volver"onClick="cargarContenido('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>#top')">Voltar</a></div>

</form>

<canvas id="qr" style="margin: auto;display:none;"></canvas>

<script>
    $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });
    var cancelar = document.getElementsByClassName("cancelar")[0];
    cancelar.onclick = function() {
     modal.style.display = "none";
     cargarContenido('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>');
     $('#btn_send', this).removeAttr('disabled', 'disabled');
    }
    $(function(){
        var form = $("#insert-form");
        form.submit(function(e){
            $('#btn_send', this).attr('disabled', 'disabled');
            e.preventDefault();
            $.ajax({
                type: form.attr("method"), //post
                url: form.attr("action"), //insert-inc.php
                data: form.serialize(), //todos los datos del formulario
                dataType: "json", //response data type a json
                success: function(data){
                    $(".response").text(data.content);
                    if (data.response=="success") {
                        $(".response").css("color", "green");
                        $(".response").css("margin-top", "10px");
                        function success_redirect_load_delay(){
                    
                            $(".admin-signup").css("opacity", "0");
                        }
                        setTimeout(success_redirect_load_delay, 600);

                        function success_redirect(){
                            
                            $(".admin-signup").css("display", "none");
                            var transqr = data.transqr;

var qr = new QRious({
    element: document.getElementById('qr'),
    value: transqr,
    background: '#fbfbf2', // background color
    foreground: 'black', // foreground color
    backgroundAlpha: 1,
    foregroundAlpha: 1,
    level: 'L', // Error correction level of the QR code (L, M, Q, H)
    mime: 'image/png', // MIME type used to render the image for the QR code
    size: 150, // Size of the QR code in pixels.
    padding: null // padding in pixels
    
});

var canvas = document.getElementById("qr");
var qruri = canvas.toDataURL("image/png");

function loadgif(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Está quase pronto ;)</span>");

    }

loadgif();

$.ajax({url: 'modalwindow/deals_pages/saveqr.php?id=<?php echo $post_url_id;?>',
        type: 'POST', 
        data: { qruri: qruri },
        success: function(data) {
            console.log("Email Sended, Ckj1");
            cargarContenido('modalwindow/deals_pages/result.php?id=<?php echo $post_url_id;?>#top');
            
        },
        error: function(data){
            console.log("Error Ajax, Ckj1");
            $('#btn_send').removeAttr('disabled', 'disabled');
        }
    })
                            
                        }
                        setTimeout(success_redirect, 2000);



                    }
                    else if (data.response!=="success") {
                        $(".response").css("color", "red");
                        $(".response").css("margin-top", "10px");
                        $('#btn_send').removeAttr('disabled', 'disabled');
                    }
                    
                },
                error: function(data){
                    $(".response").text("Error arrecho");
                    $('#btn_send').removeAttr('disabled', 'disabled');
                }
            });
        });
    });
</script>
</div>
</div> 

        <div>
        </div>    
</div>

<p style="font-size: 12px;color: #a0a0a0;font-weight: 600;text-align: center;">
Seus dados estão seguros conosco e nós mesmos não temos acesso a eles.
    <a><form id="logout" style="text-align: center;font-size: 0.9em;" action="./includes/logout-inc.php?id=<?php echo $post_url_id;?>" method="POST">
    <button type="submit" class="logout-b" name="logout-submit-noreload">Não sou eu</button>
 </form></a>
</p>


