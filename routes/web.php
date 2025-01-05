<?php

use App\Livewire\TaskCreate;
use App\Livewire\TaskIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
        Route::get('task-index', TaskIndex::class)
        ->name('task.index');
});

require __DIR__.'/auth.php';
