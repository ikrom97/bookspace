@extends('layouts.master')

@section('title', 'Прочитанные книги')

@section('content')
   <main class="account-page">
      <div class="container ratings-page__container">
         @include('pages.account.sidebar')
         <section class="ratings">
            <h1 class="ratings-title account__title" id="account-title">Прочитанные книги</h1>
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
                  <a class="breadcrumbs-link current">Прочитанные книги</a>
               </li>
            </ul>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-35">Название книги</span>
                  <span class="width-35">Автор</span>
                  <span class="width-15 txt-center">К-во страниц</span>
                  <span class="width-15 txt-center">Рейтинг</span>
               </li>
               @foreach ($books as $book)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('books.read', $book->book->id)}}">
                        <span class="width-35">{{$rank++}}. {{$book->book->title}}</span>
                        <span class="width-35">{{$book->book->author}}</span>
                        <span class="width-15 txt-center">{{$book->book->pages}}</span>
                        <span class="width-15 txt-center">{{$book->book->rating}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$books->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection