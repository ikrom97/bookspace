@extends('dashboard.master')

@section('content')
   <main class="users-create-page">
      <section class="toolbar">
         <div class="search-wrap">
            <form class="search-form" data-family="search" action="{{route('users.search')}}" method="get">
               @csrf
               <label class="search-label" data-family="search">
                  <span class="search-icon" data-family="search">
                     <svg data-family="search" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17l5 5m-2.5-11.25a8.75 8.75 0 11-17.5 0 8.75 8.75 0 0117.5 0z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск пользователей . . ." autocomplete="off">
               </label>
               <button data-family="search" class="search-submit-btn visually-hidden" type="submit"></button>
            </form>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <div class="quantity">Пользователи: {{$quantity}}</div>
      </section>
      <div class="content">
         <h1>Добавление пользователя</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.users')}}">Пользователи</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Добавление пользователя</a>
            </li>
         </ul>
         <section class="user-create">
            <form class="form" action="{{route('users.create')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-avatar-wrap">
                  <label class="form-avatar-label">Фото профиля
                     <img class="form-avatar" src="{{asset('img/users/default.jpg')}}">
                     <input class="form-img-input visually-hidden" name="avatar" type="file" accept=".jpg, .jpeg, .png">
                  </label>
                  <p class="img-awarn">
                     Расширение: .jpg, jpeg, .png <br>
                     Разрешение: 260px X 300px <br>
                     Размер: до 200kb
                  </p>
               </div>
               <label class="form-label">Фамилия
                  <input class="form-input" name="surname" type="text" value="{{old('surname')}}">
               </label>
               <label class="form-label">Имя
                  <input class="form-input" name="name" type="text" value="{{old('name')}}">
               </label>
               <label class="form-label">Отчество
                  <input class="form-input" name="last_name" type="text" value="{{old('last_name')}}">
               </label>
               <label class="form-label">Роль
                  <select class="form-select" name="role">
                     @php $old = old('role'); @endphp
                     <option value="user" {{$old == 'user' ? 'selected' : ''}}>Пользователь</option>
                     <option value="admin" {{$old == 'admin' ? 'selected' : ''}}>Администратор</option>
                  </select>
               </label>
               <label class="form-label">Логин
                  <input class="form-input" name="login" type="text" value="{{old('login')}}">
               </label>
               <label class="form-label">Электронная почта
                  <input class="form-input" name="email" type="text" value="{{old('email')}}">
               </label>
               <label class="form-label">Телефон
                  <input class="form-input" name="phone" type="number" value="{{old('phone')}}">
               </label>
               <label class="form-label">Компания
                  <select class="form-select" name="company">
                     <option value="" selected></option>
                     @php $old = old('company'); @endphp
                     @foreach ($companies as $company)
                        <option value="{{$company->id}}" {{$old == $company->id ? 'selected' : ''}}>{{$company->title}}</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label form-label--flow width-100">Описание
                  <textarea class="form-textarea width-100" type="text" name="description">{{old('description')}}</textarea>
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