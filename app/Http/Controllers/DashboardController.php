<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function books()
   {
      return view('dashboard.books.index');
   }

   public function booksCreate()
   {
      return view('dashboard.books.create');
   }

   public function booksRead(Book $book)
   {
      return view('dashboard.books.read', compact('book'));
   }

   public function booksUpdate(Book $book)
   {
      return view('dashboard.books.update', compact('book'));
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
}
