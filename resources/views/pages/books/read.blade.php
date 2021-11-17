@extends('layouts.master')

@section('title', $book->title)

@section('content')
   <main class="book-read-page">
      <div class="container">
         <ul class="breadcrumbs book-read-page__breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('books')}}">Книги</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('books.categories')}}?category={{$book->category->id}}">{{$book->category->title}}</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$book->title}}</a>
            </li>
         </ul>
      </div>
      <section class="book">
         <div class="container book__container">
            <div class="book-view">
               <div class="book-view__container">
                  <img class="book-view__side-img" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                  <img class="book-view__front-img" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                  <img class="book-view__back-img" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
               </div>
            </div>
            <div class="book-info">
               <h2 class="book-title">{{$book->title}}</h2>
               <p class="book-description">{{$book->description}}</p>
               <ul class="book-list">
                  <li class="book-item">
                     Автор <span class="book-item-seperator"></span> <b>{{$book->author}}</b>
                  </li>
                  <li class="book-item">
                     Страницы <span class="book-item-seperator"></span> <b>{{$book->pages}}</b>
                  </li>
                  <li class="book-item">
                     Артикул <span class="book-item-seperator"></span> <b class="code">{{$book->code}}</b>
                  </li>
                  <li class="book-item">
                     Рейтинг <span class="book-item-seperator"></span> 
                     <div class="book-item__rating">
                        @foreach (range(1, $book->rating) as $item)
                           <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        @endforeach
                     </div>
                  </li>
                  <li class="book-item">
                     Статус <span class="book-item-seperator"></span>
                     @if ($book->user_id || $book->queues->count() != 0)
                        <b class="unavailable">Занято примерно до 
                           @php
                              $date = \Carbon\Carbon::parse($book->return_date)->addDays((30 * $book->queues->count()))->locale('ru');
                           @endphp
                           {{$date->isoFormat('D MMMM Y')}}
                        </b>
                     @else
                        <b class="available">Доступна</b>
                     @endif
                  </li>
               </ul>
               <div class="book-link__wrap">
                  <div class="rating-wrap" data-family="rating">
                     <button class="book-link book-link--rate" data-family="rating" type="button">Оценить</button>
                     <div class="stars-list-wrap" data-family="rating">
                        @php
                           $rating = App\Models\Rating::where('user_id', $loggedUser->id)->where('book_id', $book->id)->first();
                           $rate = 0;
                           if ($rating) {
                              $rate = $rating->rate;
                           }
                        @endphp
                        <ul class="stars-list" data-family="rating">
                           <li class="stars-list-item {{$rate >= 5 ? 'gold' : ''}}" data-id="rating-icon-1" data-family="rating">
                              <a class="stars-list-link" href="{{route('books.rating')}}?book={{$book->id}}&rate=5" data-family="rating">
                                 <svg data-family="rating" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                              </a>
                           </li>
                           <li class="stars-list-item {{$rate >= 4 ? 'gold' : ''}}" data-id="rating-icon-2" data-family="rating">
                              <a class="stars-list-link" href="{{route('books.rating')}}?book={{$book->id}}&rate=4" data-family="rating">
                                 <svg data-family="rating" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                              </a>
                           </li>
                           <li class="stars-list-item {{$rate >= 3 ? 'gold' : ''}}" data-id="rating-icon-3" data-family="rating">
                              <a class="stars-list-link" href="{{route('books.rating')}}?book={{$book->id}}&rate=3" data-family="rating">
                                 <svg data-family="rating" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                              </a>
                           </li>
                           <li class="stars-list-item {{$rate >= 2 ? 'gold' : ''}}" data-id="rating-icon-4" data-family="rating">
                              <a class="stars-list-link" href="{{route('books.rating')}}?book={{$book->id}}&rate=2" data-family="rating">
                                 <svg data-family="rating" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                              </a>
                           </li>
                           <li class="stars-list-item {{$rate >= 1 ? 'gold' : ''}}" data-id="rating-icon-5" data-family="rating">
                              <a class="stars-list-link" href="{{route('books.rating')}}?book={{$book->id}}&rate=1" data-family="rating">
                                 <svg data-family="rating" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <a class="book-link" href="{{route('books.booking', $book->id)}}">Забронировать</a>
               </div>
            </div>
         </div>
      </section>
      <section class="popular-books">
         <div class="container popular-books__container">
            <h2 class="popular-books-title">Похожие книги</h2>
            <div class="owl-carousel popular-books-carousel">
               @foreach ($similarBooks as $book)
                  <div class="popular-books-item">
                     <x-books-card :book="$book" />
                  </div>
               @endforeach
            </div>
         </div>
      </section>
   </main>
@endsection