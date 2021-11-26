<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookedBook;
use App\Models\Category;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Presentation;
use App\Models\TakenBook;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index()
   {
      $banners = Banner::get();

      $popularBooks = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('rating', 'desc')->paginate(9);

      $newBooks = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'rating', 'trashed', 'created_at')
         ->where('trashed', false)->orderBy('created_at', 'desc')->paginate(9);

      $booksCount = Book::count();

      return view('pages.index', compact('banners', 'popularBooks', 'newBooks', 'booksCount'));
   }

   public function about()
   {
      return view('pages.about.index');
   }

   public function notifications()
   {
      $notifications = User::find(session('loggedUser'))
         ->notifications()->orderBy('new', 'desc')
         ->orderBy('created_at', 'desc')->paginate(16);

      $rank = $notifications->firstItem();

      return view('pages.notifications.index', compact('notifications', 'rank'));
   }

   public function notificationsRead(Notification $notification)
   {
      $user = User::find(session('loggedUser'));
      
      if ($notification->new) {
         $notification->new = false;
         $notification->save();
      }

      switch ($notification->type) {
         case 'presentation';
         case 'presentation_accepted';
         case 'presentation_denied':
            $presentation = Presentation::find($notification->type_id);

            return view('pages.notifications.read', compact('presentation'));
            break;

         case 'feedback';
         case 'feedback_answered':
            $feedback = Feedback::find($notification->type_id);

            return view('pages.notifications.read', compact('feedback'));
            break;

         case 'booked_book_deleted':
            $book = Book::find($notification->type_id);

            return view('pages.notifications.read', compact('book'));
            break;
      }
   }

   public function accountActivities()
   {
      $activities = User::find(session()->get('loggedUser'))->actions()->where('trashed', false)
         ->orderBy('end', 'desc')->paginate(16)->fragment('account-title');

      $rank = $activities->firstItem();

      return view('pages.account.activities', compact('activities', 'rank'));
   }

   public function accountBookedBooks()
   {
      $books = BookedBook::where('user_id', session('loggedUser'))->get();

      return view('pages.account.booked-books', compact('books'));
   }

   public function accountLikedBooks()
   {
      return view('pages.account.liked-books');
   }

   public function accountPresentation()
   {
      $books = Book::select('id', 'title', 'code', 'trashed')->where('trashed', false)->orderBy('title')->get();

      return view('pages.account.presentation', compact('books'));
   }

   public function accountProfile()
   {
      $user = User::where('trashed', false)->find(session()->get('loggedUser'));

      return view('pages.account.profile', compact('user'));
   }

   public function accountReadBooks()
   {
      $books = TakenBook::select('taken_books.id', 'taken_books.user_id', 'taken_books.book_id')
         ->where('taken_books.user_id', session()->get('loggedUser'))
         ->join('books', 'taken_books.book_id', '=', 'books.id')
         ->orderBy('books.title')
         ->paginate(16)->fragment('account-title');

      $rank = $books->firstItem();

      return view('pages.account.read-books', compact('books', 'rank'));
   }

   public function accountReaders()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'read_pages', 'trashed')
         ->where('trashed', false)->orderBy('name', 'asc')->paginate(16)->fragment('account-title');

      $rank = $users->firstItem();

      return view('pages.account.readers', compact('users', 'rank'));
   }

   public function activities()
   {
      $currentDate = Carbon::now();

      $activities = Activity::where('trashed', false)->whereDate('start', '>', $currentDate)
         ->orderBy('start', 'asc')->paginate(4);

      return view('pages.activities.index', compact('activities'));
   }

   public function activitiesRead($id)
   {
      $activity = Activity::where('trashed', 'false')->find($id);

      if ($activity) {
         return view('pages.activities.read', compact('activity'));
      } else {
         return back()->with('fail', 'Мероприятие не найдено');
      }
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

   public function booksRead($id)
   {
      $book = Book::find($id);

      $similarBooks = Book::select('id', 'category_id', 'user_id', 'img_front', 'title', 'author', 'rating', 'trashed')
         ->where('trashed', false)->where('category_id', $book->category_id)->orderBy('rating', 'desc')->get();

      return view('pages.books.read', compact('book', 'similarBooks'));
   }

   public function booksCategories(Request $request)
   {
      $list = 'standard';
      $sort = 'title';
      $page = 1;
      $category = Category::where('trashed', false)->find($request->category);

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

      $booksCategories = Category::where('trashed', false)->get();

      return view('pages.books.index', compact('booksCategories', 'books', 'rank', 'list', 'sort', 'page', 'category'));
   }

   public function presentations()
   {
      $currentDate = Carbon::now();

      $presentations = Presentation::where('trashed', false)->whereDate('date', '>', $currentDate)
         ->where('accepted', true)->orderBy('date', 'asc')->paginate(3);

      return view('pages.presentations.index', compact('presentations'));
   }

   public function ratingsActiveReader()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'read_pages', 'trashed')
         ->where('trashed', false)->orderBy('read_pages', 'desc')->paginate(16)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.active-reader', compact('users', 'rank'));
   }

   public function ratingsDisciplinedReader()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'blacklist_value', 'renewed_deadlines', 'trashed')
         ->where('trashed', false)
         ->orderBy('blacklist_value', 'asc')
         ->orderBy('renewed_deadlines', 'asc')
         ->paginate(16)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.disciplined-reader', compact('users', 'rank'));
   }

   public function ratingsPopularBook()
   {
      $books = Book::select('id', 'title', 'author', 'pages', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('rating', 'desc')
         ->paginate(16)->fragment('ratings-title');

      $rank = $books->firstItem();
      return view('pages.ratings.popular-book', compact('books', 'rank'));
   }

   public function ratingsProactiveMember()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'trashed')
         ->where('trashed', false)
         ->withCount('presentations')->withCount('participations')
         ->orderBy('presentations_count', 'desc')->orderBy('participations_count', 'desc')
         ->paginate(16)->fragment('ratings-title');

      $rank = $users->firstItem();

      return view('pages.ratings.proactive-member', compact('users', 'rank'));
   }

   public function ratingsReadingCompany()
   {
      $companies = Company::select('id', 'title', 'read_pages', 'read_books', 'trashed')
         ->where('trashed', false)
         ->orderBy('read_pages', 'desc')->paginate(16)->fragment('ratings-title');

      $rank = $companies->firstItem();

      return view('pages.ratings.reading-company', compact('companies', 'rank'));
   }

   public function rules()
   {
      return view('pages.rules.index');
   }

   public function users()
   {
      $users = User::select('id', 'company_id', 'name', 'surname', 'trashed')
         ->where('trashed', false)->orderBy('surname', 'asc')
         ->paginate(16)->fragment('users-title');

      $rank = $users->firstItem();

      return view('pages.users.index', compact('users', 'rank'));
   }

   public function usersRead($id)
   {
      $user = User::where('trashed', false)->find($id);

      if ($user) {
         $users = User::select('id', 'company_id', 'name', 'surname', 'trashed')
            ->where('trashed', false)->orderBy('surname', 'asc')
            ->paginate(16)->fragment('users-title');

         $rank = $users->firstItem();

         return view('pages.users.read', compact('user', 'users', 'rank'));
      } else {
         return back()->with('fail', 'Такого читателя не существует');
      }
   }
}
