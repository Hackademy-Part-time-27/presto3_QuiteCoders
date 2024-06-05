<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
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

Route::get('/revisor/home', [RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/invio/form' , [RevisorController::class, 'formRevisor'])->middleware('auth')->name('form.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

Route::post('/lingua{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');



