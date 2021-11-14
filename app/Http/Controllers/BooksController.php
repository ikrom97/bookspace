<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
}
