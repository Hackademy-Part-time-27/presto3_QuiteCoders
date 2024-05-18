<?php

use App\Http\Controllers\FrontController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::get('/contatti', [ContactController::class, 'viewForm'])->name('contacts');
Route::post('/contatti/send', [ContactController::class, 'send'])->name('contacts.send');

Route::get('/chi-sono', [PageController::class, 'aboutMe'])->name('about-me');


Route::prefix('account')->middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');

});



Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])
->name('category.show');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')
->name('announcements.create');

Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])
->name('announcements.show');

Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])
->name('announcements.index');
