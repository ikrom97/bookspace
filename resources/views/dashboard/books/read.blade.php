@extends('dashboard.master')

@section('content')
   <main class="books-read-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('books.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск по книгам . . ." autocomplete="off">
               </label>
               <button data-family="search" class="search-submit-btn visually-hidden" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Книги: {{$quantity}}</div>
         <button class="toolbar-delete" type="button">Удалить книгу</button>
      </section>
      <div class="content">
         <h1>{{$book->title}}</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Книги</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$book->title}}</a>
            </li>
         </ul>
         <section class="book-read">
            <div class="book-view">
               <div class="book-view__container">
                  <img class="book-view__side-img" data-img="side" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                  <img class="book-view__front-img" data-img="front" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                  <img class="book-view__back-img" data-img="back" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
               </div>
            </div>
            <div class="book-info">
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
         </section>
         <section class="book-update" id="update">
            <h2 class="title">Редактировать книгу</h2>
            <form class="form" action="{{route('books.update')}}#update" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="book-id" value="{{$book->id}}">
               <div class="form-img-wrap">
                  <label class="form-img-label" data-label="front">Фронтальное фото
                     <img class="form-img" src="{{asset('img/books/' . $book->img_front)}}" data-img="front" alt="{{$book->title}}">
                     <input class="form-img-input visually-hidden" data-type="front" name="img-front" type="file" accept=".jpg, .jpeg, .png" value="{{old('imf-front') == '' ? $book->title : old('img-front')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 300px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
                  <label class="form-img-label form-img-label--side" data-label="side">Фото боковой части
                     <img class="form-img form-img--side" src="{{asset('img/books/' . $book->img_side)}}" data-img="side" alt="{{$book->title}}">
                     <input class="form-img-input visually-hidden" data-type="side" name="img-side" type="file" accept=".jpg, .jpeg, .png" value="{{old('img-side') == '' ? $book->title : old('img-side')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 50px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
                  <label class="form-img-label" data-label="back">Фото задней части
                     <img class="form-img" src="{{asset('img/books/' . $book->img_back)}}" data-img="back" alt="{{$book->title}}">
                     <input class="form-img-input visually-hidden" data-type="back" name="img-back" type="file" accept=".jpg, .jpeg, .png" value="{{old('img-back') == '' ? $book->title : old('img-back')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 300px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
               </div>
               <label class="form-label">Название книги
                  <input class="form-input" type="text" name="title" value="{{old('title') == '' ? $book->title : old('title')}}">
               </label>
               <label class="form-label">Автор книги
                  <input class="form-input form-input--author" type="text" name="author" value="{{old('author') == '' ? $book->author : old('author')}}">
               </label>
               <label class="form-label">Страницы
                  <input class="form-input form-input--pages" type="number" name="pages" value="{{old('pages') == '' ? $book->pages : old('pages')}}">
               </label>
               <label class="form-label">Категория
                  <select class="form-select" name="category">
                     @php $old = old('category'); @endphp
                     @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$old == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label">Артикул
                  <input class="form-input form-input--pages" type="number" name="code" value="{{old('code') == '' ? $book->pages : old('code')}}">
               </label>
               <label class="form-label form-label--flow">Описание
                  <textarea class="form-textarea width-100 form-textarea--full" type="text" name="description">{{old('description') == '' ? $book->description : old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('books.delete')}}" method="post">
            @csrf
            <input name="book-id" type="hidden" value="{{$book->id}}">
            <p class="delete-message">Вы действительно хотите удалить эту книгу?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection