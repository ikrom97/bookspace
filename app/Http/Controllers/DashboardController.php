<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use App\Models\Company;
use App\Models\Presentation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function books()
   {
      $quantity = Book::where('trashed', false)->count();

      $books = Book::select('id', 'title', 'author', 'pages', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('created_at', 'desc')
         ->paginate(16)->fragment('books-title');

      $rank = $books->firstItem();

      return view('dashboard.books.index', compact('quantity', 'books', 'rank'));
   }

   public function booksCreate()
   {
      $quantity = Book::where('trashed', false)->count();

      $categories = Category::where('trashed', false)->get();

      return view('dashboard.books.create', compact('quantity', 'categories'));
   }

   public function booksRead(Book $book)
   {
      $quantity = Book::where('trashed', false)->count();

      $categories = Category::where('trashed', false)->get();

      return view('dashboard.books.read', compact('book', 'quantity', 'categories'));
   }

   public function users()
   {
      $quantity = User::where('trashed', false)->count();

      $users = User::select('id', 'company_id', 'name', 'surname', 'read_pages', 'trashed')
         ->where('trashed', false)->orderBy('created_at', 'desc')->paginate(16)->fragment('users-title');

      $rank = $users->firstItem();

      return view('dashboard.users.index', compact('quantity', 'users', 'rank'));
   }

   public function usersCreate()
   {
      $quantity = User::where('trashed', false)->count();

      $companies = Company::where('trashed', false)->get();

      return view('dashboard.users.create', compact('quantity', 'companies'));
   }

   public function usersRead(User $user)
   {
      $quantity = User::where('trashed', false)->count();

      $companies = Company::where('trashed', false)->get();

      return view('dashboard.users.read', compact('user', 'quantity', 'companies'));
   }

   public function banners()
   {
      $quantity = Banner::where('trashed', false)->count();

      $banners = Banner::where('trashed', false)->paginate(16);

      $rank = $banners->firstItem();

      return view('dashboard.banners.index', compact('quantity', 'banners', 'rank'));
   }

   public function bannersCreate()
   {
      $quantity = Banner::where('trashed', false)->count();

      return view('dashboard.banners.create', compact('quantity'));
   }

   public function bannersRead(Banner $banner)
   {
      $quantity = Banner::where('trashed', false)->count();

      return view('dashboard.banners.read', compact('quantity', 'banner'));
   }

   public function presentations()
   {
      $quantity = Presentation::where('trashed', false)->count();

      $presentations = Presentation::where('trashed', false)->orderBy('created_at', 'desc')->paginate(16);

      $rank = $presentations->firstItem();

      return view('dashboard.presentations.index', compact('quantity', 'presentations', 'rank'));
   }

   public function presentationsCreate()
   {
      $quantity = Presentation::where('trashed', false)->count();

      $books = Book::select('id', 'title', 'code', 'trashed')->where('trashed', false)->get();

      $users = User::select('id', 'surname', 'name', 'trashed')->where('trashed', false)->get();

      return view('dashboard.presentations.create', compact('quantity', 'books', 'users'));
   }

   public function presentationsRead($id)
   {
      $quantity = Presentation::where('trashed', false)->count();

      $presentation = Presentation::find($id);

      return view('dashboard.presentations.read', compact('quantity', 'presentation'));
   }

   public function sidebar()
   {
      if (session()->get('sidebar')) {
         session()->forget('sidebar');
      } else {
         session()->put('sidebar', 'hidden');
      }
   }
}
