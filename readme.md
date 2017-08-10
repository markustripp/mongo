# Laravel Package for MongoDB support

See [Laravel 5.5 Package Development](https://medium.com/@markustripp/laravel-5-5-package-development-e72f3e7a8f38)

## Quick Start Guide

- Create a Laravel 5.5 project: `composer create-project laravel/laravel myproject dev-develop`
- `cd myproject`
- Add dependency: `composer require markustripp/mongo`
- Copy configuration: `php artisan vendor:publish`

Now you are ready to use the Mongo Facace, e.g. open routes/web.php:

``` PHP
<?php

Route::get('mongo', function(Request $request) {
    $collection = Mongo::get()->mydatabase->mycollection;
    return $collection->find()->toArray();
});

Route::get('/', function () {
    return view('welcome');
});

```

Add a document to mycollection in mydatabase and open the browser at http://myproject.dev/mongo
