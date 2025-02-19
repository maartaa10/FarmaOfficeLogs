# PAS 1

### He creat la db farma_office_logs i la gestiono amb phpmyadmin

![alt text](image.png)

### He creat el projecte FarmaOfficeLogs amb

```sh
composer create-project --prefer-dist laravel/laravel FarmaOfficeLogs

```

### He creat la migracio per crear la taula logs_precios:

```sh
 Schema::create('logs_precios', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('pharmacy_id');
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2);
            $table->integer('old_stock')->nullable();
            $table->integer('new_stock')->default(0);
            $table->string('source');
            $table->timestamp('change_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });

```

### Creo el model Metric amb els seus atributs

### Creo el repositori i la interficie:

```sh
mkdir -p app/Repositories/Interfaces
```

Treballar amb Repository Pattern em servira per mantenir el codi flexible i net aixi si he de canviar algo no es desmuntara tot, sera mes facil canviarho

### MetricMysqlRepository.php 

Aquest fitxer implementa el repositori per accedir directament a la bd i es on es realitza la interaccio amb el model de la bd 



###  MetricService.php
Aquest fitxer conte la logica de negoci que procesa les validacions abans de que les dades arribin al repositori. Es important perque separa la logica de negoci del controlador i de l'acces a dades

Aqui valido les dades i despres crido al repositori per guardar la informacio en la bd
