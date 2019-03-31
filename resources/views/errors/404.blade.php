
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oh, oh. Acho que você perdeu - 404</title>
    <link rel="preload" href="/images/404-wolf.svg" as="image">
    <link rel="preload" href="/images/omeleth_blanco.png" as="image">

<link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
<link rel="manifest" href="/images/favicon/site.webmanifest">
<link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#bc2b19">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#bc2b19">
<link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
</head>
<body>
    
    <style>
        body{
            background-color: #0B1121;
            color: #FFF;
            font-family: 'Oxygen', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            
        }
        #themoderfoquer{
            display: flex;
            justify-content: center;
            align-items:center;
            height: 100vh;
            overflow: hidden;
            width: 100%;
            flex-wrap:nowrap;
            flex-direction: column;
        }
        #box-error{
            
            position: relative;
            max-width: 1000px;
            width: 416px;
            height: 400px;
            margin: auto;

            z-index: 1000000;
            transform: translateX(-37%);
        
        }
        #error-img{
            position: absolute;
    background: url(/images/404-wolf.svg);
    background-position: 1px center;
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    transform: translateX(31%);


        }

        #logo{
            background: url(/images/omeleth_blanco.png);
            background-position: center;
            background-repeat: no-repeat;
            width: 145px;
            height: 50px;
            position: absolute;
            margin-top:190px;
        }

        h1{
            display: block;
    font-size: 4em;
    font-weight: 200;
    margin: 83px 0 0 0;
    line-height: 1em;
        }
        h2{
            display: block;
    font-size: 2em;
    font-weight: 200;
    line-height: 1.24em;
    margin: 0;
        }

        span{
            font-size: 0.8em;
    display: block;
    margin-top: 15px;
    margin-bottom: 38px;
        }
        a{
            color: #FFF;
            text-decoration: none;
        }

        a:hover{
            text-decoration: underline;  
            cursor: pointer; 
        }

        @media only screen and (max-width: 800px) and (min-width: 100px){
            #box-error{
                transform: translateX(0);
                box-sizing: border-box;
                padding: 0px 21px;
            }

            #error-img{
                transform: translateX(0);
                width: 100%;
                 margin: 0px;
                 height: 100%;
                  left: 0;
              top: 0;
                  float: left;
            background-size: 100%;
            }
        }
        </style>

        <div id="themoderfoquer">
        
            <div id="box-error">
                <p>
                    <h1>
                        404
                    </h1>
                    <h2>
                            Eu acho que você se <br>perdeu na floresta
                    </h2>
                    <span>Está muito frio aqui, e se voltarmos para onde <br>estávamos antes?</span>
                </p>
                

                <div id="volver">
                    <a onclick="goBack()">Volver</a>
                </div>
            </div>
            <div id="error-img"></div>
<div id="logo"></div> 
                </div>
                
                <script>
                        function goBack() {
                          window.history.back();
                        }
                        </script>
</body>
</html>