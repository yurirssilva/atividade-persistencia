<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
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


Route::resource('disciplinas', DisciplinaController::class)->only([
    'index', 'create', 'store', 'show'
]);

Route::group(['prefix' => 'disciplinas'], function () {
    Route::post('update/{id}', [DisciplinaController::class, 'update']);
    Route::get('delete/{id}', [DisciplinaController::class, 'destroy']);
});

Route::resource('cursos', CursoController::class)->only([
    'index', 'create', 'store', 'show'
]);

Route::group(['prefix' => 'cursos'], function () {
    Route::post('update/{id}', [CursoController::class, 'update']);
    Route::get('delete/{id}', [CursoController::class, 'destroy']);
    Route::get('{id}/inserirDisciplina', [CursoController::class, 'listarDisciplinas']);
    Route::post('{id}/inserirDisciplina', [CursoController::class, 'inserirDisciplina']);
    Route::get('{id}/removerDisciplina/{idDisciplina}', [CursoController::class, 'removerDisciplina']);
});

Route::resource('alunos', AlunoController::class)->only([
    'index', 'create', 'store', 'show'
]);

Route::group(['prefix' => 'alunos'], function () {
    Route::post('update/{id}', [AlunoController::class, 'update']);
    Route::get('delete/{id}', [AlunoController::class, 'destroy']);
});
