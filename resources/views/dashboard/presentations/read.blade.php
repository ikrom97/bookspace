@extends('dashboard.master')

@section('content')
   <main class="presentations-read-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('presentations.search')}}" method="get">
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
         <div class="quantity">Презентации: {{$quantity}}</div>
         <button class="toolbar-delete" type="button">Удалить презентацию</button>
      </section>
      <div class="content">
         <h1>{{$presentation->book->title}}</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.presentations')}}">Презентации</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$presentation->book->title}}</a>
            </li>
         </ul>
         <section class="presentation even">
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
            </div>
         </section>
         <section class="book-update" id="update">
            <h2 class="title">Редактировать презентацию</h2>
            <form class="form" action="{{route('presentations.update')}}#update" method="post">
               @csrf
               <input type="hidden" name="presentation-id" value="{{$presentation->id}}">
               <label class="form-label">Дата и время презентации
                  <div id="picker"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="datetime" value="{{old('datetime') == '' ? $presentation->date : old('datetime')}}">
               </label>
               <label class="form-label form-label--flow">Предпочитаемая аудитория
                  <input class="form-input form-input--flow" type="text" name="audience" value="{{old('audience') == '' ? $presentation->audience : old('audience')}}">
               </label>
               <label class="form-label">Желаемое количество участников
                  <input class="form-input form-input--quantity" type="number" name="participants" value="{{old('participants') == '' ? $presentation->participants_quantity : old('participants')}}">
               </label>
               <label class="form-label form-label--flow width-100">Послание спикера слушателям - отзыв о книге
                  <textarea class="form-textarea form-textarea--full width-100" type="text" name="description">{{old('description') == '' ? $presentation->description : old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('presentations.delete')}}" method="post">
            @csrf
            <input name="presentation-id" type="hidden" value="{{$presentation->id}}">
            <p class="delete-message">Вы действительно хотите удалить эту презентацию?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection