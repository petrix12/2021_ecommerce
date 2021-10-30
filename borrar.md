

### Video 3. Extensiones de VSC
##### Recomendaciones de algunas extensiones para VSC.


## Sección 2: Diseño de la bbdd


### Video 4. Maquetación de la BBDD 1
##### Maquetación de la bd en Workbench


### Video 5. Maquetación de la BBDD 2
##### Maquetación de la bd en Workbench


### Video 6. Modelo físico
1. Crear modelo, migración y seeder para la tabla **categories**:
    + $ php artisan make:model Category -ms
1. Definir campos de la tabla **categories** en **database\migrations\2021_06_28_104224_create_categories_table.php**:
    >
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
1. Habilitar asignación masiva para el modelo **Category** en **app\Models\Category.php**:
    >
        class Category extends Model
        {
            use HasFactory;

            protected $fillable = [
                'name',
                'slug',
                'image',
                'icon'
            ];
        }
1. Crear modelo, migración y seeder para la tabla **subcategories**:
    + $ php artisan make:model Subcategory -ms
1. Definir campos de la tabla **subcategories** en **database\migrations\2021_06_28_105436_create_subcategories_table.php**:
    >
        public function up()
        {
            Schema::create('subcategories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->string('image');
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->boolean('color');
                $table->boolean('size');
                $table->timestamps();
            });
        }
1. Crear modelo, migración, factory y seeder para la tabla **brands**:
    + $ php artisan make:model Brand -mfs
1. Definir campos de la tabla **brands** en **database\migrations\2021_06_28_111124_create_brands_table.php**:
    >
        public function up()
        {
            Schema::create('brands', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }
1. Crear migración para la tabla intermedia **brand_category**:
    + $ php artisan make:migration create_brand_category_table
1. Definir campos de la tabla itermedia **brand_category** en **database\migrations\2021_06_28_111540_create_brand_category_table.php**:
    >
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
1. Crear modelo, migración, seeder y factory para la tabla **products**:
    + $ php artisan make:model Product -msf
1. Definir campos de la tabla **products** en **database\migrations\2021_06_28_112953_create_products_table.php**:
    >
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
                $table->integer('quantity');
                $table->timestamps();
            });
        }
1. Crear modelo, migración y seeder para la tabla **colors**:
    + $ php artisan make:model Color -ms
