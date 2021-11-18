@extends('layouts.master')

@section('title', 'Презентация')

@section('content')
   <main class="account-page account-presentation-page">
      <div class="container ratings-page__container">
         @include('pages.account.sidebar')
         <section class="ratings">
            <h1 class="ratings-title account__title" id="account-title">Презентация</h1>
            <ul class="breadcrumbs account__breadcrumbs">
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link" href="{{route('account.profile')}}">Личный кабинет</a>
                  <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
               </li>
               <li class="breadcrumbs-item">
                  <a class="breadcrumbs-link current">Презентация</a>
               </li>
            </ul>
            <form class="form {{$errors->any() ? 'form--error' : ''}}" action="{{route('presentations.send')}}" method="post" enctype="multipart/form-data">
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
                  <input class="form-input form-input--file" type="file" name="presentation">
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