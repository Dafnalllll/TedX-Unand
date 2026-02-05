<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TrackVisitor;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sponsorship', function () {
    return view('pages.sponsorship');
})->name('sponsorship');


Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/events', [EventController::class, 'events'])->name('events');


Route::get('/events/main-event', [EventController::class, 'mainEventPage'])->name('events.main');

Route::get('/events/pre-event', [EventController::class, 'preeventPage'])->name('events.pre');


// Admin Routes
Route::middleware(['auth', TrackVisitor::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

    // Event Admin Routes
    Route::prefix('/admin/event')->name('dashboard.events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('event');           // /admin/event
        Route::get('/create', [EventController::class, 'create'])->name('event.create');   // /admin/event/create
        Route::post('/store', [EventController::class, 'store'])->name('event.store');     // /admin/event/store
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');    // /admin/event/edit/{id}
        Route::put('/update/{id}', [EventController::class, 'update'])->name('event.update'); // /admin/event/update/{id}
        Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('event.delete'); // /admin/event/delete/{id}
    });

    // Shop Admin Routes
    Route::prefix('/admin/shop')->name('dashboard.shop.')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('shop.index');           // /admin/shop
        Route::get('/create', [ShopController::class, 'create'])->name('shop.create');   // /admin/shop/create
        Route::post('/store', [ShopController::class, 'store'])->name('shop.store');     // /admin/shop/store
        Route::get('/edit/{id}', [ShopController::class, 'edit'])->name('shop.edit');    // /admin/shop/edit/{id}
        Route::put('/update/{id}', [ShopController::class, 'update'])->name('shop.update'); // /admin/shop/update/{id}
        Route::delete('/delete/{id}', [ShopController::class, 'destroy'])->name('shop.delete'); // /admin/shop/delete/{id}
    });

    // Speaker Admin Routes
    Route::prefix('/admin/speaker')->name('dashboard.speaker.')->group(function () {
        Route::get('/', [SpeakerController::class, 'index'])->name('speaker');           // /admin/speaker/index
        Route::get('/create', [SpeakerController::class, 'create'])->name('speaker.create');        // /admin/speaker/create
        Route::post('/store', [SpeakerController::class, 'store'])->name('speaker.store');          // /admin/speaker/store
        Route::get('/edit/{id}', [SpeakerController::class, 'edit'])->name('speaker.edit');         // /admin/speaker/edit/{id}
        Route::put('/update/{id}', [SpeakerController::class, 'update'])->name('speaker.update');   // /admin/speaker/update/{id}
        Route::delete('/delete/{id}', [SpeakerController::class, 'destroy'])->name('speaker.delete'); // /admin/speaker/delete/{id}
    });
});


Route::get('/login', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';

// Catch-all route for 404
Route::fallback(function () {
    return response()->view('pages.notfound', [], 404);
});
