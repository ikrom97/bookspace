@extends('layouts.master')

@section('title', 'Забронированные книги')

@section('content')
   <main class="account-page">
      <div class="container ratings-page__container">
         @include('pages.account.sidebar')
         <section class="ratings">
            <h1 class="ratings-title account__title" id="account-title">Забронированные книги</h1>
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
                  <a class="breadcrumbs-link current">Забронированные книги</a>
               </li>
            </ul>
            <ul class="booked-books-list">
               @foreach ($books as $book)
                  <li class="booked-books-item">
                     <x-books-card :book="$book->book" />
                  </li>
               @endforeach
            </ul>
         </section>
      </div>
   </main>
@endsection