@extends('layouts.master')

@section('title', 'Участие в мероприятиях')

@section('content')
   <main class="account-page">
      <div class="container ratings-page__container">
         @include('pages.account.sidebar')
         <section class="ratings">
            <h1 class="ratings-title account__title" id="account-title">Участие в мероприятиях</h1>
            <ul class="breadcrumbs account__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('account.profile')}}">Личный кабинет</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">Участие в мероприятиях</a>
               </li>
            </ul>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-40">Модератор</span>
                  <span class="width-25">Аудитория</span>
                  <span class="width-10 txt-center">Участники</span>
                  <span class="width-25 txt-center">Дата окончания</span>
               </li>
               @foreach ($activities as $activity)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('activities.read', $activity->id)}}">
                        <span class="width-40">{{$rank++}}. {{$activity->moderator}}</span>
                        <span class="width-25">{{$activity->audience}}</span>
                        <span class="width-10 txt-center">{{$activity->participants->count()}}</span>
                        <span class="width-25 txt-center">{{$activity->end}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$activities->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection