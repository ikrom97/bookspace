@extends('layouts.master')

@section('title', 'Главная')

@section('content')
   <main class="home-page">
      <section class="vitrin">
         <div class="owl-carousel vitrin-carousel">
            @foreach ($banners as $banner)
               <img src="{{asset('img/banners/' . $banner->img)}}" alt="{{$banner->title}}">
            @endforeach
         </div>
      </section>
      <section class="books-categories">
         <div class="container">
            <ul class="books-categories-list">
               @foreach ($categories as $category)
                  <li class="books-categories-item">
                     <a class="books-categories-card" href="{{route('books.categories', $category->id)}}">
                        <div class="books-categories-icon">
                           {!! $category->icon !!}
                        </div>
                        <h3 class="books-categories-title">{{$category->title}}</h3>
                        <div class="view-link">
                           <span class="more-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525"><g id="download" transform="translate(0 14.525) rotate(-90)"><path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff"/></g></svg>
                           </span>
                           Посмотреть
                        </div>
                     </a>
                  </li>
               @endforeach
            </ul>
         </div>
      </section>
      <section class="popular-books">
         <div class="container popular-books__container">
            <h2 class="popular-books-title">Популярные книги</h2>
            <div class="owl-carousel popular-books-carousel">
               @foreach ($popularBooks as $book)
                  <div class="popular-books-item">
                     <x-books-card :book="$book" />
                  </div>
               @endforeach
            </div>
         </div>
      </section>
      <section class="popular-books">
         <div class="container popular-books__container">
            <h2 class="popular-books-title">Новинки книг</h2>
            <div class="owl-carousel popular-books-carousel">
               @foreach ($newBooks as $book)
                  <div class="popular-books-item">
                     <x-books-card :book="$book" />
                  </div>
               @endforeach
            </div>
         </div>
         <div class="container">
            <div class="books-info">
               <p>
                  {{$categories->count()}} Категорий и <br>
                  <b>{{$booksCount}} книг</b>
               </p>
               <a class="books-info-link" href="{{route('books')}}">Все книги</a>
            </div>
         </div>
      </section>
      <section class="map">
         <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A296a88acbeccb9daf585522582b71804d69728bffe8a62e1903c1a7fd9dab54f&amp;source=constructor" width="1280" height="511" frameborder="0"></iframe>
      </section>
   </main>
@endsection