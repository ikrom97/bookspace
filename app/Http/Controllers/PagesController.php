<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use App\Models\Company;
use App\Models\Presentation;
use App\Models\User;
use Carbon\Carbon;
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
      $currentDate = Carbon::now();

      $activities = Activity::whereDate('start', '>', $currentDate)
         ->orderBy('start', 'asc')->paginate(4);

      return view('pages.activities.index', compact('activities'));
   }

   public function books(Request $request)
   {
      $list = 'standard';
      $sort = 'title';
      $page = 1;

      if ($request->list) {
         $list = $request->list;
      }
      if ($request->sort) {
         $sort = $request->sort;
      }
      if ($request->page) {
         $page = $request->page;
      }

      $books = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'pages', 'rating', 'trashed')->where('trashed', false);

      switch ($sort) {
         case 'title':
            $books = $books->orderBy('title', 'asc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page])->fragment('books-page');
            break;

         case 'newest':
            $books = $books->latest()->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page])->fragment('books-page');
            break;

         case 'rating':
            $books = $books->orderBy('rating', 'desc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page])->fragment('books-page');
            break;

         case 'available':
            $books = $books->orderBy('user_id', 'asc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page])->fragment('books-page');
            break;
      }

      $rank = $books->firstItem();

      $booksCategories = Category::get();

      return view('pages.books.index', compact('booksCategories', 'books', 'rank', 'list', 'sort', 'page'));
   }

   public function booksRead()
   {
      return view('pages.books.read');
   }

   public function booksCategories(Request $request)
   {
      $list = 'standard';
      $sort = 'title';
      $page = 1;
      $category = Category::find($request->category);

      if ($request->list) {
         $list = $request->list;
      }
      if ($request->sort) {
         $sort = $request->sort;
      }
      if ($request->page) {
         $page = $request->page;
      }

      $books = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'pages', 'rating', 'trashed')->where('trashed', false);

      switch ($sort) {
         case 'title':
            $books = $books->where('category_id', $category->id)->orderBy('title', 'asc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page, 'category' => $category->id])->fragment('books-page');
            break;

         case 'newest':
            $books = $books->where('category_id', $category->id)->latest()->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page, 'category' => $category->id])->fragment('books-page');
            break;

         case 'rating':
            $books = $books->where('category_id', $category->id)->orderBy('rating', 'desc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page, 'category' => $category->id])->fragment('books-page');
            break;

         case 'available':
            $books = $books->where('category_id', $category->id)->orderBy('user_id', 'asc')->paginate(16)->appends(['list' => $list, 'sort' => $sort, 'page' => $page, 'category' => $category->id])->fragment('books-page');
            break;
      }

      $rank = $books->firstItem();

      $booksCategories = Category::get();

      return view('pages.books.index', compact('booksCategories', 'books', 'rank', 'list', 'sort', 'page', 'category'));
   }

   public function presentations()
   {
      $currentDate = Carbon::now();

      $presentations = Presentation::whereDate('date', '>', $currentDate)
         ->where('accepted', true)->orderBy('date', 'asc')->paginate(3);

      return view('pages.presentations.index', compact('presentations'));
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

   public function rules()
   {
      return view('pages.rules.index');
   }

   public function usersRead($id)
   {
      return view('pages.users.read');
   }
}
