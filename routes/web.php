<?php

use App\Http\Controllers\NexagtmController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NexagtmController::class, 'index'])->name('home');
Route::get('/price', [NexagtmController::class, 'price'])->name('nexagtm.price');
Route::get('/contact', [NexagtmController::class, 'contact'])->name('nexagtm.contact');
Route::post('/contact', [NexagtmController::class, 'sendContact'])->name('nexagtm.contact.send');
Route::get('/about', [NexagtmController::class, 'about'])->name('nexagtm.about');
// Route::get('/team',[NexagtmController::class, 'team'])->name('nexagtm.team');
Route::get('/gtm-playbooks', [NexagtmController::class, 'gtmPlaybooks'])->name('nexagtm.gtm-playbooks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
