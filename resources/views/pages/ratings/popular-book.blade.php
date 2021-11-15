@extends('layouts.master')

@section('title', 'Самая популярная книга')

@section('content')
   <main class="ratings-page">
      <div class="container ratings-page__container">
         @include('pages.ratings.sidebar')
         <section class="ratings">
            <h1 class="ratings-title" id="ratings-title">Самая популярная книга</h1>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-35">Название книги</span>
                  <span class="width-35">Автор</span>
                  <span class="width-15 txt-center">К-во страниц</span>
                  <span class="width-15 txt-center">Рейтинг</span>
               </li>
               @foreach ($books as $book)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('books.read', $book->id)}}">
                        <span class="width-35">{{$rank++}}. {{$book->title}}</span>
                        <span class="width-35">{{$book->author}}</span>
                        <span class="width-15 txt-center">{{$book->pages}}</span>
                        <span class="width-15 txt-center">{{$book->rating}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$books->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection