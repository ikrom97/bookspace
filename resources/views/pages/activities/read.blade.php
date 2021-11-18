@extends('layouts.master')

@section('title', 'Мероприятие клуба')

@section('content')
   <main class="activities-read-page">
      <div class="container">
         <h1 class="users__title">{{$activity->moderator}}</h1>
         <ul class="breadcrumbs users__breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('activities')}}">Мероприятие клуба</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$activity->moderator}}</a>
            </li>
         </ul>
      </div>
      <section class="activity-read">
         <div class="container">
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
         </div>
      </section>
      <section class="about-activities">
         <div class="container">
            <h2 class="about-activities__title">Пара слов о мероприятиях</h2>
            <p class="about-activities__text">
               <strong>Мероприятия</strong>, организованные в рамках Книжного Клуба «AtS» помогают нашим читателям пройти путь от чувства, 
               что <b>читать – это весело</b> и <b>интересно</b>, до – это полезно и это каждого развивает и интеллектуально и профессионально,
               а значит каждый сможет добиться целей и стать успешным!
            </p>
         </div>
      </section>
   </main>
@endsection