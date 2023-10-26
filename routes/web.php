
<?php


use App\Http\Controllers\CoursController;
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