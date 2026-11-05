# Appuntini

## Comandi

Per iniziare

```
composer create-project --prefer-dist laravel/laravel project-name
php artisan serve
php artisan migrate
php artisan migrate:rollback
php artisan migrate:rollback --step=2
php artisan migrate:fresh
```

while
```
php artisan make:migration create_{name}_table
php artisan make:controller NameController
```

## Config
Conviene andare in `.env` e mettere `DB_CONNECTION=mysql`
e poi siccome può dare un problema di lunghezza caratteri durante la creazione è meglio specificare in `/config/database.php`
`'engine' => env('DB_ENGINE', 'InnoDB'),`
poi magari fai un `php artisan migrate:fresh` e `php artisan migrate`

## Migrations
Praticamente sono dei file che determinano la struttura dati, li crei con `php artisan make:migration create_{name}_table` indicando il nome della tabella. Una volta fatto di mette dentro `database/migrations/` il `yyyy_mm_dd_timestamp_create_{name}_table.php` e qui, è possibile dichiarare le funzioni di creazione e distruzioni della tabella, esempio:

```
...
    public function up(): void
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
     
    }

    public function down(): void
    {
        Schema::dropIfExists('test');
    }

```

[Lo schema Blueprint](https://api.laravel.com/docs/8.x/Illuminate/Database/Schema/Blueprint.html) è utile per vedere la lista di funzioni comode che aiutano a configurare già il DB. Occhio che alcuni metodi possono creare [molteplici campi](https://api.laravel.com/docs/8.x/Illuminate/Database/Schema/Blueprint.html#method_timestamps)