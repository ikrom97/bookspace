<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index()
   {
      $banners = Banner::get();

      $popularBooks = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('rating', 'desc')->paginate(32);

      $newBooks = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'rating', 'trashed', 'created_at')
         ->where('trashed', false)->orderBy('created_at', 'desc')->paginate(32);

      $booksCount = Book::count();

      return view('pages.index', compact('banners', 'popularBooks', 'newBooks', 'booksCount'));
   }

   public function about()
   {
      return view('pages.about.index');
   }

   public function notifications()
   {
      return view('pages.notifications.index');
   }

   public function accountActivities()
   {
      return view('pages.account.activities');
   }

   public function accountBookedBooks()
   {
      return view('pages.account.booked-books');
   }

   public function accountLikedBooks()
   {
      return view('pages.account.liked-books');
   }

   public function accountPresentation()
   {
      return view('pages.account.presentation');
   }

   public function accountProfile()
   {
      return view('pages.account.profile');
   }

   public function accountReadBooks()
   {
      return view('pages.account.read-books');
   }

   public function accountReaders()
   {
      return view('pages.account.readers');
   }

   public function activities()
   {
      return view('pages.activities');
   }

   public function books()
   {
      return view('pages.books');
   }

   public function booksRead()
   {
      return view('pages.books.read');
   }

   public function presentations()
   {
      return view('pages.presentations');
   }

   public function ratingsActiveReader()
   {
      return view('pages.ratings.active-reader');
   }

   public function ratingsDisciplinedReader()
   {
      return view('pages.ratings.disciplined-reader');
   }

   public function ratingsPopularBook()
   {
      return view('pages.ratings.popular-book');
   }

   public function ratingsProactiveMember()
   {
      return view('pages.ratings.proactive-member');
   }

   public function ratingsReadingCompany()
   {
      return view('pages.ratings.reading-company');
   }
}
