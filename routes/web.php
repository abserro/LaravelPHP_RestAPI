<?php

use App\Http\ApiV1\Modules\BoardGames\Controllers\BoardGamesController;
use App\Http\ApiV1\Modules\GameGenres\Controllers\GameGenresController;
use App\Http\ApiV1\Modules\Genres\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*BoardGames*/
Route::get('/api/v1/boardgames/orderByDateAsc', [BoardGamesController::class, 'allByOrderDateAsc']);
Route::get('/api/v1/boardgames/orderByDateDesc', [BoardGamesController::class, 'allByOrderDateDesc']);
Route::post('/api/v1/boardgames', [BoardGamesController::class, 'create']);
Route::patch('/api/v1/boardgames/{game_id}', [BoardGamesController::class, 'patch']);
Route::put('/api/v1/boardgames/{game_id}', [BoardGamesController::class, 'replace']);
Route::delete('/api/v1/boardgames/{game_id}', [BoardGamesController::class, 'delete']);
Route::get('/api/v1/boardgames/{game_id}', [BoardGamesController::class, 'get']);
Route::get('/api/v1/boardgames', [BoardGamesController::class, 'getAll']);

/*Genres*/
Route::get('/api/v1/genres', [GenresController::class, 'getAll']);
Route::post('/api/v1/genres', [GenresController::class, 'create']);
Route::get('/api/v1/genres/{game_id}', [GenresController::class, 'get']);
Route::delete('/api/v1/genres/{game_id}', [GenresController::class, 'delete']);
Route::patch('/api/v1/genres/{game_id}', [GenresController::class, 'patch']);
Route::put('/api/v1/genres/{game_id}', [GenresController::class, 'replace']);
Route::get('/api/v1/genres/allByOrderNameAsc', [GenresController::class, 'allByOrderNameAsc']);
Route::get('/api/v1/genres/allByOrderNameDesc', [GenresController::class, 'allByOrderNameDesc']);

/*GameGenre*/
Route::post('/api/v1/gameGenres', [GameGenresController::class, 'create']);
Route::put('/api/v1/gameGenres/{id}', [GameGenresController::class, 'replace']);
Route::delete('/api/v1/gameGenres/{id}', [GameGenresController::class, 'delete']);
Route::get('/api/v1/gameGenres', [GameGenresController::class, 'getAll']);
Route::get('/api/v1/gameGenres/{id}', [GameGenresController::class, 'get']);
Route::get('/api/v1/gameGenres/boardGame/{game_id}', [GameGenresController::class, 'allByGameId']);
Route::get('/api/v1/gameGenres/genre/{genre_id}', [GameGenresController::class, 'allByGenreId']);
Route::post('/api/v1/gameGenres/genre/{genre_id}/boardGame/{game_id}', [GameGenresController::class, 'createRelation']);

/*Manufacturers*/
