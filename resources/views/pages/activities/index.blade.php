@extends('layouts.master')

@section('title', 'Мероприятия клуба')

@section('content')
   <main class="activities-page">
      <div class="container activities__container">
         <h1 class="activities__heading">Ближайшие мероприятия книжного клуба</h1>
         @if ($activities->count() == 0)
            <div class="container">
               К сожалению, на ближайшее время мероприятий не запланировано.
            </div>
         @else
            @foreach ($activities as $activity)
               <section class="activity">
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
                     <a class="activity-link {{$activity->participants_quantity == $activity->participants->count() ? 'disabled' : ''}}" @if ($activity->participants_quantity != $activity->participants->count()) href="{{route('activities.participate')}}?id={{$activity->id}}" @endif>Я хочу участвовать!</a>
               </section>
            @endforeach
         @endif
      </div>
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