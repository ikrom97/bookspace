@extends('dashboard.master')

@section('content')
   <main class="books-create-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('books.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input data-family="search" class="search-input" type="search" name="keyword" placeholder="Поиск по книгам . . ." autocomplete="off">
               </label>
               <button class="search-submit-btn visually-hidden" data-family="search" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Книги: {{$quantity}}</div>
      </section>
      <div class="content">
         <h1>Добавление книги</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Книги</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Добавление книги</a>
            </li>
         </ul>
         <section class="book-update" id="create">
            <form class="form" action="{{route('books.create')}}#create" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-img-wrap">
                  <label class="form-img-label" data-label="front">Фронтальное фото
                     <img class="form-img" src="{{asset('img/books/default-front.jpg')}}" data-img="front">
                     <input class="form-img-input visually-hidden" data-type="front" name="img-front" type="file" accept=".jpg, .jpeg, .png" value="{{old('img-front')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 300px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
                  <label class="form-img-label form-img-label--side" data-label="side">Фото боковой части
                     <img class="form-img form-img--side" src="{{asset('img/books/default-side.jpg')}}" data-img="side">
                     <input class="form-img-input visually-hidden" data-type="side" name="img-side" type="file" accept=".jpg, .jpeg, .png" value="{{old('img-side')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 50px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
                  <label class="form-img-label" data-label="back">Фото задней части
                     <img class="form-img" src="{{asset('img/books/default-back.jpg')}}" data-img="back">
                     <input class="form-img-input visually-hidden" data-type="back" name="img-back" type="file" accept=".jpg, .jpeg, .png" value="{{old('img-back')}}">
                     <p class="img-awarn">
                        Расширение: .jpg, jpeg, .png <br>
                        Разрешение: 300px X 450px <br>
                        Размер: до 200kb
                     </p>
                  </label>
               </div>
               <label class="form-label">Название книги
                  <input class="form-input" type="text" name="title" value="{{old('title')}}">
               </label>
               <label class="form-label">Автор книги
                  <input class="form-input form-input--author" type="text" name="author" value="{{old('author')}}">
               </label>
               <label class="form-label">Страницы
                  <input class="form-input form-input--pages" type="number" name="pages" value="{{old('pages')}}">
               </label>
               <label class="form-label">Категория
                  <select class="form-select" name="category">
                     <option value="" selected></option>
                     @php $old = old('category'); @endphp
                     @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$old == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label">Артикул
                  <input class="form-input form-input--pages" type="number" name="code" value="{{old('code')}}">
               </label>
               <label class="form-label form-label--flow">Описание
                  <textarea class="form-textarea width-100" type="text" name="description">{{old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Добавить книгу</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
   </main>
@endsection