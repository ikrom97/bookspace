@extends('layouts.master')

@section('title', 'Читатели')
    
@section('content')
   <main class="users-page">
      <div class="container">
         <h1 class="users__title" id="users-title">Читатели</h1>
         <ul class="breadcrumbs users__breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Читатели</a>
            </li>
         </ul>
      </div>
      <section class="all-users">
         <div class="container">
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