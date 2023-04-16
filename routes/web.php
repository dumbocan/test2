<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoatsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ManagementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/boats',[BoatsController::class,'show'])->name('boats');
Route::get('/clients',[clientsController::class,'show'])->name('clients');
Route::get('/clients/newclient',[clientsController::class,'newclient'])->name('clients.newclient');

Route::get('/projects',[projectsController::class,'show'])->name('projects');
Route::get('/management',[managementController::class,'show'])->name('management');
});
require __DIR__.'/auth.php';
