<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\LeaveController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['CheckRole:HR,Developer,Finance']);

Route::middleware('auth')->group(function () {
    // handle employee routes
    Route::resource('/employees', EmployeeController::class)->middleware(['CheckRole:HR']);
    // handle departments routes
    Route::resource('/departments', DepartmentController::class)->middleware(['CheckRole:HR']);
    // handle Roles routes
    Route::resource('/roles', RoleController::class)->middleware(['CheckRole:HR']);
    // handle Presences routes
    Route::resource('/presences', PresenceController::class)->middleware(['CheckRole:HR,Developer,Finance']);
    // handle Presences routes
    Route::resource('/payrolls', PayrollController::class)->middleware(['CheckRole:HR,Developer,Finance']);
    Route::get('/payrolls/{id}/edit', [PayrollController::class, 'edit'])->name('payrolls.edit')->middleware(['CheckRole:HR']);
    // handle Presences routes
    Route::resource('/leaves', LeaveController::class)->middleware('CheckRole:HR,Developer,Finance');
    Route::get('/leaves/approved/{id}', [LeaveController::class, 'approved'])->name('leaves.approved')->middleware(['CheckRole:HR']);
    Route::get('/leaves/reject/{id}', [LeaveController::class, 'reject'])->name('leaves.reject')->middleware(['CheckRole:HR']);
    // handle task routes
    Route::resource('/tasks', TaskController::class)->middleware(['CheckRole:HR,Developer,Finance']);
    Route::get('tasks/done/{id}', [TaskController::class,'done'])->name('task.done')->middleware(['CheckRole:HR,Developer,Finance']);
    Route::get('tasks/pending/{id}', [TaskController::class,'pending'])->name('task.pending')->middleware(['CheckRole:HR,Developer,Finance']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
