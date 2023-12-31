<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Rotas dos professores
    Route::resource('professors', ProfessorController::class)->except('show', 'destroy');
    Route::delete('/professors/{professor}', [ProfessorController::class, 'destroy'])->name('professors.destroy');

    // Rotas das mensagens
    Route::resource('messages', MessageController::class)->except('show');
    Route::get('/professors/messages/{message}', [MessageController::class, 'show'])->name('professors.messages.show');
    Route::put('/professors/messages/{message}/mark-as-responded', [MessageController::class, 'markAsResponded'])->name('messages.markAsResponded');
    Route::get('/professors/my-messages', [MessageController::class, 'professorMessages'])->name('messages.professor');
    Route::get('/professors/all-pending-messages', [ProfessorController::class, 'allPendingMessages'])->name('professors.allPendingMessages');
    Route::get('/professors/all-responded-messages', [ProfessorController::class, 'allRespondedMessages'])->name('professors.allRespondedMessages');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
