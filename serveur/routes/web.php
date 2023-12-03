<?php
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // Assurez-vous que cela pointe vers votre fichier Blade principal ou votre point d'entrée React.
})->where('any', '.*');