1. Definir campos de la tabla **colors** en **database\migrations\2021_06_28_133223_create_colors_table.php**:
    >
        public function up()
        {
            Schema::create('colors', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }
1. Crear migración para la tabla intermedia **color_product**:
    + $ php artisan make:migration create_color_product_table
1. Definir campos de la tabla itermedia **color_product** en **database\migrations\2021_06_28_133938_create_color_product_table.php**:
    >
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
1. Crear modelo, migración y factory para la tabla **sizes**:
    + $ php artisan make:model Size -mf
1. Definir campos de la tabla **sizes** en **database\migrations\2021_06_29_013814_create_sizes_table.php**:
    >
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
1. Crear migración para la tabla intermedia **color_size**:
    + $ php artisan make:migration create_color_size_table
1. Definir campos de la tabla itermedia **color_size** en **database\migrations\2021_06_29_014409_create_color_size_table.php**:
    >
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
1. Ejecutar las migraciones:
    + $ php artisan migrate


### Video 7. Generar relaciones Eloquent
1. Generar relaciones en el modelo **app\Models\Category.php**:
    >
        // Relación 1:n (categories - subcategories)
        public function subcategories(){
            return $this->hasMany(Subcategory::class);
        }

        // Relación n:n (categories - brands)
        public function brands(){
            return $this->belongsToMany(Brand::class);
        }

        // Relación 1:n indirecta (categories - products)
        public function products(){
            return $this->hasManyThrough(Product::class, Subcategory::class);
        }
1. Habilitar asignación masiva en el modelo **app\Models\Subcategory.php**:
    >
        protected $guarded = [
            'id',
            'created_at',
            'updated_at'
        ];
1. Generar relaciones en el modelo **app\Models\Subcategory.php**:
    >
        // Relación 1:n (subcategories - products)
        public function products(){
            return $this->hasMany(Product::class);
        }

        // Relación 1:n inversa (categories - subcategories)
        public function category(){
            return $this->belongsTo(Category::class);
        }
1. Habilitar asignación masiva en el modelo **app\Models\Product.php**:
    >
        protected $guarded = [
            'id',
            'created_at',
            'updated_at'
        ];   
1. Generar relaciones en el modelo **app\Models\Product.php**:
    >
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

        // Relación n:n (products - colors)
        public function colors(){
            return $this->belongsToMany(Color::class);
        }

        // Relación 1:n polimórfica (products - images)
        public function images(){
            return $this->morphMany(Image::class, "imageable");
        }
1. Habilitar asignación masiva en el modelo **app\Models\Size.php**:
    >
        protected $fillable = [
            'name',
            'product_id'
        ];
1. Generar relaciones en el modelo **app\Models\Size.php**:
    >
        // Relación 1:n inversa (products - sizes)
        public function product(){
            return $this->belongsTo(Product::class);
        }

        // Relación n:n (sizes - colors)
        public function colors(){
            return $this->belongsToMany(Color::class);
        }
1. Habilitar asignación masiva en el modelo **app\Models\Color.php**:
    >
        protected $fillable = [
            'name'
        ];
1. Generar relaciones en el modelo **app\Models\Color.php**:
    >
        // Relación n:n (colors - products)
        public function products(){
            return $this->belongsToMany(Product::class);
        }

        // Relación n:n (colors - sizes)
        public function sizes(){
            return $this->belongsToMany(Size::class);
        }
1. Habilitar asignación masiva en el modelo **app\Models\Brand.php**:
    >
        protected $fillable = [
            'name'
        ];
1. Crear modelo, migración y factory para la tabla **images**:
    + $ php artisan make:model Image -mf
1. Definir campos para la tabla **images** en **database\migrations\2021_06_29_125013_create_images_table.php**:
    >
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
1. Habilitar asignación masiva en el modelo **app\Models\Image.php**:
    >
        protected $fillable = [
            'url',
            'imageable_id',
            'imageable_type'
        ];
1. Generar relaciones en el modelo **app\Models\Image.php**:
    >
        // Relación polimórfica
        public function imageable(){
            return $this->morphTo();
        }


## Sección 3: Insertar registros de prueba a la bbdd


### Video 8. Insertar registros en la tabla categories
1. Crear seeder para introducir registros de usuarios:
    + $ php artisan make:seeder UserSeeder
1. Programar seeder **User** en **database\seeders\UserSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use App\Models\User;
        use Illuminate\Database\Seeder;

        class UserSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                User::create([
                    'name' => 'Pedro Bazó',
                    'email' => 'bazo.pedro@gmail.com',
                    'password' => bcrypt('12345678')
                ]);
            }
        }
1. Crear factory para el modelo **Category**:
    + $ php artisan make:factory CategoryFactory
1. Programar el método **definition** del factory database\factories\CategoryFactory.php
    >
        public function definition()
        {
            return [
                'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false)
            ];
        }
1. Modificar el archivo de variables de entorno **.env** para indicar en donde se descargaran los archivos:
    Cambiar:
    + FILESYSTEM_DRIVER=local
    Por:
    + FILESYSTEM_DRIVER=public
        #### **Nota**: también se pudo haber utilizado el archivo de configración **config\filesystems.php**.
1. Programar seeder **Category** en **database\seeders\CategorySeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use App\Models\Category;
        use Illuminate\Database\Seeder;
        use Illuminate\Support\Str;

        class CategorySeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $categories = [
                    [
                        'name' => 'Celulares y tablets',
                        'slug' => Str::slug('Celulares y tablets'),
                        'icon' => '<i class="fas fa-mobile-alt"></i>'
                    ],
                    [
                        'name' => 'TV, audio y video',
                        'slug' => Str::slug('TV, audio y video'),
                        'icon' => '<i class="fas fa-tv"></i>'
                    ],
                    [
                        'name' => 'Consola y videojuegos',
                        'slug' => Str::slug('Consola y videojuegos'),
                        'icon' => '<i class="fas fa-gamepad"></i>'
                    ],
                    [
                        'name' => 'Computación',
                        'slug' => Str::slug('Computación'),
                        'icon' => '<i class="fas fa-laptop"></i>'
                    ],
                    [
                        'name' => 'Moda',
                        'slug' => Str::slug('Moda'),
                        'icon' => '<i class="fas fa-tshirt"></i>'
                    ]
                ];

                foreach ($categories as $category){
                    Category::factory(1)->create($category);
                }
            }
        }
