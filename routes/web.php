<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PresentationsController;
use Illuminate\Support\Facades\Route;


Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
   // page routes
   Route::get('/', [PagesController::class, 'index'])->name('home');
   Route::get('/about', [PagesController::class, 'about'])->name('about');

   Route::get('/notifications', [PagesController::class, 'notifications'])->name('notifications');

   Route::get('/account/activities', [PagesController::class, 'accountActivities'])->name('account.activities');
   Route::get('/account/booked-books', [PagesController::class, 'accountBookedBooks'])->name('account.bookedBooks');
   Route::get('/account/presentation', [PagesController::class, 'accountPresentation'])->name('account.presentation');
   Route::get('/account/profile', [PagesController::class, 'accountProfile'])->name('account.profile');
   Route::get('/account/read-books', [PagesController::class, 'accountReadBooks'])->name('account.readBooks');
   Route::get('/account/readers', [PagesController::class, 'accountReaders'])->name('account.readers');

   Route::get('/activities', [PagesController::class, 'activities'])->name('activities');
   Route::get('/activities/read/{id}', [PagesController::class, 'activitiesRead'])->name('activities.read');

   Route::get('/books', [PagesController::class, 'books'])->name('books');
   Route::get('/books/read/{id}', [PagesController::class, 'booksRead'])->name('books.read');
   Route::get('/books/categories', [PagesController::class, 'booksCategories'])->name('books.categories');

   Route::get('/presentations', [PagesController::class, 'presentations'])->name('presentations');

   Route::get('/ratings/active-reader', [PagesController::class, 'ratingsActiveReader'])->name('ratings.activeReader');
   Route::get('/ratings/disciplined-reader', [PagesController::class, 'ratingsDisciplinedReader'])->name('ratings.disciplinedReader');
   Route::get('/ratings/popular-book', [PagesController::class, 'ratingsPopularBook'])->name('ratings.popularBook');
   Route::get('/ratings/proactive-member', [PagesController::class, 'ratingsProactiveMember'])->name('ratings.proactiveMember');
   Route::get('/ratings/reading-company', [PagesController::class, 'ratingsReadingCompany'])->name('ratings.readingCompany');

   Route::get('/rules', [PagesController::class, 'rules'])->name('rules');

   Route::get('/users', [PagesController::class, 'users'])->name('users');
   Route::get('/users/read/{id}', [PagesController::class, 'usersRead'])->name('users.read');
   // main routes
   Route::get('/search', [MainController::class, 'search'])->name('search');
   Route::post('/feedback', [MainController::class, 'feedbackSend'])->name('feedback.send');
   Route::post('/profile/update-avatar', [MainController::class, 'updateAvatar'])->name('profile.updateAvatar');
   Route::post('/profile/update-info', [MainController::class, 'updateInfo'])->name('profile.updateInfo');
   Route::post('/profile/update-password', [MainController::class, 'updatePassword'])->name('profile.updatePassword');
   // book route
   Route::get('/books/extend-deadline/{id}', [BooksController::class, 'extendDeadline'])->name('books.extendDeadline');
   Route::get('/books/booking/{id}', [BooksController::class, 'booking'])->name('books.booking');
   Route::get('/books/rating', [BooksController::class, 'rating'])->name('books.rating');
   // presentation routes
   Route::get('/presentations/participate', [PresentationsController::class, 'participate'])->name('presentations.participate');
   Route::post('/presentations/send', [PresentationsController::class, 'send'])->name('presentations.send');
   // activity routes
   Route::get('/activity/participate', [ActivitiesController::class, 'participate'])->name('activities.participate');
});
