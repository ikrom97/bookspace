@extends('layouts.master')

@section('title', 'Уведомления')

@section('content')
   <main class="notifications-read-page users-page">
      <div class="container">
         @isset($presentation)
            <h1 class="users__title">{{$presentation->book->title}}</h1>
            <ul class="breadcrumbs users__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('notifications')}}">Уведомления</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">{{$presentation->book->title}}</a>
               </li>
            </ul>
            <section class="presentation even">
               <div class="container presentation__container">
                  <div class="book-view">
                     <div class="book-view__container">
                        <img class="book-view__side-img" src="{{asset('img/books/' . $presentation->book->img_side)}}" alt="Фото боковой части">
                        <img class="book-view__front-img" src="{{asset('img/books/' . $presentation->book->img_front)}}" alt="Фото фронтальной части">
                        <img class="book-view__back-img" src="{{asset('img/books/' . $presentation->book->img_back)}}" alt="Фото задней части">
                     </div>
                  </div>
                  <div class="presentation-info">
                     <h2 class="presentation-title">{{$presentation->book->title}}</h2>
                     <p class="presentation-message">{{$presentation->description}}</p>
                     <ul class="presentation-list">
                        <li class="presentation-item">
                           Спикер <span class="presentation-item-seperator"></span> <b>{{$presentation->user->name}} {{$presentation->user->surname}}</b>
                        </li>
                        <li class="presentation-item">
                           Книга <span class="presentation-item-seperator"></span> <b>{{$presentation->book->title}}</b>
                        </li>
                        <li class="presentation-item">
                           Дата и время презентации <span class="presentation-item-seperator"></span> <b>{{$presentation->date}}</b>
                        </li>
                        <li class="presentation-item">
                           Аудитория <span class="presentation-item-seperator"></span> <b>{{$presentation->audience}}</b>
                        </li>
                        <li class="presentation-item">
                           Количество участников <span class="presentation-item-seperator"></span> <b>{{$presentation->participants_quantity}} / <output>{{$presentation->participants->count()}}</output></b>
                        </li>
                        <li class="presentation-item">
                           Статус <span class="presentation-item-seperator"></span>
                              @if ($presentation->accepted)
                                 <b class="green">Подтверждена</b>
                              @elseif ($presentation->denied)
                                 <b class="red">Отклонена</b>
                              @else
                                 <b>Не подтверждена</b>
                              @endif
                        </li>
                     </ul>
                     @if ($loggedUser->role == 'admin')
                        <div class="form-btn-wrapper">
                           <a class="presentation-link green-bg" href="{{route('presentations.download', $presentation)}}">Посмотреть</a>
                           @if ($presentation->accepted)
                           <a class="presentation-link presentation-link--right red-bg" href="{{route('presentations.deny', $presentation)}}">Отклонить</a>
                           @else
                           <a class="presentation-link presentation-link--right green-bg" href="{{route('presentations.accept', $presentation)}}">Подтвердить</a>
                           @endif
                        </div>
                     @endif
                  </div>
               </div>
            </section>
         @endisset
         @isset($feedback)
            <h1 class="users__title">Обратная связь</h1>
            <ul class="breadcrumbs users__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('notifications')}}">Уведомления</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">Обратная связь</a>
               </li>
            </ul>
            <section class="presentation even">
               <div class="container presentation__container">
                  <div class="presentation-info">
                     <h2 class="presentation-title">Сообщение от {{$feedback->user->surname}} {{$feedback->user->name}}</h2>
                     <p class="presentation-message">{{$feedback->message}}</p>
                     <ul class="presentation-list">
                        <li class="presentation-item">
                           Дата и время отправки <span class="presentation-item-seperator"></span> <b>{{$feedback->created_at}}</b>
                        </li>
                        @if ($feedback->feedback)
                           <li class="presentation-item">
                              Дата и время отклика <span class="presentation-item-seperator"></span> <b>{{$feedback->updated_at}}</b>
                           </li>
                           <p class="presentation-message">{{$feedback->feedback}}</p>
                        @else 
                           <form class="feedback-answer" action="{{route('feedback.answer')}}" method="post">
                              @csrf
                              <input type="hidden" name="user" value="{{$feedback->user->id}}">
                              <input type="hidden" name="feedback" value="{{$feedback->id}}">
                              <label class="form-label form-label--flow width-100">Ответ
                                 <textarea class="form-textarea form-input--flow width-100" name="answer"></textarea>
                              </label>
                              <div class="form-btn-wrapper">
                                 <button class="button button--green" type="submit">Ответить</button>
                              </div>
                           </form>
                        @endif
                     </ul>
                  </div>
               </div>
            </section>
         @endisset
         @isset($book)
            <h1 class="users__title">{{$book->title}}</h1>
            <ul class="breadcrumbs users__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('notifications')}}">Уведомления</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">Книга удалена</a>
               </li>
            </ul>
            <section class="presentation even">
               <div class="container presentation__container">
                  <div class="book-view">
                     <div class="book-view__container">
                        <img class="book-view__side-img" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                        <img class="book-view__front-img" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                        <img class="book-view__back-img" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
                     </div>
                  </div>
                  <div class="presentation-info">
                     <h2 class="presentation-title">{{$book->title}}</h2>
                     <p class="presentation-message">{{$book->description}}</p>
                     <ul class="presentation-list">
                        <li class="presentation-item">
                           Автор <span class="presentation-item-seperator"></span> <b>{{$book->author}}</b>
                        </li>
                        <li class="presentation-item">
                           Страницы <span class="presentation-item-seperator"></span> <b>{{$book->pages}}</b>
                        </li>
                        <li class="presentation-item">
                           Артикул <span class="presentation-item-seperator"></span> <b>{{$book->code}}</b>
                        </li>
                        <li class="presentation-item">
                           Рейтинг <span class="book-item-seperator"></span> <b>{{$book->rating}}</b>
                        </li>
                        <li class="presentation-item">
                           Статус <span class="presentation-item-seperator"></span> <b class="red">Удалена</b>
                        </li>
                     </ul>
                  </div>
               </div>
            </section>
         @endisset
      </div>
   </main>
@endsection