1. Programar la creación de la carpeta **products** e importar los seeder para los modelos **User** y **Category** en **database\seeders\DatabaseSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use Illuminate\Support\Facades\Storage;

        class DatabaseSeeder extends Seeder
        {
            /**
            * Seed the application's database.
            *
            * @return void
            */
            public function run()
            {
                // Borra y crea la carpeta products
                Storage::deleteDirectory('categories');
                Storage::makeDirectory('categories');

                $this->call(UserSeeder::class);
                $this->call(CategorySeeder::class);
            }
        }
1. Reestablecer base de datos y ejecutar los seeder:
    + php artisan migrate:fresh --seed


### Video 9. Insertar registros a la tabla subcategories
1. Modificar método **up** de la migración **database\migrations\2021_06_28_105436_create_subcategories_table.php**:
    >
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
1. Programar el seeder **database\seeders\SubcategorySeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use App\Models\Subcategory;
        use Illuminate\Database\Seeder;
        use Illuminate\Support\Str;

        class SubcategorySeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $subcategories = [
                    /* Celulares y tablets */
                    [
                        'category_id' => 1,
                        'name' => 'Celulares y smartphones',
                        'slug' => Str::slug('Celulares y smartphones'),
                        'color' => true
                    ],
                    [
                        'category_id' => 1,
                        'name' => 'Accesorios para celulares',
                        'slug' => Str::slug('Accesorios para celulares'),
                    ],
                    [
                        'category_id' => 1,
                        'name' => 'Smartwatches',
                        'slug' => Str::slug('Smartwatches'),
                    ],

                    /* TV, audio y video */
                    [
                        'category_id' => 2,
                        'name' => 'TV y audio',
                        'slug' => Str::slug('TV y audio'),
                    ],
                    [
                        'category_id' => 2,
                        'name' => 'Audios',
                        'slug' => Str::slug('Audios'),
                    ],
                    [
                        'category_id' => 2,
                        'name' => 'Audio para autos',
                        'slug' => Str::slug('Audio para autos'),
                    ],

                    /* Consola y videojuegos */
                    [
                        'category_id' => 3,
                        'name' => 'Xbox',
                        'slug' => Str::slug('Xbox'),
                    ],
                    [
                        'category_id' => 3,
                        'name' => 'Play Station',
                        'slug' => Str::slug('Play Station'),
                    ],
                    [
                        'category_id' => 3,
                        'name' => 'Videojuegos para PC',
                        'slug' => Str::slug('Videojuegos para PC'),
                    ],
                    [
                        'category_id' => 3,
                        'name' => 'Nintendo',
                        'slug' => Str::slug('Nintendo'),
                    ],

                    /* Computación */
                    [
                        'category_id' => 4,
                        'name' => 'Portátiles',
                        'slug' => Str::slug('Portátiles'),
                    ],
                    [
                        'category_id' => 4,
                        'name' => 'PC escritorio',
                        'slug' => Str::slug('PC escritorio'),
                    ],
                    [
                        'category_id' => 4,
                        'name' => 'Almacenamiento',
                        'slug' => Str::slug('Almacenamiento'),
                    ],
                    [
                        'category_id' => 4,
                        'name' => 'Accesorios computadoras',
                        'slug' => Str::slug('Accesorios computadoras'),
                    ],

                    /* Moda */
                    [
                        'category_id' => 5,
                        'name' => 'Mujeres',
                        'slug' => Str::slug('Mujeres'),
                    ],
                    [
                        'category_id' => 5,
                        'name' => 'Hombres',
                        'slug' => Str::slug('Hombres'),
                    ],
                    [
                        'category_id' => 5,
                        'name' => 'Lentes',
                        'slug' => Str::slug('Lentes'),
                    ],
                    [
                        'category_id' => 5,
                        'name' => 'Relojes',
                        'slug' => Str::slug('Relojes'),
                    ],
                ];

                foreach ($subcategories as $subcategory){
                    Subcategory::factory(1)->create($subcategory);
                }
            }
        }
1. Crear factory para el modelo **Subcategory**:
    + $ php artisan make:factory SubcategoryFactory
1. Programar el método **definition** del factory **database\factories\SubcategoryFactory.php**:
    >
        public function definition()
        {
            return [
                'image' => 'subcategories/' . $this->faker->image('public/storage/subcategories', 640, 480, null, false)
            ];
        }
1. Modificar el método **run** del seeder **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            // Borra y crea la carpeta products
            Storage::deleteDirectory('categories');
            Storage::deleteDirectory('subcategories');
            Storage::makeDirectory('categories');
            Storage::makeDirectory('subcategories');

            $this->call(UserSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(SubcategorySeeder::class);
        }
