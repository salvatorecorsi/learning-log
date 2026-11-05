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
php artisan migrate:status
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

## Templating
Quando vai a lavorare sul output, sta tutto in `resources/views/`, qui dentro c'è anche eventualmente altre cartelle:
```
layouts
components
partials
```
### Layout
Di base utilizzi `@yield` per prendere pezzi di codice da altre parti, come ad esempio `@yield('content')` (get_the_content...), il file del layout va dentro `/layout`  (ad esempio `page.blade.php`)
Quando poi, vuoi costruire una pagina nuova (tipo home) che richiama il layout vai di:

```home.blade.php
@extends('layouts.page')
@section('the-content')
    <h1>we</h1>
@endsection
```

e nel layout
```layouts/page.blade.php
<!DOCTYPE html>
<html lang="en">

<body>
    <x-header-custom />
    <div class="content">
        @yield('the-content')
    </div>
</body>
```

Potenzialmente poi, se vuoi passarti delle props dal router:
```routes/web.php
Route::get('/', function () {
    $pageTitle = 'Home page';
    $description = 'La descrizione';
    return view('home', compact('pageTitle', 'description'));
});
```

ps: compact di php, converte in oggetto


### Partials
Da quanto ho trovato, sembra il vecchio modo di dichiarare componenti con, `@include('partials.{name}')` e ti carica quel partial lì, che devee anch'esso essere scritto con `{name}.blade.php`, per convenzione vanno a finire nella cartella `/partials` o `/shared`

### Components (preferisco)
Richiami il componente con `<x-{name} />` e opzionalmente `<x-{name} props="">` è praticamente vue, e metti tutto dentro `/components`


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

## Errori di tutti i giorni

### Syntax error durante il primo migrate
Praticamente facendo il primo migrate, molto probabilmente avrai un errore tipo Syntax error or access violation: 1071 Specified key was too long; max key... bene è che non hai messo `'engine' => env('DB_ENGINE', 'InnoDB'),`

### Se cancelli i file default di migration
```
   php artisan make:session-table
   php artisan make:cache-table
   php artisan make:queue-table
```

e rinomina in `0001_01_01_000000_` i vari prefissi