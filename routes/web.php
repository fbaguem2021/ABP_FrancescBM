<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicleController;
use App\Http\Controllers\CursController;
use App\Http\Controllers\ModulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('cicle', CicleController::class);
Route::resource('curs',  CursController::class, ['parameters' => ['curs'=>'curs']]);
Route::resource('modul', ModulController::class);

Route::get('/', function() {
    return view('index');
})->name('home');

/*
Route::get('/cursos', function() {
    $cursos = [
        new Curs(1, 'DAW1A', 'Desenvolupament Aplicacions Web de primer matí A', 'DAW'),
        new Curs(2, 'DAW2A', 'Desenvolupament Aplicacions Web de segon matí A', 'DAW'),
        new Curs(3, 'DAW2B', 'Desenvolupament Aplicacions Web de segon matí B', 'DAW')
    ];
    return view('cursos.index', compact('cursos'));
})->name('cursos');
*/