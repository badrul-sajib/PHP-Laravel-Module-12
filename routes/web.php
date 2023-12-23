<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;

Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');

Route::get('', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/show', [TicketController::class, 'show'])->name('tickets.show');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');