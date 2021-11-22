<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function books()
   {
      $quantity = Book::count();

      $books = Book::select('id', 'title', 'author', 'pages', 'rating', 'trashed')
         ->where('trashed', false)->orderBy('created_at', 'desc')
         ->paginate(16)->fragment('books-title');

      $rank = $books->firstItem();

      return view('dashboard.books.index', compact('quantity', 'books', 'rank'));
   }

   public function booksCreate()
   {
      $quantity = Book::count();

      return view('dashboard.books.create', compact('quantity'));
   }

   public function booksRead(Book $book)
   {
      $quantity = Book::count();

      $categories = Category::get();

      return view('dashboard.books.read', compact('book', 'quantity', 'categories'));
   }

   public function booksUpdate(Book $book)
   {
      $quantity = Book::count();

      $categories = Category::get();

      return view('dashboard.books.update', compact('book', 'quantity', 'categories'));
   }

   public function users()
   {
      return view('dashboard.users.index');
   }

   public function usersCreate()
   {
      return view('dashboard.users.create');
   }

   public function usersRead(User $user)
   {
      return view('dashboard.users.read', compact('user'));
   }

   public function usersUpdate(User $user)
   {
      return view('dashboard.users.update', compact('user'));
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
