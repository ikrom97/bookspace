<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PresentationsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
   // page routes
   Route::get('/', [PagesController::class, 'index'])->name('home');
   Route::get('/about', [PagesController::class, 'about'])->name('about');

   Route::get('/notifications', [PagesController::class, 'notifications'])->name('notifications');
   Route::get('/notifications/{notification}', [PagesController::class, 'notificationsRead'])->name('notifications.read');

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

   Route::group(['middleware' => ['AdminCheck']], function () {
      // dashboard pages
      Route::get('/dashboard/books', [DashboardController::class, 'books'])->name('dashboard.books');
      Route::get('/dashboard/books-create', [DashboardController::class, 'booksCreate'])->name('dashboard.books.create');
      Route::get('/dashboard/books-read/{book}', [DashboardController::class, 'booksRead'])->name('dashboard.books.read');
      
      Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
      Route::get('/dashboard/users-create', [DashboardController::class, 'usersCreate'])->name('dashboard.users.create');
      Route::get('/dashboard/users-read/{user}', [DashboardController::class, 'usersRead'])->name('dashboard.users.read');

      Route::get('/dashboard/banners', [DashboardController::class, 'banners'])->name('dashboard.banners');
      Route::get('/dashboard/banners-create', [DashboardController::class, 'bannersCreate'])->name('dashboard.banners.create');
      Route::get('/dashboard/banners-read/{banner}', [DashboardController::class, 'bannersRead'])->name('dashboard.banners.read');

      Route::get('/dashboard/presentations', [DashboardController::class, 'presentations'])->name('dashboard.presentations');
      Route::get('/dashboard/presentations-create', [DashboardController::class, 'presentationsCreate'])->name('dashboard.presentations.create');
      Route::get('/dashboard/presentations-read/{presentations}', [DashboardController::class, 'presentationsRead'])->name('dashboard.presentations.read');

      Route::get('/dashboard/sidebar', [DashboardController::class, 'sidebar'])->name('dashboard.sidebar');
      // book routes
      Route::post('/books/tempstore', [BooksController::class, 'booksTempstore']);
      Route::get('/books/search', [BooksController::class, 'search'])->name('books.search');
      Route::post('/books/create', [BooksController::class, 'create'])->name('books.create');
      Route::post('/books/update', [BooksController::class, 'update'])->name('books.update');
      Route::post('/books/delete', [BooksController::class, 'delete'])->name('books.delete');
      // user routes
      Route::get('/users/search', [UsersController::class, 'search'])->name('users.search');
      Route::post('/users/create', [UsersController::class, 'create'])->name('users.create');
      Route::post('/users/update', [UsersController::class, 'update'])->name('users.update');
      Route::post('/users/delete', [UsersController::class, 'delete'])->name('users.delete');
      Route::post('/users/tempstore', [UsersController::class, 'avatarTempstore']);
      // banner routes
      Route::get('/banners/search', [BannersController::class, 'search'])->name('banners.search');
      Route::post('/banners/create', [BannersController::class, 'create'])->name('banners.create');
      Route::post('/banners/update', [BannersController::class, 'update'])->name('banners.update');
      Route::post('/banners/delete', [BannersController::class, 'delete'])->name('banners.delete');
      // presentations routes
      Route::get('/presentations/accept/{presentation}', [PresentationsController::class, 'accept'])->name('presentations.accept');
      Route::get('/presentations/deny/{presentation}', [PresentationsController::class, 'deny'])->name('presentations.deny');
      Route::get('/presentations/download/{presentation}', [PresentationsController::class, 'download'])->name('presentations.download');
      Route::get('/presentations/search', [PresentationsController::class, 'search'])->name('presentations.search');
      Route::post('/presentations/create', [PresentationsController::class, 'create'])->name('presentations.create');
      Route::post('/presentations/update', [PresentationsController::class, 'update'])->name('presentations.update');
      Route::post('/presentations/delete', [PresentationsController::class, 'delete'])->name('presentations.delete');
      // main routes
      Route::post('/feedback/answer', [MainController::class, 'feedbackAnswer'])->name('feedback.answer');
   });
});
