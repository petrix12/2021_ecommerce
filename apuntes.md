# Crea un Ecommerce con Laravel, Livewire, Tailwind y Alpine
+ [URL del curso en Udemy](https://www.udemy.com/course/crea-un-ecommerce-con-laravel-livewire-tailwind-y-alpine)
+ [URL del repositorio en GitHub](https://github.com/petrix12/2021_ecommerce.git)
+ [URL del repositorio GitHub del autor]()

## Antes de iniciar:
1. Crear proyecto en la página de [GitHub](https://github.com) con el nombre: **2021_ecommerce**.
    + **Description**: Proyecto para seguir el curso de "Crea un Ecommerce con Laravel, Livewire, Tailwind y Alpine", creado por Víctor Hernan Arana Flores para Udemy.
    + **Public**.
2. En la ubicación raíz del proyecto en la terminal de la máquina local:
    + $ git init
    + $ git add .
    + $ git commit -m "Commit 000: Antes de iniciar"
    + $ git branch -M main
    + $ git remote add origin https://github.com/petrix12/2021_ecommerce.git
    + $ git push -u origin main

## Sección 01: Introducción

### Video 001. Programas necesarios
1. Páginas principales:
	+ [Laravel](https://laravel.com)
	+ [XAMPP](https://www.apachefriends.org/es/index.html)
	+ [Composer](https://getcomposer.org)
	+ [Git](https://git-scm.com)
    + [Visual Studio Code](https://code.visualstudio.com)
    + [Node Js](https://nodejs.org/es)
    + [Workbench](https://dev.mysql.com/downloads/workbench)
        + [Opción emergente](https://www.malavida.com/es/soft/mysql-workbench/#gref)
2. Commit Video 001:
    + $ git add .
    + $ git commit -m "Video 001: Programas necesarios"
    + $ git push -u origin main

### Video 002. Instalación de un nuevo proyecto
1. Crear proyecto **2021_ecommerce**:
    + $ laravel new 2021_ecommerce --jet
    + Seleccionar **livewire**.
    + No trabajaremos con equipos:
        - Will your application use teams? (yes/no) [no]: no
2. Instalar Node Package Manager y compilar sus dependencias:
    + $ npm install
    + $ npm run dev
3. Crear un dominio local: **2021_ecommerce.test**.
    + [Guía de Coders Free para crear un dominio local](https://codersfree.com/blog/como-generar-un-dominio-local-en-windows-xampp)
4. Crear base de datos **laravel_ecommerce** en MySQL.
5. Hacer coincidir los parámetros de base de datos y de dominio del proyecto en **.env** en caso de ser necesario:
    ```env
    APP_NAME="Sefar Ecommerce"
    ≡
    APP_URL=http://2021_ecommerce.test
    ≡
    DB_DATABASE=laravel_ecommerce
    ≡
    ```
6. Ejecutar migraciones:
    + $ php artisan migrate
7. Commit Video 002:
    + $ git add .
    + $ git commit -m "Video 002: Instalación de un nuevo proyecto"
    + $ git push -u origin main

### Video 003. Extensiones de VSC
+ Extensiones de VSC recomendadas:
    + Laravel Blade formatter
        + Shuhei Hayashirbara
    + Laravel Blade Snippets
        + Winnie Lin
    + Laravel goto view
        + codingyu
    + Laravel Snippets
        + Winnie Lin
    + PHP Intelephense
        + Ben Mewburn
    + Spanish Language Pack for Visual Studio Code
        + Microsoft
    + Tailwind CSS IntelliSense
        + Brad Cornes
1. Commit Video 003:
    + $ git add .
    + $ git commit -m "Video 003. Extensiones de VSC"
    + $ git push -u origin main







## Deploy del proyecto en Heroku
1. Crear en la raíz del proyecto el archivo **Procfile** (sin extensión) para elegir un servidor apache en Heroku y también indicarle la ubicación del archivo incial index.php:
    ```
    web: vendor/bin/heroku-php-apache2 public/
    ```
2. Ingresar a [Heroku](https://dashboard.heroku.com/apps) e ir a **Dashboard**.
3. Crear un nuevo proyecto en **New > Create new app**
    + Nombre: **laravelvue-2021**
4. Ir a Deploy y dar clic en GitHub.
5. Clic en el botón Connect to GitHub e ingresar las credenciales.
6. Seleccionar el repositorio **laravel_vue_2021** y presionar el botón **Connect**.
7. Para tener siempre la ultima actualización de nuestro proyecto se recomienda presionar el botón **Enable Automatic Deploys**.
8. Presionar el botón Deploy Branch.
9. Descargar e instalar [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli).
10. En la terminal en la raíz del proyecto en local e iniciar sesión en Heroku:
    + $ heroku login
11. Víncular con la aplicación de Heroku **laravelvue-2021**:
    + $ git remote add heroku git.heroku.com/laravelvue-2021.git
        + (git remote set-url Origin git.heroku.com/laravelvue-2021.git)
    + $ heroku git:remote -a laravelvue-2021
12. Registrar variables de entorno de la aplicación desde la terminal:
    + $ heroku config:add APP_NAME=Laravel-Vue
    + $ heroku config:add APP_ENV=production
    + $ heroku config:add APP_KEY=base64:4vCNmy9+8/VoX1+btrJhzQmUoQH9rQRhhj3FJFKxvXs=
    + $ heroku config:add APP_DEBUG=false
    + $ heroku config:add APP_URL=https://laravelvue-2021.herokuapp.com
13. Crear base de datos Postgre SQL desde la terminal:
    + $ heroku addons:create heroku-postgresql:hobby-dev
    + $ heroku pg:credentials:url
    + **Nota**: la salida de la última línea de comando nos servirá para configurar las variables de entorno de la base de datos:
    ```
    Connection information for default credential.
    Connection info string:
    "dbname=*** host=*** port=*** user=*** password=*** sslmode=require"
    Connection URL:
    postgres://mmtmzssdyxkfyt:9336263e704b06d0a1ba7c979c426e7d8eb77f3958e4114cea9a21973ba08d84@ec2-35-168-145-180.compute-1.amazonaws.com:5432/dbhkpp3vfen6vd
    ```
14. Registrar variables de entorno de la base de datos desde la terminal:
    + $ heroku config:add DB_CONNECTION=pgsql
    + $ heroku config:add DB_HOST=ec2-18-235-4-83.compute-1.amazonaws.com
    + $ heroku config:add DB_PORT=5432
    + $ heroku config:add DB_DATABASE=db6unq9m90dvkv
    + $ heroku config:add DB_USERNAME=vcsyvufmsdpbhn
    + $ heroku config:add DB_PASSWORD=******
15. Ejecutar migraciones:
    + $ heroku run bash
    + ~ $ php artisan migrate --seed
        + Do you really wish to run this command? (yes/no) [no]: **yes**
    + ~ $ exit
16. Salir de Heroku:
    + $ heroku logout
17. Desconectar con repositorio Heroku:
    + $ git remote rm heroku

## Comandos Git:
+ Historial de commit:
    + git log --pretty=oneline
+ Borrar ultimo commit:
    + git reset HEAD^ --soft
+ Forzar push
    + git push origin -f