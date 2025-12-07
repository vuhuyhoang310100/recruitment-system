<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
	return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('dashboard', function () {
		return Inertia::render('dashboard');
	})->name('dashboard');

	Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
	Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
	Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
	Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

	//Routes prefix
	Route::prefix('roles')->group(function () {
		// Add your roles routes here
		Route::get('/', [RoleController::class, 'index'])->name('roles.index');
		Route::post('/', [RoleController::class, 'store'])->name('roles.store');
		Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
		Route::get('/{role}', [RoleController::class, 'show'])->name('roles.show');
		Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
		Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
		Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
		// Add your settings routes here
	});

	Route::prefix('users')->group(function () {
		// Add your users routes here
		Route::get('/', [UserController::class, 'index'])->name('users.index');
		Route::post('/', [UserController::class, 'store'])->name('users.store');
		Route::get('/create', [UserController::class, 'create'])->name('users.create');
		Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
		Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
		Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
		Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
		// Add your settings routes here
	});
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
