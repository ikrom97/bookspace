@extends('layouts.master')

@section('title', $user->surname)
    
@section('content')
   <main class="users-read-page">
      <div class="container">
         <h1 class="users__title">{{$user->surname}} {{$user->name}} {{$user->last_name}}</h1>
         <ul class="breadcrumbs users__breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('users')}}">Читатели</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$user->surname}} {{$user->name}} {{$user->last_name}}</a>
            </li>
         </ul>
      </div>
      <section class="user-read">
         <div class="container user-read__container">
            <img class="user-avatar" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->surname}} {{$user->name}}">
            <ul class="user-info">
               <li class="user-description">{{$user->description}}</li>
               <li class="user-info-item">
                  Роль <span></span> <b>{{$user->role == 'user' ? 'Пользователь' : 'Администратор'}}</b>
               </li>
               <li class="user-info-item">
                  Логин <span></span> <b>{{$user->login}}</b>
               </li>
               <li class="user-info-item">
                  Электронная почта <span></span> <b>{{$user->email}}</b>
               </li>
               <li class="user-info-item">
                  Телефон <span></span> <b>{{$user->phone}}</b>
               </li>
               <li class="user-info-item">
                  Компания <span></span> <b>{{$user->company->title}}</b>
               </li>
               <li class="user-info-item">
                  Участие в мероприятиях <span></span> <b>{{$user->actions->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во прочитанных страниц <span></span> <b>{{$user->read_pages}}</b>
               </li>
               <li class="user-info-item">
                  К-во прочитанных книг <span></span> <b>{{$user->taken_books->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во презентованных книг <span></span> <b>{{$user->presentations->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во забронированных книг <span></span> <b>{{$user->booked_books->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во продленных дедлайнов <span></span> <b>{{$user->renewed_deadlines}}</b>
               </li>
               <li class="user-info-item">
                  К-во нарушений <span></span> <b>{{$user->blacklist_value}}</b>
               </li>
               <li class="user-info-item">
                  Статус <span></span> <b>{{$user->book ? 'Читает ' . $user->book->title : 'Не читает'}}</b>
               </li>
            </ul>
         </div>
      </section>
      <section class="all-users">
         <div class="container">
            <h2 id="users-title">Все читатели</h2>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-40">Имя и фамилия</span>
                  <span class="width-30">Компания</span>
                  <span class="width-15 txt-center">К-во страниц</span>
                  <span class="width-15 txt-center">К-во книг</span>
               </li>
               @foreach ($users as $user)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('users.read', $user->id)}}">
                        <span class="width-40">{{$rank++}}. {{$user->name}} {{$user->surname}}</span>
                        <span class="width-30">{{$user->company->title}}</span>
                        <span class="width-15 txt-center">{{$user->read_pages}}</span>
                        <span class="width-15 txt-center">{{$user->taken_books->count()}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$users->links('components/pagination')}}
         </div>
      </section>
   </main>
@endsection