@echo off
title Preparando el Proyecto Laravel (Online Store)
color 0A

echo ==============================================================
echo       ASISTENTE DE CONFIGURACION Y EJECUCION DE LARAVEL
echo ==============================================================
echo.
echo Paso 1: Instalando dependencias necesarias de Composer...
call composer install
echo.

if not exist .env (
    echo Paso 2: Creando el archivo .env global de tu sistema...
    copy .env.example .env
    echo Generando claves de seguridad...
    call php artisan key:generate
) else (
    echo Paso 2: El archivo .env ya existe. Omitiendo su creacion...
)
echo.

echo ==============================================================
echo ¡ATENCION IMPORTANTE! 
echo ==============================================================
echo Antes de continuar a la Base de Datos...
echo 1. Abre el archivo .env con el bloc de notas (o tu editor de codigo).
echo 2. Busca "DB_PORT=" y dejalo en 8889 si usas MAMP, o 3306 si usas XAMPP.
echo 3. Busca "DB_PASSWORD=" y dejalo en "root" si usas MAMP, o en vacio si usas XAMPP.
echo 4. Ve a tu PhpMyAdmin y crea la base de datos llamada "laravelcourse".
echo.
echo Presiona cualquier tecla UNA VEZ hayas terminado lo de arriba...
echo ==============================================================
pause >nul

echo.
echo Paso 3: Ejecutando migraciones (Creando Tablas y Productos Falsos)...
call php artisan migrate --seed
echo.

echo ==============================================================
echo                   ¡TODO ESTA LISTO!
echo ==============================================================
echo El servidor se esta encendiendo... 
echo Mantén esta ventana negra abierta.
echo Ve a tu Google Chrome y escribe: http://127.0.0.1:8000
echo.
call php artisan serve

pause
