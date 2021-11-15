@extends('layouts.master')

@section('title', 'Самый дисциплинированный читатель')

@section('content')
   <main class="ratings-page">
      <div class="container ratings-page__container">
         @include('pages.ratings.sidebar')
         <section class="ratings">
            <h1 class="ratings-title" id="ratings-title">Самый дисциплинированный читатель</h1>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-30">Имя и фамилия</span>
                  <span class="width-30">Компания</span>
                  <span class="width-20 txt-center">К-во нарушений</span>
                  <span class="width-20 txt-center">Продленные дедлайны</span>
               </li>
               @foreach ($users as $user)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('users.read', $user->id)}}">
                        <span class="width-30">{{$rank++}}. {{$user->name}} {{$user->surname}}</span>
                        <span class="width-30">{{$user->company->title}}</span>
                        <span class="width-20 txt-center">{{$user->blacklist_value}}</span>
                        <span class="width-20 txt-center">{{$user->renewed_deadlines}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$users->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection