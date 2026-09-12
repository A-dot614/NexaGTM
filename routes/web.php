<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CallBookingController;
use App\Http\Controllers\NexagtmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NexagtmController::class, 'index'])->name('home');
Route::get('/price', [NexagtmController::class, 'price'])->name('nexagtm.price');
Route::get('/contact', [NexagtmController::class, 'contact'])->name('nexagtm.contact');
Route::post('/contact', [NexagtmController::class, 'sendContact'])->name('nexagtm.contact.send');
Route::get('/about', [NexagtmController::class, 'about'])->name('nexagtm.about');
// Route::get('/team',[NexagtmController::class, 'team'])->name('nexagtm.team');
Route::get('/gtm-playbooks', [NexagtmController::class, 'gtmPlaybooks'])->name('nexagtm.gtm-playbooks');
Route::get('/book-a-call', [NexagtmController::class, 'bookCall'])->name('nexagtm.book-call');
Route::post('/book-a-call', [NexagtmController::class, 'sendBookCall'])->name('nexagtm.book-call.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/testimonials', [TestimonialController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials');
Route::post('/dashboard/testimonials', [TestimonialController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.store');
Route::get('/dashboard/testimonials/create', [TestimonialController::class, 'create'])

    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.create');

Route::get('/dashboard/testimonials/{testimonial}', [TestimonialController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.show');
Route::get('/dashboard/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.edit');
Route::patch('/dashboard/testimonials/{testimonial}', [TestimonialController::class, 'update'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.update');
Route::delete('/dashboard/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('dashboard.testimonials.destroy');

Route::get('/dashboard/contacts', [ContactController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.contacts');
Route::get('/dashboard/contacts/{contact}', [ContactController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard.contacts.show');
Route::patch('/dashboard/contacts/{contact}', [ContactController::class, 'update'])
    ->middleware(['auth', 'verified'])->name('dashboard.contacts.update');
Route::delete('/dashboard/contacts/{contact}', [ContactController::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('dashboard.contacts.destroy');

Route::get('/dashboard/bookings', [CallBookingController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.bookings');
Route::get('/dashboard/bookings/{booking}', [CallBookingController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard.bookings.show');
Route::patch('/dashboard/bookings/{booking}', [CallBookingController::class, 'update'])
    ->middleware(['auth', 'verified'])->name('dashboard.bookings.update');
Route::delete('/dashboard/bookings/{booking}', [CallBookingController::class, 'destroy'])
    ->middleware(['auth', 'verified'])->name('dashboard.bookings.destroy');

Route::get('/dashboard/analytics', [AnalyticsController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.analytics');

Route::get('/dashboard/audit', [AuditController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard.audit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
