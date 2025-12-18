<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    $totalProductos = \App\Models\Producto::count();
    $totalCategorias = \App\Models\Category::count();
    $totalUsuarios = \App\Models\User::count();
    $ultimosProductos = \App\Models\Producto::with('category')->latest()->take(5)->get();
    
    return view('dashboard', compact('totalProductos', 'totalCategorias', 'totalUsuarios', 'ultimosProductos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas del Panel Administrativo
    Route::resource('productos', ProductoController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('users', UserAdminController::class)->only(['index']);
});

Route::get('/setup-admin', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\AdminUserSeeder']);
        return '¡Administrador creado! <br>Email: <b>admin@ds.com</b><br>Contraseña: <b>password</b><br><a href="/login">Ir al Login</a>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