1. Reestablecer base de datos y ejecutar los seeder:
    + php artisan migrate:fresh --seed


### Video 10. Insertar registros en la tabla brands
1. Programar el método **definition** del factory **database\factories\BrandFactory.php**:
    >
        public function definition()
        {
            return [
                'name' => $this->faker->word()
            ];
        }
1. Reprogramar seeder **database\seeders\CategorySeeder.php**:
    > 
        <?php

        namespace Database\Seeders;

        use App\Models\Brand;
        use App\Models\Category;
        use Illuminate\Database\Seeder;
        use Illuminate\Support\Str;

        class CategorySeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $categories = [
                    [
                        'name' => 'Celulares y tablets',
                        'slug' => Str::slug('Celulares y tablets'),
                        'icon' => '<i class="fas fa-mobile-alt"></i>'
                    ],
                    [
                        'name' => 'TV, audio y video',
                        'slug' => Str::slug('TV, audio y video'),
                        'icon' => '<i class="fas fa-tv"></i>'
                    ],
                    [
                        'name' => 'Consola y videojuegos',
                        'slug' => Str::slug('Consola y videojuegos'),
                        'icon' => '<i class="fas fa-gamepad"></i>'
                    ],
                    [
                        'name' => 'Computación',
                        'slug' => Str::slug('Computación'),
                        'icon' => '<i class="fas fa-laptop"></i>'
                    ],
                    [
                        'name' => 'Moda',
                        'slug' => Str::slug('Moda'),
                        'icon' => '<i class="fas fa-tshirt"></i>'
                    ]
                ];

                foreach ($categories as $category){
                    $category = Category::factory(1)->create($category)->first();
                    $brands = Brand::factory(4)->create();
                    foreach ($brands as $brand) {
                        $brand->categories()->attach($category->id);
                    }
                }
            }
        }
1. Agregar relación entre los módelos **Brand** y **Category** y **Brand** y **Products** en **app\Models\Brand.php**:
    >
        class Brand extends Model
        {
            use HasFactory;

            protected $fillable = [
                'name'
            ];

            // Relación 1:n (brands - products)
            public function products(){
                return $this->hasMany(Product::class);
            }

            // Relación n:n (brands - categories)
            public function categories(){
                return $this->belongsToMany(Category::class);
            }
        }
1. Ejecutar:
    + $ php artisan migrate:fresh --seed


### Video 11. Insertar registros a la tabla products
1. Definir constantes **BORRADOR** y **PUBLICADO** en el modelo **app\Models\Product.php**:
    >
        class Product extends Model
        {
            use HasFactory;

            const BORRADOR = 1;
            const PUBLICADO = 2;
            ≡
1. Agregar campo **status** y permitir valores nulos en el campo **quantity** en la migración **database\migrations\2021_06_28_112953_create_products_table.php**:
    >
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
    Importar el modelo **Product**:
    + use App\Models\Product;
1. Programar método **definition** del factory **database\factories\ProductFactory.php**:
    >
        public function definition()
        {
            $name = $this->faker->sentence(2);
            $subcategory = Subcategory::all()->random();
            $category = $subcategory->category;
            $brand = $category->brands->random();

            if($subcategory->color){
                $quantity = null;
            }else{
                $quantity = 15;
            }

            return [
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $this->faker->text(),
                'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
                'subcategory_id' => $subcategory->id,
                'brand_id' => $brand->id,
                'quantity' => $quantity,
                'status' => 2
            ];
        }
    Importar:
    + use Illuminate\Support\Str;
    + use App\Models\Subcategory;
1. Programar el seeder **database\seeders\ProductSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use App\Models\Product;
        use Illuminate\Database\Seeder;

        class ProductSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                Product::factory(250)->create();
            }
        }
1. Incluir el factory de productos en el método **run** en **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            // Borra y crea la carpeta products
            Storage::deleteDirectory('categories');
            Storage::deleteDirectory('subcategories');
            Storage::makeDirectory('categories');
            Storage::makeDirectory('subcategories');

            $this->call(UserSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(SubcategorySeeder::class);
            $this->call(ProductSeeder::class);
        }
1. Ejecutar las migraciones con los seeder:
    + $ php artisan migrate:fresh --seed


### Video 12. Insertar registros en la tabla colors
1. Programas seeder **database\seeders\ColorSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use App\Models\Color;
        use Illuminate\Database\Seeder;

        class ColorSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $colors = [
                    'white',
                    'blue',
                    'red',
                    'black'
                ];

                foreach ($colors as $color) {
                    Color::create([
                        'name' => $color
                    ]);
                }
            }
        }
    Importar el modelo **Color**:
    + use App\Models\Color;
