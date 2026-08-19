# 🛒 Online Store (Laravel EAFIT App)

¡Hola! Bienvenido a este proyecto de Laravel. Esta aplicación es una "Online Store" desarrollada como parte de un curso de EAFIT. Contiene funcionalidades de Catálogo de Productos, creación y edición de Categorías con asociaciones de 1 a N, y una estructura arquitectónica moderna (MVC + Service Pattern).

## 🚀 Requisitos Previos

Para correr este proyecto en tu computadora, necesitarás tener instalado lo siguiente:
- **PHP** (versión 8.2 o superior).
- **Composer** (gestor de dependencias de PHP).
- **MySQL** (Puedes usar XAMPP, Laragon, o **MAMP** que es con el que fue desarrollado).
- **Node.js** y **NPM** (opcional, para compilar los assets si los modificas).

---

## 🛠️ Instrucciones de Instalación

Sigue estos pasos en tu terminal favorita (PowerShell, WSL o Git Bash) para levantar el proyecto desde cero:

### 1. Clonar el repositorio y entrar a la carpeta
```bash
git clone <url-de-tu-repositorio>
cd laravelcourse
```

### 2. Instalar dependencias de PHP
Este proyecto utiliza múltiples librerías que deben descargarse por primera vez:
```bash
composer install
```

### 3. Configurar el Entorno (.env)
Laravel necesita saber cómo conectarse a tu base de datos local. Duplica el archivo de ejemplo `.env.example` y renómbralo a `.env`:
```bash
cp .env.example .env
```
*(Si estás en Windows PowerShell, puedes simplemente copiar y pegar el archivo manualmente y cambiarle el nombre a `.env`).*

### 4. Generar la Clave de Seguridad de la App
Esto genera los tokens de encriptación necesarios para las sesiones:
```bash
php artisan key:generate
```

### 5. Configurar la Base de Datos MySQL
Abre el archivo `.env` que acabas de crear y busca la sección de Base de Datos (cerca de la línea 20).
El proyecto fue construido utilizando **MAMP**, por lo que los valores por defecto que encontrarás probablemente luzcan así:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravelcourse
DB_USERNAME=root
DB_PASSWORD=root
```
> [!IMPORTANT]
> - Crea una base de datos local llamada `laravelcourse` (por ejemplo en phpMyAdmin).
> - Si estás usando **XAMPP o Laragon**, tu puerto probablemente sea el **3306** y la contraseña esté **vacía**. ¡Asegúrate de ajustar estos 3 datos en tu `.env` a tu propio sistema!

### 6. Ejecutar las Migraciones y Seeders (Poblar Base de Datos)
Ahora, vamos a crear todas las tablas (Products, Categories, Comments) y llenarlas con datos de prueba autogenerados:
```bash
php artisan migrate --seed
```
*(Si usas MAMP en Windows, recuerda asegurarte de tener el driver PDO activo, o puedes ejecutar el comando con la ruta absoluta de MAMP: `C:\MAMP\bin\php\php8.5.9\php.exe artisan migrate --seed`)*.

---

## 🏃‍♂️ Levantar el Servidor

¡Eso es todo! Ya estás listo para probar la aplicación. Simplemente enciende el servidor de pruebas incorporado de Laravel:

```bash
php artisan serve
```

Abre tu navegador web y entra a [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 📂 Funcionalidades Destacadas (Lo que debes probar)

- **Creación de Productos:** Podrás dar de alta productos y dejarlos guardados en DB usando un Service puro.
- **Relación de Categorías:** Entra a la "C" superior. Una vez ahí podrás registrar categorías con su propio *slug* e incluso asignarle o des-asignarle productos específicos de forma cruzada, todo hecho con las convenciones oficiales de Eloquent.
- **Service Pattern:** Échale un ojo a la carpeta `app/Services/`. Descubrirás que los controladores de esta app están completamente limpios y las lógicas complicadas se modularizaron.

¡Diviértete!
