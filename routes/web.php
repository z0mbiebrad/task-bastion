<?php

use App\Livewire\TaskCreate;
use App\Livewire\TaskIndex;
use App\Livewire\GuestTaskIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', TaskIndex::class)
    ->name('guest.task.index');

Route::middleware('auth')->group(function () {
        Route::get('task-index', TaskIndex::class)
        ->name('task.index');
});

require __DIR__.'/auth.php';
