@extends('layouts.master')

@section('title', 'Самая читающая компания')

@section('content')
   <main class="ratings-page">
      <div class="container ratings-page__container">
         @include('pages.ratings.sidebar')
         <section class="ratings">
            <h1 class="ratings-title" id="ratings-title">Самая читающая компания</h1>
            <ul class="ratings-list">
               <li class="ratings-list-head">
                  <span class="width-35">Название компании</span>
                  <span class="width-30 txt-center">К-во сотрудников</span>
                  <span class="width-20 txt-center">К-во страниц</span>
                  <span class="width-15 txt-center">К-во книг</span>
               </li>
               @foreach ($companies as $company)
                  <li class="ratings-list-item">
                     <a class="ratings-list-link inactive">
                        <span class="width-35">{{$rank++}}. {{$company->title}}</span>
                        <span class="width-30 txt-center">{{$company->employees->count()}}</span>
                        <span class="width-20 txt-center">{{$company->read_pages}}</span>
                        <span class="width-15 txt-center">{{$company->read_books}}</span>
                     </a>
                  </li>
               @endforeach
            </ul>
            {{$companies->links('components/pagination')}}
         </section>
      </div>
   </main>
@endsection