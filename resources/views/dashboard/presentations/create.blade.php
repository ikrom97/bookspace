@extends('dashboard.master')

@section('content')
   <main class="presentations-create-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('presentations.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск по книгам . . ." autocomplete="off">
               </label>
               <button data-family="search" class="search-submit-btn visually-hidden" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Презентации: {{$quantity}}</div>
      </section>
      <div class="content">
         <h1>Добавить новую презентацию</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.presentations')}}">Презентации</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Добавить</a>
            </li>
         </ul>
         <section class="banner-update">
            <form class="form" action="{{route('presentations.create')}}" method="post" enctype="multipart/form-data">
               @csrf
               <label class="form-label">Выберите книгу которую хотите презентовать
                  <select class="form-select" name="book">
                     <option value="" selected></option>
                     @php $old = old('book'); @endphp
                     @foreach ($books as $book)
                        <option value="{{$book->id}}" {{$old == $book->id ? 'selected' : ''}}>{{$book->title}} ({{$book->code}})</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label">Выберите пользователя который будет презентовать эту книгу
                  <select class="form-select" name="user">
                     <option value="" selected></option>
                     @php $old = old('user'); @endphp
                     @foreach ($users as $user)
                        <option value="{{$user->id}}" {{$old == $user->id ? 'selected' : ''}}>{{$user->surname}} {{$user->name}}</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label">Дата и время презентации
                  <div id="picker"></div>
                  <input class="form-input form-input--datetime" id="result" type="text" name="datetime" value="{{old('datetime')}}">
               </label>
               <label class="form-label form-label--flow">Предпочитаемая аудитория
                  <input class="form-input form-input--flow" type="text" name="audience" value="{{old('audience')}}">
               </label>
               <label class="form-label">Желаемое количество участников
                  <input class="form-input form-input--quantity" type="number" name="participants" value="{{old('participants')}}">
               </label>
               <label class="form-label form-label--flow">Послание спикера слушателям - отзыв о книге
                  <textarea class="form-textarea width-100" type="text" name="description">{{old('description')}}</textarea>
               </label>
               <label class="form-label" for="presentation">Прикрепить презентацию
                  <input class="form-input form-input--file" type="file" name="presentation" value="{{old('presentation')}}">
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
   </main>
@endsection