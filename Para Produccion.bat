ECHO OFF
ECHO Para Produccion...
SET AllFoldersExists=false

 php artisan cache:clear
 php artisan config:cache


ECHO Verificando carpetas...
IF EXIST app\ IF EXIST bootstrap\ IF EXIST config\ IF EXIST database\ IF EXIST node_modules\ IF EXIST public\ IF EXIST resources\ IF EXIST routes\ IF EXIST storage IF EXIST vendor\ IF EXIST .rnd IF EXIST artisan IF EXIST composer IF EXIST composer.json IF EXIST composer.lock IF EXIST package.json IF EXIST package-lock.json IF EXIST phpunit.xml IF EXIST server.php ( 
SET AllFoldersExists=true
ECHO Todas las carpetas y archivos root existen...
) ELSE (
SET AllFoldersExists=false
ECHO No existen algunas carpetas o archivos...
PAUSE
)

:copiando

robocopy app\ ParaProduccion\Backend\app\ /E
robocopy bootstrap\ ParaProduccion\Backend\bootstrap\ /E
robocopy config\ ParaProduccion\Backend\config\ /E
robocopy database\ ParaProduccion\Backend\database\ /E
::robocopy node_modules\ ParaProduccion\Backend\node_modules\ /E
robocopy public\css ParaProduccion\Frontend\css /E
robocopy public\deals_pages ParaProduccion\Frontend\deals_pages /E
robocopy public\documents ParaProduccion\Frontend\documents /E
robocopy public\images\ ParaProduccion\Frontend\images\ /E
robocopy public\js ParaProduccion\Frontend\js /E
robocopy public\scan ParaProduccion\Frontend\scan /E
robocopy public\slick ParaProduccion\Frontend\slick /E
robocopy public\favicon.ico ParaProduccion\Frontend\favicon.ico /E

:: Se crea un index.php diferente
touch ParaProduccion\Frontend\index.php
@echo off
@echo <?php > ParaProduccion\Frontend\index.php
@echo require __DIR__.'/../lsapp/vendor/autoload.php'; > ParaProduccion\Frontend\index.php
@echo $app = require_once __DIR__.'/../lsapp/bootstrap/app.php'; > ParaProduccion\Frontend\index.php
@echo $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); > ParaProduccion\Frontend\index.php
@echo $response = $kernel->handle( > ParaProduccion\Frontend\index.php
@echo $request = Illuminate\Http\Request::capture()); > ParaProduccion\Frontend\index.php
@echo $response->send(); > ParaProduccion\Frontend\index.php
@echo $kernel->terminate($request, $response); > ParaProduccion\Frontend\index.php
\
:: Se copia el env-prod como el .env-prod

robocopy env-prod ParaProduccion\Backend\.env /E

robocopy public\mix-manifest.json ParaProduccion\Frontend\mix-manifest.json /E
robocopy public\robots.txt ParaProduccion\Frontend\robots.txt /E

robocopy resources\ ParaProduccion\Backend\resources\ /E
robocopy routes\ ParaProduccion\Backend\routes\ /E
robocopy storage\ ParaProduccion\Backend\storage /E
robocopy vendor\ ParaProduccion\Backend\vendor\ /E
robocopy artisan ParaProduccion\Backend\artisan /E
robocopy composer ParaProduccion\Backend\composer /E
robocopy composer.json ParaProduccion\Backend\composer.json /E
robocopy package.json ParaProduccion\Backend\package.json /E
robocopy package-lock.json ParaProduccion\Backend\package-lock.json /E
robocopy phpunit.xml ParaProduccion\Backend\phpunit.xml /E
robocopy server.php ParaProduccion\Backend\server.php /E
EXIT /B 0

IF %AllFoldersExists%==true (

IF NOT EXIST ParaProduccion\ (
mkdir ParaProduccion
mkdir ParaProduccion\ArchivosUnicosServidor
mkdir ParaProduccion\Backend
mkdir ParaProduccion\Frontend
)

) ELSE (
ECHO ParaProduccion Existe...
)


CALL :copiando
EXIT /B %ERRORLEVEL%




pause