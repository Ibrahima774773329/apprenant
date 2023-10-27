
<?php


use App\Http\Controllers\CoursController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;



Route::controller(CoursController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/cours/create', 'create');
    Route::get('/cours/{id}', 'show');
    Route::get('/cours/{id}/edit', 'edit');


    Route::post('/cours', 'store');
    Route::patch('/cours/{id}', 'update');
    Route::delete('/cours/{id}', 'destroy');

});
Route::controller(EtudiantController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/etudiant/create', 'create');
    Route::get('/etudiant/{id}', 'show');
    Route::get('/etudiant/{id}/edit', 'edit');


    Route::post('/etudiant', 'store');
    Route::patch('/etudiant/{id}', 'update');
    Route::delete('/etudiant/{id}', 'destroy');

});
Route::controller(ProfesseursController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/professeur/create', 'create');
    Route::get('/professeur/{id}', 'show');
    Route::get('/professeur/{id}/edit', 'edit');


    Route::post('/professeur', 'store');
    Route::patch('/professeur/{id}', 'update');
    Route::delete('/professeur/{id}', 'destroy');

});