<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); // Rota para a página inicial que lista os usuários
Route::get("/events/create", [EventController::class, "create"])->middleware('auth'); // Rota para criar eventos, protegida por autenticação
Route::post("/events",[EventController::class, "store"])->middleware('auth'); // Rota para armazenar eventos, protegida por autenticação
Route::get("/events/{id}", [EventController::class, "show"])->middleware('auth'); // Rota para mostrar detalhes de um evento, protegida por autenticação
Route::get("/events/{id}/info", [EventController::class, "info"])->middleware('auth'); // Rota para mostrar informações do usuário autenticado, protegida por autenticação
Route::get("/events/{id}/edit", [EventController::class, "edit"])->middleware('auth')->name('events.edit'); // Rota para editar eventos, protegida por autenticação
Route::delete("/events/{id}", [EventController::class, "destroy"])->middleware('auth')->name('events.destroy'); // Rota para deletar eventos, protegida por autenticação
Route::put("/events/{id}", [EventController::class, "update"])->middleware('auth')->name('events.update'); // Rota para atualizar eventos, protegida por autenticação


Route::get('/sobre', function (){
    // Rota para a página "Sobre"
    // Retorna a view 'sobre'
return view('sobre');
})->name('sobre');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
