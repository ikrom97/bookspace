@extends('layouts.master')

@section('title', 'Самый активный читатель')

@section('content')
   <main class="ratings-page">
      <div class="container ratings-page__container">
         @include('pages.ratings.sidebar')
         <section class="ratings">
            <h1 class="ratings-title" id="ratings-title">Самый активный читатель</h1>
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
         </section>
      </div>
   </main>
@endsection