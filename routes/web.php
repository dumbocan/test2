<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoatsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\SearchController;

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

Route::resource('clients', ClientsController::class);
Route::resource('boats',BoatsController::class)->except(['show']);
Route::resource('projects',ProjectsController::class)->except(['show']);

Route::post('/search', [SearchController::class,'show'])->name('search');

Route::get('/management',[managementController::class,'show'])->name('management');
});

require __DIR__.'/auth.php';



/*
Route::get('/clients',[clientsController::class,'index'])->name('clients');
Route::get('/clients/create',[clientsController::class,'create'])->name('clients.create');
Route::post('/clients/store',[clientsController::class,'store'])->name('clients.store');
Route::get('/clients/{client_id}/edit' ,[clientsController::class,'edit'])->name('clients.edit');
Route::put('/clients/{client_id}', [clientsController::class,'update'])->name('clients.update');
Route::delete('/clients/{client_id}' ,[clientsController::class,'destroy'])->name('clients.destroy');
*/
