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
        #### Opción emergente: (https://www.malavida.com/es/soft/mysql-workbench/#gref)
2. Commit Video 001:
    + $ git add .
    + $ git commit -m "Video 001: Programas necesarios"
    + $ git push -u origin main

### Video 002. Instalación de un nuevo proyecto




### Video 003. Extensiones de VSC



### Nota 02. Proyecto en github
1. **Nota del autor**:
    + Proyecto en github: Hola queridos alumnos.
        + El código completo está en mi cuenta de github.
            + https://github.com/jhonatanfdez/crudlstva
2. Commit Nota 02:
    + $ git add .
    + $ git commit -m "Commit 02: Proyecto en github"
    + $ git push -u origin main

### Video 03. Instalar laravel y el sistema de autenticación
1. Programas requeridos:
    + [Git](https://git-scm.com/downloads)
    + [XAMPP](https://www.apachefriends.org/es/download.html)
    + [Composer](https://getcomposer.org)
    + [Visual Studio Code](https://code.visualstudio.com/download)
    + [Node Js](https://nodejs.org)
2. Otra opción podría ser Laragon ya que instala todos los programas mencionados anteriormente:
    + [Laragon](https://laragon.org/download/index.html)
3. Instalar el instalador de Laravel:
    + $ composer global require laravel/installer
4. Crear proyecto para la **laravel-vue-2021**:
    + $ composer create-project laravel/laravel laravel-vue-2021 "7.*"
5. Crear base de datos **laravel_vue-2021**.
6. Configurar el archivo de variables **.env** de entorno con nuestro proyecto:
    ```env
    APP_NAME=Laravel-Vue
    ≡
    APP_URL=http://laravel-vue-2021.test
    ≡
    DB_DATABASE=laravel_vue-2021
    ≡
    ```
7. Instalar y habilitar el sistema de autenticación con Vue.js:
    + $ composer require laravel/ui:^2.4
    + $ php artisan ui vue --auth
8. Instalar las dependencias de Node Package Manager:
    + $ npm install
    + $ npm run dev
9. Ejecutar las migraciones:
    + $ php artisan migrate
10. Commit Video 03:
    + $ git add .
    + $ git commit -m "Commit 03: Instalar laravel y el sistema de autenticación"
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