1. Crear seeder para la tabla intermedia **color_product**:
    + $ php artisan make:seeder ColorProductSeeder
1. Programar el seeder **database\seeders\ColorProductSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use Illuminate\Database\Eloquent\Builder;
        use App\Models\Product;

        class ColorProductSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $products = Product::whereHas('subcategory', function(Builder $query){
                    $query->where('color', true)
                            ->where('size', false);
                })->get();
                foreach ($products as $product) {
                    $product->colors()->attach([
                        1 => [
                            'quantity' => 10
                        ],
                        2 => [
                            'quantity' => 10
                        ],
                        3 => [
                            'quantity' => 10
                        ],
                        4 => [
                            'quantity' => 10
                        ]
                    ]);
                }
            }
        }
1. Incluir **ColorSeeder** y **ColorProductSeeder** en el método **run** en **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            // Borra y crea la carpeta products
            Storage::deleteDirectory('categories');
            Storage::deleteDirectory('subcategories');
            Storage::makeDirectory('categories');
            Storage::makeDirectory('subcategories');

            $this->call(UserSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(SubcategorySeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(ColorSeeder::class);
            $this->call(ColorProductSeeder::class);
        }
1. Ejecutar las migraciones con los seeder:
    + $ php artisan migrate:fresh --seed
 

### Video 13. Insertar registros de tallas
1. Crear seeder para tallas:
    + $ php artisan make:seeder SizeSeeder
1. Programar el nuevo seeder **database\seeders\SizeSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use Illuminate\Database\Eloquent\Builder;
        use App\Models\Product;

        class SizeSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $products = Product::whereHas('subcategory', function(Builder $query){
                    $query->where('color', true)
                            ->where('size', true);
                })->get();
                $sizes = [
                    'Talla S',
                    'Talla M',
                    'Talla L'
                ];
                foreach ($products as $product) {
                    foreach ($sizes as $size) {
                        $product->sizes()->create([
                            'name' => $size
                        ]);
                    }
                }
            }
        }
1. Incluir el **SizeSeeder** en el método **run** de **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            ≡
            $this->call(SizeSeeder::class);
        }
1. Modificar método **run** del seeder **database\seeders\SubcategorySeeder.php**:
    >
        public function run()
        {
            $subcategories = [
                /* Celulares y tablets */
                ≡

                /* Consola y videojuegos */
                ≡

                /* Computación */
                ≡

                /* Moda */
                [
                    'category_id' => 5,
                    'name' => 'Mujeres',
                    'slug' => Str::slug('Mujeres'),
                    'color' => true,
                    'size' => true
                ],
                [
                    'category_id' => 5,
                    'name' => 'Hombres',
                    'slug' => Str::slug('Hombres'),
                    'color' => true,
                    'size' => true
                ],
                ≡,
            ];
            ≡
        }
1. Ejecutar las migraciones con los seeder:
    + $ php artisan migrate:fresh --seed


### Video 14. Descargar imágenes para los productos
1. Programar el método **definition** del factory **database\factories\ImageFactory.php**:
    >
        public function definition()
        {
            return [
                'url' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false)
            ];
        }
1. Modificar el método **run** del seeder **database\seeders\ProductSeeder.php**:
    >
        public function run()
        {
            Product::factory(250)->create()->each(function(Product $product){
                Image::factory(4)->create([
                    'imageable_id' => $product->id,
                    'imageable_type' => Product::class
                ]);
            });
        }
    Importar el modelo **Image**:
    + use App\Models\Image;
1. Programar creación de la carpeta **products** en el método **run** del seeder **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            // Borra y crea la carpeta products
            Storage::deleteDirectory('categories');
            Storage::deleteDirectory('subcategories');
            Storage::deleteDirectory('products');
            Storage::makeDirectory('categories');
            Storage::makeDirectory('subcategories');
            Storage::makeDirectory('products');

            $this->call(UserSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(SubcategorySeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(ColorSeeder::class);
            $this->call(ColorProductSeeder::class);
            $this->call(SizeSeeder::class);
        }
1. Ejecutar las migraciones con los seeder:
    + $ php artisan migrate:fresh --seed


## Sección 4: Ajustes de estilos


### Video 15. Agregar colores
1. 




### Video 16. Diseñar plantilla

