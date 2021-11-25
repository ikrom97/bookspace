@extends('dashboard.master')

@section('content')
   <main class="activity-read-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('activities.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск по мероприятиям . . ." autocomplete="off">
               </label>
               <button data-family="search" class="search-submit-btn visually-hidden" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Мероприятия: {{$quantity}}</div>
         <button class="toolbar-delete" type="button">Удалить мероприятия</button>
      </section>
         <div class="content">
            <h1>{{$activity->moderator}}</h1>
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
                  <a class="breadcrumbs-link current">{{$activity->moderator}}</a>
               </li>
            </ul>
            <section class="activity-read">
               <h2 class="activity-title">{{$activity->moderator}}</h2>
               <p class="activity-description">{{$activity->description}}</p>
               <ul class="activity-list">
                  <li class="activity-item">
                     Модератор <span class="activity-item-seperator"></span> <b>{{$activity->moderator}}</b>
                  </li>
                  <li class="activity-item">
                     Дата и время старта <span class="activity-item-seperator"></span> <b>{{$activity->start}}</b>
                  </li>
                  <li class="activity-item">
                     Дата и время окончания <span class="activity-item-seperator"></span> <b>{{$activity->end}}</b>
                  </li>
                  <li class="activity-item">
                     Место проведения <span class="activity-item-seperator"></span> <b>{{$activity->audience}}</b>
                  </li>
                  <li class="activity-item">
                     Количество участников <span class="activity-item-seperator"></span> <b>{{$activity->participants_quantity}} / <output>{{$activity->participants->count()}}</output></b>
                  </li>
               </ul>
            </section>
         <section class="activity-update" id="update">
            <h2 class="title">Редактировать</h2>
            <form class="form" action="{{route('activities.update')}}#update" method="post">
               @csrf
               <input type="hidden" name="activity-id" value="{{$activity->id}}">
               <label class="form-label">Модератор
                  <input class="form-input" type="text" name="moderator" value="{{old('moderator') == '' ? $activity->moderator : old('moderator')}}">
               </label>
               <label class="form-label">Дата и время старта
                  <div id="start"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="start" value="{{old('start') == '' ? $activity->start : old('start')}}">
               </label>
               <label class="form-label">Дата и время окончания
                  <div id="end"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="end" value="{{old('end') == '' ? $activity->end : old('end')}}">
               </label>
               <label class="form-label">Аудитория
                  <input class="form-input" type="text" name="audience" value="{{old('audience') == '' ? $activity->audience : old('audience')}}">
               </label>
               <label class="form-label">Желаемое количество участников
                  <input class="form-input form-input--quantity" type="number" name="participants" value="{{old('participants') == '' ? $activity->participants_quantity : old('participants')}}">
               </label>
               <label class="form-label form-label--flow width-100">Описание
                  <textarea class="form-textarea width-100 form-textarea--full" type="text" name="description">{{old('description') == '' ? $activity->description : old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('activities.delete')}}" method="post">
            @csrf
            <input name="activity-id" type="hidden" value="{{$activity->id}}">
            <p class="delete-message">Вы действительно хотите удалить?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection