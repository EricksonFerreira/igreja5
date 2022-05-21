<?php

use App\Http\Controllers\MembroController;
use App\Http\Controllers\CultoController;
use App\Http\Controllers\PresencaCultoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resources([
    'membro' => MembroController::class,
    'culto' => CultoController::class,
    'presencaculto' => PresencaCultoController::class,
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/membro/alterastatus/{id}', [App\Http\Controllers\MembroController::class, 'alteraStatus'])->name('membro.alterastatus');
Route::get('/membro/alterastatus/{id}', [App\Http\Controllers\MembroController::class, 'alterastatusMembro'])->name('membro.alterastatus');

Route::get('/culto/listacomparecimento/alterastatus/{id}', [App\Http\Controllers\CultoController::class, 'alterastatusListacomparecimento'])->name('culto.listacomparecimentoAlterastatus');
Route::get('/culto/alterastatus/{id}', [App\Http\Controllers\CultoController::class, 'alterastatusCulto'])->name('culto.alterastatus');
Route::get('/culto/listacomparecimento/{data}/{dia}', [App\Http\Controllers\CultoController::class, 'listacomparecimento'])->name('culto.listacomparecimento');
