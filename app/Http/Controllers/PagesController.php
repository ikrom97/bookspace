<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Company;
use App\Models\User;
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
      $users = User::select('id', 'company_id', 'name', 'surname', 'read_pages')
         ->orderBy('read_pages', 'desc')->paginate(15)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.active-reader', compact('users', 'rank'));
   }

   public function ratingsDisciplinedReader()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'blacklist_value', 'renewed_deadlines')
         ->orderBy('blacklist_value', 'asc')
         ->orderBy('renewed_deadlines', 'asc')
         ->paginate(15)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.disciplined-reader', compact('users', 'rank'));
   }

   public function ratingsPopularBook()
   {
      $books = Book::select('id', 'title', 'author', 'pages', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('rating', 'desc')
         ->paginate(15)->fragment('ratings-title');

      $rank = $books->firstItem();
      return view('pages.ratings.popular-book', compact('books', 'rank'));
   }

   public function ratingsProactiveMember()
   {
      $users = User::select('id', 'company_id', 'name', 'surname')
         ->withCount('presentations')->withCount('participations')
         ->orderBy('presentations_count', 'desc')->orderBy('participations_count', 'desc')
         ->paginate(15)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.proactive-member', compact('users', 'rank'));
   }

   public function ratingsReadingCompany()
   {
      $companies = Company::select('id', 'title', 'read_pages', 'read_books')
         ->orderBy('read_pages', 'desc')->paginate(15)->fragment('ratings-title');

         $rank = $companies->firstItem();

      return view('pages.ratings.reading-company', compact('companies', 'rank'));
   }

   public function usersRead($id)
   {
      return view('pages.users.read');
   }
}
