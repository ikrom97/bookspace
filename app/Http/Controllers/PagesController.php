<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index()
   {
      return view('pages.index');
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
