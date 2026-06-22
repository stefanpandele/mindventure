<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/ib-math', 'IbMath')->name('ib-math');

Route::get('/locale/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['ro', 'en'], true), 400);

    session(['locale' => $locale]);

    return back();
})->name('locale.switch');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
