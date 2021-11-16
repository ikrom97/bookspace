@extends('layouts.master')

@section('title', 'Презентация книг')

@section('content')
   <main class="presentations-page">
      <div class="container">
         <h1 class="presentation-heading">Ближайшие презентации</h1>
      </div>
      @if ($presentations->count() == 0)
         <div class="container">
            <p class="no-content">
               К сожалению, на ближайшее время презентаций не запланировано.
            </p>
         </div>
      @else
         @foreach ($presentations as $key => $presentation)
            <section class="presentation {{$key % 2 == 0 ? "even" : ""}}">
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
                     </ul>
                     <a class="presentation-link {{$presentation->participants_quantity == $presentation->participants->count() ? 'disabled' : ''}}" @if ($presentation->participants_quantity != $presentation->participants->count()) href="{{route('presentations.participate')}}?id={{$presentation->id}}" @endif>Я хочу участвовать!</a>
                  </div>
               </div>
            </section>
         @endforeach
      @endif
   </main>
@endsection