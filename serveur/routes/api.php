<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Authentification;
use App\Http\Controllers\GeolocationController;

//Routes CRUD modèle Eloquent Laravel
Route::resources([
    'alertes' => AlerteController::class,
    'commentaires' => CommentaireController::class,
    'concerts' => ConcertController::class,
    'genres' => GenreController::class,
    'lieux' => LieuController::class,
    'partenaires' => PartenaireController::class,
    'preferences' => PreferenceController::class,
    'scenes' => SceneController::class,
    'utilisateurs' => UtilisateurController::class,
    'geo' => GeolocationController::class,
    
]);

//Routes Wordpress
Route::prefix('wordpress')->group(function () {
    Route::get('/posts', 'WordPressController@getPosts');
});


//Route Middleware
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


