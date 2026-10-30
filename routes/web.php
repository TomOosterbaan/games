<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Iedereen mag het overzicht zien
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/show/{id}', [GameController::class, 'show']);


// Alleen admins mogen games beheren
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/games/create', [GameController::class, 'create']);
    Route::post('/games/store', [GameController::class, 'store']);
    Route::get('/games/edit/{id}', [GameController::class, 'edit']);
    Route::post('/games/update/{id}', [GameController::class, 'update']);
    Route::post('/games/destroy/{id}', [GameController::class, 'destroy']);
});


// Alleen admins mogen de beheeromgeving gebruiken
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('permissions', PermissionController::class)->except('show');
    Route::resource('roles', RoleController::class)->except('show');

    Route::get('role-permissions', [RolePermissionController::class, 'index'])->name('role-permissions.index');
    Route::get('role-permissions/create', [RolePermissionController::class, 'create'])->name('role-permissions.create');
    Route::post('role-permissions', [RolePermissionController::class, 'store'])->name('role-permissions.store');
    Route::delete('role-permissions/{role}/{permission}', [RolePermissionController::class, 'destroy'])->name('role-permissions.destroy');

    Route::get('user-roles', [UserRoleController::class, 'index'])->name('user-roles.index');
    Route::get('user-roles/create', [UserRoleController::class, 'create'])->name('user-roles.create');
    Route::post('user-roles', [UserRoleController::class, 'store'])->name('user-roles.store');
    Route::delete('user-roles/{user}/{role}', [UserRoleController::class, 'destroy'])->name('user-roles.destroy');
});


// Alleen admins mogen de geheime pagina zien
Route::get('/geheim', function () {
    return view('geheim');
})->middleware(['auth', 'role:admin']);


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';