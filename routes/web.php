<?php
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


Route::prefix('admin')->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::patch('/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::patch('/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
});