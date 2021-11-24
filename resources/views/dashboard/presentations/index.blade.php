@extends('dashboard.master')

@section('content')
   <main class="presentations-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('presentations.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск пользователей . . ." autocomplete="off">
               </label>
               <button class="search-submit-btn visually-hidden" data-family="search" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Презентации: {{$quantity}}</div>
         <a class="create" href="{{route('dashboard.presentations.create')}}">Добавить новую презентацию</a>
      </section>
      <section class="content">
         <h1 id="users-title">Презентации</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Презентации</a>
            </li>
         </ul>
         <ul class="content-list">
            <li class="content-list-head">
               <span class="width-30">Название книги</span>
               <span class="width-25">Автор</span>
               <span class="width-20 txt-center">Аудитория</span>
               <span class="width-15 txt-center">Дата презентации</span>
               <span class="width-10 txt-center">Действие</span>
            </li>
            @foreach ($presentations as $presentation)
               <li class="content-list-item">
                  <span class="width-30">{{$rank++}}. {{$presentation->book->title}}</span>
                  <span class="width-25">{{$presentation->user->name}} {{$presentation->user->surname}}</span>
                  <span class="width-20 txt-center">{{$presentation->audience}}</span>
                  <span class="width-15 txt-center">{{$presentation->date}}</span>
                  <div class="content-actions width-10">
                     <a class="content-action green-bg" href="{{route('dashboard.presentations.read', $presentation->id)}}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                     </a>
                     <a class="content-action secondary-bg" href="{{route('dashboard.presentations.read', $presentation->id)}}#update">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
                     </a>
                     <button class="content-action red-bg" data-action="delete" data-presentation="{{$presentation->id}}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                     </button>
                  </div>
               </li>
            @endforeach
         </ul>
         {{$presentations->links('components/pagination')}}
      </section>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('presentations.delete')}}" method="post">
            @csrf
            <input name="presentation-id" type="hidden" data-id="presentation-id">
            <p class="delete-message">Вы действительно хотите удалить эту презентацию?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection