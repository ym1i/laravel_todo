<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/folders/create', [FolderController::class, 'create'])->name('folders.create');
Route::post('/folders/create', [FolderController::class, 'store']);
Route::get('/folders/{id}/edit', [FolderController::class, 'edit'])->name('folders.edit');
Route::post('/folders/{id}/edit', [FolderController::class, 'update']);
Route::get('/folders/{id}/delete', [FolderController::class, 'delete'])->name('folders.delete');
Route::post('/folders/{id}/delete', [FolderController::class, 'destroy']);

Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/folders/{id}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [TaskController::class, 'store']);
Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'update']);
Route::get('/folders/{id}/tasks/{task_id}/delete', [TaskController::class, 'delete'])->name('tasks.delete');
Route::post('/folders/{id}/tasks/{task_id}/delete', [TaskController::class, 'destroy']);


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
