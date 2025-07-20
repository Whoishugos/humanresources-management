<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PresenceController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// handle employee routes
Route::resource('/employees', EmployeeController::class);
// handle departments routes
Route::resource('/departments', DepartmentController::class);
// handle Roles routes
Route::resource('/roles', RoleController::class);
// handle Presences routes
Route::resource('/presences', PresenceController::class);

// handle task routes
Route::resource('/tasks', TaskController::class);
Route::get('tasks/done/{id}', [TaskController::class,'done'])->name('task.done');
Route::get('tasks/pending/{id}', [TaskController::class,'pending'])->name('task.pending');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
