@extends('dashboard.master')

@section('content')
   <main class="users-read-page">
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
         <button class="toolbar-delete" type="button">Удалить пользователя</button>
      </section>
      <div class="content">
         <h1>{{$user->surname}} {{$user->name}}</h1>
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
               <a class="breadcrumbs-link current">{{$user->surname}} {{$user->name}}</a>
            </li>
         </ul>
         <section class="user-read">
            <img class="user-avatar" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->surname}} {{$user->name}}">
            <ul class="user-info">
               <li class="user-description">{{$user->description}}</li>
               <li class="user-info-item">
                  Роль <span></span> <b>{{$user->role == 'user' ? 'Пользователь' : 'Администратор'}}</b>
               </li>
               <li class="user-info-item">
                  Логин <span></span> <b>{{$user->login}}</b>
               </li>
               <li class="user-info-item">
                  Электронная почта <span></span> <b>{{$user->email}}</b>
               </li>
               <li class="user-info-item">
                  Телефон <span></span> <b>{{$user->phone}}</b>
               </li>
               <li class="user-info-item">
                  Компания <span></span> <b>{{$user->company->title}}</b>
               </li>
               <li class="user-info-item">
                  Участие в мероприятиях <span></span> <b>{{$user->actions->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во прочитанных страниц <span></span> <b>{{$user->read_pages}}</b>
               </li>
               <li class="user-info-item">
                  К-во прочитанных книг <span></span> <b>{{$user->taken_books->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во презентованных книг <span></span> <b>{{$user->presentations->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во забронированных книг <span></span> <b>{{$user->booked_books->count()}}</b>
               </li>
               <li class="user-info-item">
                  К-во продленных дедлайнов <span></span> <b>{{$user->renewed_deadlines}}</b>
               </li>
               <li class="user-info-item">
                  К-во нарушений <span></span> <b>{{$user->blacklist_value}}</b>
               </li>
               <li class="user-info-item">
                  Статус <span></span> <b>{{$user->book ? 'Читает ' . $user->book->title : 'Не читает'}}</b>
               </li>
            </ul>
         </section>
         <section class="user-update">
            <h2 class="title" id="update">Редактирование</h2>
            <form class="form" action="{{route('users.update')}}#update" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="user-id" value="{{$user->id}}">
               <div class="form-avatar-wrap">
                  <label class="form-avatar-label">Фото профиля
                     <img class="form-avatar" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->name}}">
                     <input class="form-img-input visually-hidden" name="avatar" type="file" accept=".jpg, .jpeg, .png">
                  </label>
                  <p class="img-awarn">
                     Расширение: .jpg, jpeg, .png <br>
                     Разрешение: 260px X 300px <br>
                     Размер: до 200kb
                  </p>
               </div>
               <label class="form-label">Фамилия
                  <input class="form-input" name="surname" type="text" value="{{old('surname') == '' ? $user->surname : old('surname')}}">
               </label>
               <label class="form-label">Имя
                  <input class="form-input" name="name" type="text" value="{{old('name') == '' ? $user->name : old('name')}}">
               </label>
               <label class="form-label">Отчество
                  <input class="form-input" name="last_name" type="text" value="{{old('last_name') == '' ? $user->last_name : old('last_name')}}">
               </label>
               <label class="form-label">Роль
                  <select class="form-select" name="role">
                     <option value="user" {{$user->role == 'user' ? 'selected' : ''}}>Пользователь</option>
                     <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Администратор</option>
                  </select>
               </label>
               <label class="form-label">Логин
                  <input class="form-input" name="login" type="text" value="{{old('login') == '' ? $user->login : old('login')}}">
               </label>
               <label class="form-label">Электронная почта
                  <input class="form-input" name="email" type="text" value="{{old('email') == '' ? $user->email : old('email')}}">
               </label>
               <label class="form-label">Телефон
                  <input class="form-input" name="phone" type="number" value="{{old('phone') == '' ? $user->phone : old('phone')}}">
               </label>
               <label class="form-label">Компания
                  <select class="form-select" name="company">
                     @php $old = old('company'); @endphp
                     @foreach ($companies as $company)
                        <option value="{{$company->id}}" {{$old == $company->id ? 'selected' : ''}}>{{$company->title}}</option>
                     @endforeach
                  </select>
               </label>
               <label class="form-label">Черный список
                  <input class="form-input" name="blacklist" type="checkbox" {{$user->blacklist ? 'checked' : ''}}>
               </label>
               <label class="form-label form-label--flow width-100">Описание
                  <textarea class="form-textarea width-100 form-textarea--full" type="text" name="description">{{old('description') == '' ? $user->description : old('description')}}</textarea>
               </label>
               <div class="form-btn-wrapper">
                  <button class="button button--green" type="submit">Отправить</button>
                  <button class="button button--red" type="reset">Отмена</button>
               </div>
            </form>
         </section>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('users.delete')}}" method="post">
            @csrf
            <input name="user-id" type="hidden" value="{{$user->id}}">
            <p class="delete-message">Вы действительно хотите удалить этого пользователя?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection