<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ContractController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registration\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/step/{step}', [RegistrationController::class, 'showStep'])->name('register.step');
Route::post('/register/step/{step}', [RegistrationController::class, 'processStep']);
Route::get('/register/complete', [RegistrationController::class, 'complete'])->name('register.complete');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function(){
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');
    Route::get('/index', [ClientController::class, 'index'])->name('index');
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('show');
    Route::get('/contrat/index', [ContractController::class, 'index'])->name('contrat.index');
    Route::get('/contrat/show/{id}', [ContractController::class, 'show'])->name('contrat.show');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

require __DIR__.'/auth.php';