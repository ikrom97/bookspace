@extends('dashboard.master')

@section('content')
   <main class="banners-read-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('banners.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск по баннерам . . ." autocomplete="off">
               </label>
               <button data-family="search" class="search-submit-btn visually-hidden" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Баннеры: {{$quantity}}</div>
         <button class="toolbar-delete" type="button">Удалить баннер</button>
      </section>
      <div class="content">
         <h1>{{$banner->title}}</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.banners')}}">Баннеры</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">{{$banner->title}}</a>
            </li>
         </ul>
         <section class="banner-read">
            <img class="banner-read__img" src="{{asset('img/banners/' . $banner->img)}}">
            <ul class="banner-info">
               <li class="book-item">
                  Название <span class="book-item-seperator"></span> <b>{{$banner->title}}</b>
               </li>
            </ul>
         </section>
         <section class="banner-update" id="update">
            <h2 class="title">Редактировать баннер</h2>
            <form class="form" action="{{route('banners.update')}}#update" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="banner-id" value="{{$banner->id}}">
               <label class="form-banner-label">Баннер
                  <img class="form-banner" src="{{asset('img/banners/' . $banner->img)}}" alt="{{$banner->title}}">
                  <input class="form-img-input visually-hidden" onchange="this.form.submit()" name="banner" type="file" accept=".jpg, .jpeg, .png">
                  <p class="img-awarn">Расширение: .jpg, jpeg, .png Разрешение: 1900px X 390px Размер: до 200kb</p>
               </label>
               <label class="form-label">Название баннера
                  <input class="form-input" type="text" name="title" value="{{old('title') == '' ? $banner->title : old('title')}}">
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('banners.delete')}}" method="post">
            @csrf
            <input name="banner-id" type="hidden" value="{{$banner->id}}">
            <p class="delete-message">Вы действительно хотите удалить этот баннер?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection