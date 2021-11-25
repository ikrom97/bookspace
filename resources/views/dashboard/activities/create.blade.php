@extends('dashboard.master')

@section('content')
   <main class="activities-create-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('activities.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input data-family="search" class="search-input" type="search" name="keyword" placeholder="Поиск по мероприятиям . . ." autocomplete="off">
               </label>
               <button class="search-submit-btn visually-hidden" data-family="search" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Мероприятия: {{$quantity}}</div>
      </section>
      <div class="content">
         <h1>Добавление</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.activities')}}">Мероприятия</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Добавить</a>
            </li>
         </ul>
         <section class="activities-create" id="create">
            <form class="form" action="{{route('activities.create')}}#create" method="post">
               @csrf
               <label class="form-label">Модератор
                  <input class="form-input" type="text" name="moderator" value="{{old('moderator')}}">
               </label>
               <label class="form-label">Дата и время старта
                  <div id="start"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="start" value="{{old('start')}}">
               </label>
               <label class="form-label">Дата и время окончания
                  <div id="end"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="end" value="{{old('end')}}">
               </label>
               <label class="form-label">Аудитория
                  <input class="form-input" type="text" name="audience" value="{{old('audience')}}">
               </label>
               <label class="form-label">Желаемое количество участников
                  <input class="form-input form-input--quantity" type="number" name="participants" value="{{old('participants')}}">
               </label>
               <label class="form-label form-label--flow width-100">Описание
                  <textarea class="form-textarea width-100" type="text" name="description">{{old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
   </main>
@endsection