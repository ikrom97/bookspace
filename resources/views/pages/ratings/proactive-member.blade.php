@extends('layouts.master')

@section('title', 'Самый проактивный член клуба')

@section('content')
   <main class="ratings-page">
      <div class="container ratings-page__container">
         @include('pages.ratings.sidebar')
         <section class="ratings">
            <h1 class="ratings-title" id="ratings-title">Самый проактивный член клуба</h1>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-35">Имя и фамилия</span>
                  <span class="width-30">Компания</span>
                  <span class="width-20 txt-center">К-во презентаций</span>
                  <span class="width-15 txt-center">Активность</span>
               </li>
               @foreach ($users as $user)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link" href="{{route('users.read', $user->id)}}">
                        <span class="width-35">{{$rank++}}. {{$user->name}} {{$user->surname}}</span>
                        <span class="width-30">{{$user->company->title}}</span>
                        <span class="width-20 txt-center">{{$user->presentations_count}}</span>
                        <span class="width-15 txt-center">{{$user->participations_count}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$users->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection