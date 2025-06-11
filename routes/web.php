<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('tarefas', TarefaController::class);
});

Route::post('/register-admin', function () {
    if (!User::where('email', 'admin@admin.com')->exists()) {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('success', 'Usuário admin criado! Email: admin@admin.com | Senha: 12345678');
    }
    return redirect()->back()->with('error', 'Usuário admin já existe.');
})->name('register-admin');

require __DIR__.'/auth.php';
