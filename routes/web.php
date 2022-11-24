<?php

use App\Http\Livewire\Cliente\ClienteController;
use App\Http\Livewire\Compra\ComprasController;
use App\Http\Livewire\Compra\ComprasfijasController;
use App\Http\Livewire\Compra\ProductosController;
use App\Http\Livewire\Empresa\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home\HomeController;
use App\Http\Livewire\Login\LoginController;
use App\Http\Livewire\Usuario\UsuarioController;
use App\Models\Producto;

Route::get('/', LoginController::class)->name('login');

Route::get('home', HomeController::class)->middleware('auth')->name('home');


Route::get('usuarios', UsuarioController::class)->middleware('auth')->name('usuarios');
Route::get('clientes', ClienteController::class)->middleware('auth')->name('clientes');
Route::get('empresa', EmpresaController::class)->middleware('auth')->name('empresa');
Route::get('compras', ComprasController::class)->middleware('auth')->name('compras');
Route::get('comprafija', ComprasfijasController::class)->middleware('auth')->name('comprafija');
Route::get('productos', ProductosController::class)->middleware('auth')->name('productos');

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');