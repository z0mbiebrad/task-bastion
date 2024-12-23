<?php

use App\Livewire\TaskCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('task-create', TaskCreate::class)
        ->name('task.create');
});

require __DIR__.'/auth.php';
