<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 認証済の画面
Route::middleware(['auth', 'verified'])->group(function () {
    // ダッシュボード画面
    Route::get('/dashboard', function () { return Inertia::render('Dashboard'); })->name('dashboard');
    // チケット 作成
    Route::get('/dashboard/ticket/new', function() { return Inertia::render('TicketEditor'); })->name('ticket.create');
    // チケット 詳細
});

require __DIR__.'/auth.php';
