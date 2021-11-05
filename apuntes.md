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

## Sección 02: Diseño de la bbdd

### Video 004. Maquetación de la BBDD 1
1. Entidades:
    + **categories**:
        + id(INT)
        + name (VARCHAR)
        + slug (VARCHAR)
        + image (VARCHAR)
        + icon (VARCHAR)
    + **subcategories**:
        + id (INT)
        + name (VARCHAR)
        + slug (VARCHAR)
        + image (VARCHAR)
        + color (TINYINT)
        + size (TINYINT)
    + **products**:
        + id(INT)
        + name (VARCHAR)
        + slug (VARCHAR)
        + description (VARCHAR)
        + price (VARCHAR)
        + quantity (VARCHAR)
        + status (VARCHAR)
    + **brands**:
        + id(INT)
        + name (VARCHAR)
    + **colors**:
        + id(INT)
        + name (VARCHAR)
    + **sizes**:
        + id(INT)
        + name (VARCHAR)
    + **images**:
        + id(INT)
        + url (VARCHAR)
        + imageable_id (INT)
        + imageable_type (VARCHAR)
2. Entidades pivote:
    + **brand_category**
    + **color_product**
    + **color_size**
3. Relaciones:
    + **1:n polimórfica - products : images**
    + **n:m - categories : brands**
    + **n:m - colors : sizes**
    + **n:m - colors : products**
    + **1:n - categories : subcategories**
    + **1:n - subcategories : products**
    + **1:n - brands : products**
    + **1:n - products : sizes**
4. Commit Video 004:
    + $ git add .
    + $ git commit -m "Video 004. Maquetación de la BBDD 1"
    + $ git push -u origin main

### Video 005. Maquetación de la BBDD 2
1. Entidades:
    + **users**:
        + id (INT)
        + name (VARCHAR)
        + email (VARCHAR)
        + password (VARCHAR)
    + **orders**:
        + id (INT)
        + status (VARCHAR)
        + envio_type (VARCHAR)
        + shippong_cost (VARCHAR)
        + total (VARCHAR)
    + **envio**:
        + id (INT)
    + **departments**:
        + id (INT)
        + name (VARCHAR)
    + **cities**:
        + id (INT)
        + name (VARCHAR)
    + **districts**:
        + id (INT)
        + name (VARCHAR)
    + **items**:
        + id (INT)
        + name (VARCHAR)
        + qty (VARCHAR)
        + price (VARCHAR)
        + image (VARCHAR)
        + color (VARCHAR)
        + size (VARCHAR)
2. Relaciones:
    + **1:n - users : orders**
    + **1:n - orders : envio**
    + **1:n - orders : items**
    + **1:n - departments : envio**
    + **1:n - cities : envio**
    + **1:n - cities : districts**
    + **1:n - departments : cities**
    + **1:n - districts : envio**
3. Commit Video 005:
    + $ git add .
    + $ git commit -m "Video 005. Maquetación de la BBDD 2"
    + $ git push -u origin main

