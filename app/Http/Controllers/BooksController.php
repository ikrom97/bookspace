<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookedBook;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BooksController extends Controller
{
   public function extendDeadline($id)
   {
      $book = Book::find($id);

      if ($book->deadline_renewed) {
         return back()->with('fail', 'Операция невозможна! Вы уже продлили дедлайн.');
      } else {
         $book->deadline_renewed = true;
         $book->return_date = Carbon::parse($book->return_date)->addDays(15);
         $book->save();

         return back()->with('success', 'Вы успешно продлили дедлайн ещё на 15 дней!');
      }
   }

   public function booking($id)
   {
      $book = Book::select('id', 'user_id', 'return_date')->find($id);

      $user = User::select('id')->withCount('booked_books')->find(session()->get('loggedUser'));

      if ($user->booked_books_count == 2) {
         return back()->with('fail', 'Операция невозможнa. У Вас максимальное количество забронированных книг!');
      } else {
         $bookedBook = new BookedBook;
         $bookedBook->user_id = $user->id;
         $bookedBook->book_id = $book->id;
         $bookedBook->save();

         return back()->with('success', 'Книга успешно добавлена в список забронированнных книг!');
      }
   }

   public function rating(Request $request)
   {
      $userId = session()->get('loggedUser');
      // Delete previous rating if exists
      Rating::where('user_id', $userId)
         ->where('book_id', $request->book)
         ->delete();
      // Store new rating table
      if ($request->rate > 5 || $request->rate < 0) {
         return back()->with('fail', 'Упс... Что-то пошло не так, попробуйте позже');
      }
      $rating = new Rating;
      $rating->user_id = $userId;
      $rating->book_id = $request->book;
      $rating->rate = $request->rate;
      $rating->save();
      // Update book's rating
      $ratings = Rating::where('book_id', $request->book)->get();

      $rates = 0;
      $bookRating = 0;

      foreach ($ratings as $rating) {
         $rates = $rates + $rating->rate;
      }

      $bookRating = $rates / count($ratings);

      $book = Book::find($request->book);
      $book->rating = $bookRating;
      $book->save();

      return back()->with('success', 'Спасибо за отзыв!');
   }
}
