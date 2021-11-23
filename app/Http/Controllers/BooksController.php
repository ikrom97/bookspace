<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookedBook;
use App\Models\Rating;
use App\Models\TemporaryBooksImg;
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

   public function booksTempstore(Request $request)
   {
      // Store temporary
      $type = $request->type;
      $file = $request->file('file');
      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $temporaryImages = TemporaryBooksImg::first();
      if ($temporaryImages) {
         $path = public_path('img/books/temporary/' . $temporaryImages->$type);
         if (file_exists($path)) {
            unlink($path);
         }
         $temporaryImages->$type = $fileName;
         $temporaryImages->save();
         $path = public_path('img/books/temporary');
         $file->move($path, $fileName);
         return asset('img/books/temporary/' . $fileName);
      } else {
         $temporaryImages = new TemporaryBooksImg;
         $temporaryImages->$type = $fileName;
         $temporaryImages->save();
         $path = public_path('img/books/temporary');
         $file->move($path, $fileName);
         return asset('img/books/temporary/' . $fileName);
      }
   }

   public function update(Request $request)
   {
      // find book
      $book = Book::find($request->input('book-id'));
      // update books cover
      $imgFront = $request->file('img-front');
      $imgSide = $request->file('img-side');
      $imgBack = $request->file('img-back');
      $files = [$imgFront, $imgSide, $imgBack];
      foreach ($files as $key => $file) {
         if ($file) {
            // delete previous file
            $columnName = 'img_front';
            if ($key == 1) {
               $columnName = 'img_side';
            }
            if ($key == 2) {
               $columnName = 'img_back';
            }
            $path = public_path('img/books/' . $book->$columnName);
            if (file_exists($path)) {
               unlink($path);
            }
            // save new file
            $path = public_path('img/books');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            // edit books filename
            $book->$columnName = $fileName;
            $book->save();
         }
      }
      // validation
      $request->validate([
         'title' => 'required',
         'author' => 'required',
         'pages' => 'required',
         'category' => 'required',
         'description' => 'required',
      ]);
      if ($request->code != $book->code) {
         $request->validate(['code' => 'required|unique:books']);
      }
      // edit book
      $book->title = $request->title;
      $book->author = $request->author;
      $book->pages = $request->pages;
      $book->category_id = $request->category;
      $book->code = $request->code;
      $book->description = $request->description;
      $book->save();

      return redirect()->to(url()->previous() . '#update')->with('success', 'Книга успешно изменена!');
   }

   public function delete(Request $request)
   {
      $book = Book::find($request->input('book-id'));

      $book->trashed = true;
      $save = $book->save();

      if ($save) {
         return redirect(route('dashboard.books'))->with('success', 'Книга успешно удалена!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function create(Request $request)
   {
      // validation
      $request->validate([
         'title' => 'required',
         'author' => 'required',
         'pages' => 'required',
         'category' => 'required',
         'code' => 'required|unique:books',
         'description' => 'required',
      ]);
      // create book
      $book = new Book;
      if ($request->input('img-front')) {
         $book->img_front = $request->input('img-front');
      }
      if ($request->input('img-side')) {
         $book->img_side = $request->input('img-side');
      }
      if ($request->input('img-front')) {
         $book->img_back = $request->input('img-back');
      }
      $book->title = $request->title;
      $book->author = $request->author;
      $book->pages = $request->pages;
      $book->category_id = $request->category;
      $book->code = $request->code;
      $book->description = $request->description;
      $save = $book->save();

      if ($save) {
         return back()->with('success', 'Книга успешно добавлена!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function search(Request $request)
   {
      $keyword = $request->keyword;
      $books = Book::select('id', 'category_id', 'title', 'author', 'trashed')
         ->where('trashed', false)
         ->where('title', 'like', '%' . $keyword . '%')
         ->paginate(9);

      return view('dashboard.books.search-result', compact('books'));
   }
}
