@extends('layouts.master')

@section('title', 'Профиль')

@section('content')
   <main class="account-page account-profile-page">
      <div class="container ratings-page__container">
         @include('pages.account.sidebar')
         <section class="ratings">
            <h1 class="ratings-title account__title" id="account-title">Профиль</h1>
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
                  <a class="breadcrumbs-link current">Профиль</a>
               </li>
            </ul>
            <div class="profile__user-read">
               <div class="avatar-wrap @error('avatar') form--error @enderror">
                  <img class="profile-avatar" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->surname}} {{$user->name}}">
                  <form class="profile-avatar__form" action="{{route('profile.updateAvatar')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <label class="profile-avatar__label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44"><path d="M22 44c-3.309 0-6-2.665-6-5.941V28H5.941C2.665 28 0 25.309 0 22s2.665-6 5.941-6H16V5.941C16 2.665 18.691 0 22 0s6 2.665 6 5.941V16h10.059C41.335 16 44 18.691 44 22s-2.665 6-5.941 6H28v10.059C28 41.335 25.309 44 22 44zM5.941 18C3.805 18 2 19.832 2 22s1.805 4 3.941 4H18v12.059C18 40.195 19.832 42 22 42s4-1.805 4-3.941V26h12.059C40.195 26 42 24.168 42 22s-1.805-4-3.941-4H26V5.941C26 3.805 24.168 2 22 2s-4 1.805-4 3.941V18H5.941z"/></svg>
                        <input class="profile-avatar__input" onchange="this.form.submit()" type="file" name="avatar" accept=".jpg">
                     </label>        
                  </form>
               </div>
               <ul class="user-info">
                  <li class="user-info-title">{{$user->surname}} {{$user->name}} {{$user->last_name}}</li>
                  <li class="user-description">{{$user->description}}</li>
                  <li class="user-info-item width-55">
                     Роль <span></span> <b>{{$user->role == 'user' ? 'Пользователь' : 'Администратор'}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Логин <span></span> <b>{{$user->login}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Электронная почта <span></span> <b>{{$user->email}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Телефон <span></span> <b>{{$user->phone}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Компания <span></span> <b>{{$user->company->title}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Участие в мероприятиях <span></span> <b>{{$user->actions->count()}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во прочитанных страниц <span></span> <b>{{$user->read_pages}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во прочитанных книг <span></span> <b>{{$user->taken_books->count()}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во презентованных книг <span></span> <b>{{$user->presentations->count()}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во забронированных книг <span></span> <b>{{$user->booked_books->count()}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во продленных дедлайнов <span></span> <b>{{$user->renewed_deadlines}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     К-во нарушений <span></span> <b>{{$user->blacklist_value}}</b>
                  </li>
                  <li class="user-info-item width-55">
                     Статус <span></span> <b>{{$user->book ? 'Читает ' . $user->book->title : 'Не читает'}}</b>
                  </li>
               </ul>
            </div>
            <h2 id="profile-info">Основная информация</h2>
            <form class="form" action="{{route('profile.updateInfo')}}#profile-info" method="post">
               @csrf
               <label class="form-label">Фамилия
                  <input class="form-input" type="text" name="surname" value="{{old('surname') ? old('surname') : $user->surname}}">
               </label>
               <label class="form-label">Имя
                  <input class="form-input" type="text" name="name" value="{{old('name') ? old('name') : $user->name}}">
               </label>
               <label class="form-label">Отчество
                  <input class="form-input" type="text" name="last_name" value="{{old('last_name') ? old('last_name') : $user->last_name}}">
               </label>
               <label class="form-label">Логин
                  <input class="form-input" type="text" name="login" value="{{old('login') ? old('login') : $user->login}}">
               </label>
               <label class="form-label form-label--flow">Электронная почта
                  <input class="form-input form-input--flow" type="text" name="email" value="{{old('email') ? old('email') : $user->email}}">
               </label>
               <label class="form-label">Телефон
                  <input class="form-input" type="number" name="phone" value="{{old('phone') ? old('phone') : $user->phone}}">
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Сохранить изменения</button>
                  <a class="button button--red" href="{{request()->fullUrl()}}">Отмена</a>
               </div>
            </form>
            <h2 id="profile-password">Изменить пароль</h2>
            <form class="form password-form" action="{{route('profile.updatePassword')}}#profile-password" method="post">
               @csrf
               <label class="form-label form-label--flow width-100">Чтобы изменить пароль введите предыдущий пароль
                  <input class="form-textarea width-100" data-input="1" type="password" name="password">
                  <button class="form-password-btn" data-button="1" type="button">
                     <svg class="visible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                     <svg class="invisible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
                  </button>
               </label>
               <label class="form-label form-label--flow width-100">Введите новый пароль
                  <input class="form-textarea width-100" data-input="2" type="password" name="new-password">
                  <button class="form-password-btn" data-button="2" type="button">
                     <svg class="visible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                     <svg class="invisible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
                  </button>
               </label>
               <label class="form-label form-label--flow width-100">Повторите пароль
                  <input class="form-textarea width-100" data-input="3" type="password" name="confirm-password">
                  <button class="form-password-btn" data-button="3" type="button">
                     <svg class="visible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                     <svg class="invisible" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
                  </button>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Сохранить изменения</button>
                  <a class="button button--red" href="{{request()->fullUrl()}}">Отмена</a>
               </div>
            </form>
         </section>
      </div>
   </main>
@endsection