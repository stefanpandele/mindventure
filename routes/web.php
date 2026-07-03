<?php

use App\Http\Controllers\BookSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/about', 'About')->name('about');
Route::inertia('/ib-math', 'IbMath')->name('ib-math');
Route::inertia('/ib-ia', 'IbIa')->name('ib-ia');
Route::inertia('/junior', 'Junior')->name('junior');
Route::inertia('/contact', 'Contact')->name('contact');

Route::get('/locale/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['ro', 'en'], true), 400);

    session(['locale' => $locale]);

    return back();
})->name('locale.switch');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/faq/ask', [FaqController::class, 'ask'])->name('faq.ask');
Route::post('/book-session', BookSessionController::class)->name('book-session');