### Video 006. Modelo físico
+ [Relaciones Avanzadas](https://www.youtube.com/watch?v=BNYDrxxkd1k&list=PLZ2ovOgdI-kXnKTRhERhJjWtkKeAfMFbi)
+ [Migraciones Laravel](https://www.youtube.com/watch?v=C91FOKq7v-k)
+ [Seeders en Laravel](https://www.youtube.com/watch?v=zNTF3U2Hsq0)
+ [Factory's en Laravel](https://www.youtube.com/watch?v=lLyWpWA8J0s)
1. Crear el modelo **Category** con migración y seeder:
    + $ php artisan make:model Category -ms
2. Establecer los campos de la migración **database\migrations\2021_11_05_131053_create_categories_table.php** en le método **up**:
    ```php
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('icon');
            $table->timestamps();
        });
    }
    ```
3. Habiliar la asignación masiva en el modelo **app\Models\Category.php**:
    ```php
    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon'
    ];
    ```
4. Crear el modelo **Subcategory** con migración y seeder:
    + $ php artisan make:model Subcategory -ms
5. Establecer los campos de la migración **database\migrations\2021_11_05_132351_create_subcategories_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->boolean('color')->default(false);
            $table->boolean('size')->default(false);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }
    ```
6. Habiliar la asignación masiva en el modelo **app\Models\Subcategory.php**:
    ```php
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    ```
7. Crear el modelo **Brand** con migración, seeder y factory:
    + $ php artisan make:model Brand -msf
8. Establecer los campos de la migración **database\migrations\2021_11_05_140409_create_brands_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    ```
9. Habiliar la asignación en el modelo **app\Models\Brand.php**:
    ```php
    protected $fillable = [
        'name'
    ];
    ```
10. Crear la migración de la tabla pivote **brand_category**:
    + $ php artisan make:migration create_brand_category_table
11. Establecer los campos de la migración **database\migrations\2021_11_05_141358_create_brand_category_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('brand_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }
    ```
12. Crear el modelo **Product** con migración, seeder y factory:
    + $ php artisan make:model Product -msf
13. Establecer los campos de la migración **database\migrations\2021_11_05_141627_create_products_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->float('price');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->integer('quantity')->nullable();
            $table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);
            $table->timestamps();
        });
    }
    ```
    + Importar la definción del modelo **Product**:
    ```php
    use App\Models\Product;
    ```
14. Habiliar la asignación masiva y definir las constantes de **BORRADOR** y **PUBLICADO** en el modelo **app\Models\Product.php**:
    ```php
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    ```
15. Crear el modelo **Color** con migración y seeder:
    + $ php artisan make:model Color -ms
16. Establecer los campos de la migración **database\migrations\2021_11_05_141737_create_colors_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    ```
17. Habiliar la asignación masiva en el modelo **app\Models\Color.php**:
    ```php
    protected $fillable = [
        'name'
    ];
    ```
18. Crear la migración de la tabla pivote **color_product**:
    + $ php artisan make:migration create_color_product_table
19. Establecer los campos de la migración **database\migrations\2021_11_05_142744_create_color_product_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    ```
20. Crear el modelo **Size** con migración y factory:
    + $ php artisan make:model Size -mf
21. Establecer los campos de la migración **database\migrations\2021_11_05_143210_create_sizes_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }
    ```
22. Habiliar la asignación masiva en el modelo **app\Models\Color.php**:
    ```php
    protected $fillable = [
        'name',
        'product_id'
    ];
    ```
23. Crear la migración de la tabla pivote **color_size**:
    + $ php artisan make:migration create_color_size_table
24. Establecer los campos de la migración **database\migrations\2021_11_05_150720_create_color_size_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    ```
25. Crear el modelo **Image** con migración y factory:
    + $ php artisan make:model Image -mf
26. Establecer los campos de la migración **database\migrations\2021_11_05_155037_create_images_table.php** en el método **up**:
    ```php
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');
            $table->timestamps();
        });
    }
    ```
27. Habiliar la asignación masiva en el modelo **app\Models\Image.php**:
    ```php
    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type'
    ];
    ```
28. Ejecutar las migraciones:
    + $ php artisan migrate
29. Commit Video 006:
    + $ git add .
    + $ git commit -m "Video 006. Modelo físico"
    + $ git push -u origin main

### Video 007. Generar relaciones Eloquent
1. Definir relaciones en el modelo **app\Models\Category.php**:
    ```php
    // Relación 1:n (categories - subcategories)
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    // Relación n:m (categories - brands)
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    // Relación 1:n indirecta (categories - products)
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
    ```
2. Definir relaciones en el modelo **app\Models\Subcategory.php**:
    ```php
    // Relación 1:n (subcategories - products)
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Relación 1:n inversa (categories - subcategories)
    public function category(){
        return $this->belongsTo(Category::class);
    }
    ```
3. Definir relaciones en el modelo **app\Models\Product.php**:
    ```php
    // Relación 1:n (products - sizes)
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    // Relación 1:n inversa (brands - products)
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    // Relación 1:n inversa (subcategories - products)
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    // Relación n:m (products - colors)
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    // Relación 1:n polimórfica (products - images)
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }
    ```
4. Definir relaciones en el modelo **app\Models\Color.php**:
    ```php
    // Relación n:m (colors - products)
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    // Relación n:m (colors - sizes)
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    ```
5. Definir relaciones en el modelo **app\Models\Size.php**:
    ```php
    // Relación 1:n inversa (products - sizes)
    public function product(){
        return $this->belongsTo(Product::class);
    }

    // Relación n:m (sizes - colors)
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    ```
6. Definir relaciones en el modelo **app\Models\Image.php**:
    ```php
    // Relación polimórfica
    public function imageable(){
        return $this->morphTo();
    }
    ```
7. Commit Video 007:
    + $ git add .
    + $ git commit -m "Video 007. Generar relaciones Eloquent"
    + $ git push -u origin main

## Sección 03: Insertar registros de prueba a la bbdd

    ≡
    ```php
    ```



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