@extends('layouts.master')

@section('title', isset($category) ? $category->title : 'Книги')

@section('content')
   <main class="books-page" id="books-page">
      <section class="books-filter">
         <div class="container books-filter__container">
            <div class="catalog-dropdown" data-family="catalog">
               <button class="catalog-dropdown__button" data-family="catalog" type="button">
                  @if (isset($category))
                     {{$category->title}}                     
                  @else
                     Каталог
                  @endif
                  <svg data-family="catalog" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect data-family="catalog" x="0" fill="none" width="24" height="24"/><g><path data-family="catalog" d="M7 10l5 5 5-5"/></g></svg>
               </button>
               <div class="catalog-dropdown__content" data-family="catalog">
                  <ul class="catalog-dropdown__list" data-family="catalog">
                     @foreach ($booksCategories as $bookCategory)
                        <li class="catalog-dropdown__item" data-family="catalog">
                           <a class="catalog-dropdown__link" data-family="catalog" href="{{route('books.categories')}}?category={{$bookCategory->id}}">{{$bookCategory->title}}</a>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <div class="books-view">
               Вид: 
               <ul class="books-view__list">
                  <li class="books-view__item">
                     <a class="books-view__button {{$list == 'list' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list=list&sort={{$sort}}&page={{$page}}#books-page">Список</a>
                  </li>
                  <li class="books-view__item">
                     <a class="books-view__button {{$list == 'standard' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list=standard&sort={{$sort}}&page={{$page}}#books-page">Стандарт</a>
                  </li>
               </ul>
            </div>
            <div class="books-sort">
               Сортировка:
               <ul class="books-sort__list">
                  <li class="books-sort__item">
                     <a class="books-sort__link {{$sort == 'title' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list={{$list}}&sort=title&page={{$page}}#books-page">По названию</a>
                  </li>
                  <li class="books-sort__item">
                     <a class="books-sort__link {{$sort == 'newest' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list={{$list}}&sort=newest&page={{$page}}#books-page">По новшеству</a>
                  </li>
                  <li class="books-sort__item">
                     <a class="books-sort__link {{$sort == 'rating' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list={{$list}}&sort=rating&page={{$page}}#books-page">По рейтингу</a>
                  </li>
                  <li class="books-sort__item">
                     <a class="books-sort__link {{$sort == 'available' ? 'current' : ''}}" href="{{route('books')}}{{isset($category) ? '/categories?category=' . $category->id . '&' : '?'}}list={{$list}}&sort=available&page={{$page}}#books-page">По доступности</a>
                  </li>
               </ul>
            </div>
         </div>
      </section>
      @isset($category)
         <div class="container">
            <ul class="breadcrumbs books-categories__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('books')}}">Книги</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">{{$category->title}}</a>
               </li>
            </ul>
         </div>
      @endisset
      <section class="books">
         <div class="container books__container">
            <ul class="books__list {{$list == 'list' ? 'hidden' : ''}}">
               @foreach ($books as $book)
                  <li class="books__item">
                     <x-books-card :book="$book" />
                  </li>
               @endforeach
            </ul>
            <ul class="ratings-list books__rating-list {{$list == 'standard' ? 'hidden' : ''}}">
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
         </div>
      </section>
      <section class="about-books">
         <div class="container">
            <h2 class="about-books__title">Пара слов о книгах</h2>
            <p class="about-books__text">
               <strong>Книга</strong> — один из видов печатной продукции: непериодическое издание, состоящее из сброшюрованных или отдельных бумажных листов (страниц) или тетрадей, на которых нанесена типографским или рукописным способом текстовая и графическая (иллюстрации) информация, имеющее, как правило, твёрдый переплёт.
            </p>
            <p class="about-books__text">
               Также книгой может называться литературное или научное произведение, предназначенное для печати в виде отдельного сброшюрованного издания.
            </p>
            <p class="about-books__text">
               С развитием информационных технологий всё более широкое распространение получают электронные книги — электронные версии печатных книг, которые можно читать на компьютерах или специальных устройствах.
            </p>
         </div>
      </section>
   </main>
@endsection