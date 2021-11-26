<header class="header">
   <section class="header-top">
      <div class="container header-top__container">
         <a class="header-logo" href="{{route('home')}}">
            <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
            <span>{{$site->title}}</span>
         </a>
         <div class="search-wrap">
            <div class="search">
               <form class="search-form" action="{{route('search')}}" data-family="search" method="get">
                  @csrf
                  <input class="search-input" data-family="search" type="search" name="keyword" placeholder="Поиск..." autocomplete="off">
                  <button class="search-submit-btn" data-family="search" type="submit">
                     <svg class="search-icon" data-family="search" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-family="search" d="M17 17L22 22M19.5 10.75C19.5 15.5825 15.5825 19.5 10.75 19.5C5.91751 19.5 2 15.5825 2 10.75C2 5.91751 5.91751 2 10.75 2C15.5825 2 19.5 5.91751 19.5 10.75Z" stroke="#fff " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                     <svg class="search-close-icon" data-family="search" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g data-family="search" data-name="Layer 2"><g data-family="search" data-name="close"><rect data-family="search" width="24" height="24" transform="rotate(180 12 12)" opacity="0"/><path data-family="search" d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/></g></g></svg>
                  </button>
               </form>
            </div>
            <ul class="search-result" data-family="search"></ul>
         </div>
         <a class="notification-link" href="{{route('notifications')}}">
            <svg class="notification-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
               <path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
            </svg>
            @if ($notes->count() != 0) 
               <output class="notification-quantity">{{$notes->count()}}</output>
            @endif
         </a>
         <a class="viber-link" href="#">
            <svg class="viber-icon" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="viber" class="svg-inline--fa fa-viber fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
               <path fill="currentColor" d="M444 49.9C431.3 38.2 379.9.9 265.3.4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9.4-85.7.4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9.4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9.6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4.7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5.9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9.1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7.5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1.8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z"></path>
            </svg>
         </a>
         <div class="taken-book">
            @if ($loggedUser->book)
               <a class="taken-book-link" href="{{route('books.read', $loggedUser->book->id)}}">
                  {{$loggedUser->book->title}}
               </a>
               @if(date('Y-m-d H:i:s') < $loggedUser->book->return_date)
                  <input data-id="year" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('Y')}}">
                  <input data-id="month" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('m')}}">
                  <input data-id="day" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('d')}}">
                  <a class="taken-book-deadline" href="{{route('books.extendDeadline', $loggedUser->book->id)}}">
                     <span data-id="days"></span><small class="days-icon">д</small>
                     <span data-id="hours"></span><b>:</b>
                     <span data-id="minutes"></span><b>:</b>
                     <span data-id="seconds"></span>
                  </a>
               @else 
                  <p class="times-over">00:00:00</p>
               @endif
            @else
            <p>Вы не читаете книг</p>
            @endif
         </div>
      </div>
   </section>
   <section class="header-bottom">
      <div class="container header-bottom__container">
         <blockquote class="site-quote">
            <span>Быть</span> 
            умным модно!!<br>
            Профессионалом своего дела-гордо!!! 
         </blockquote>
         <div class="contact-phone">
            <svg class="contact-phone-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
               <path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
            </svg>
            {{$site->phone}}
            <button class="feedback" type="button">Обратная связь</button>
         </div>
         <div class="account-link-wrap">
            <a class="account-link" href="{{route('account.profile')}}">
               <svg class="account-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
               </svg>
               {{$loggedUser->name}} {{$loggedUser->surname}}
            </a>
            @if ($loggedUser->role == 'admin')
               <a class="dashboard-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
            @endif
         </div>
         <nav class="main-navigation">
            <ul class="page-navigation">
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'home' ? 'current' : ''}}" href="{{route('home')}}">Главная</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'about' ? 'current' : ''}}" href="{{route('about')}}">О клубе</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'ratings.activeReader' || $route == 'ratings.disciplinedReader' || $route == 'ratings.popularBook' || $route == 'ratings.proactiveMember' || $route == 'ratings.readingCompany' ? 'current' : ''}}" href="{{route('ratings.activeReader')}}">Рейтинги</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'presentations' ? 'current' : ''}}" href="{{route('presentations')}}">Презентация книг</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'activities' ? 'current' : ''}}" href="{{route('activities')}}">Мероприятия клуба</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'rules' ? 'current' : ''}}" href="{{route('rules')}}">Правила пользования библиотекой</a>
               </li>
               <li class="page-navigation-item">
                  <a class="page-navigation-link {{$route == 'books' || $route == 'books.read' ? 'current' : ''}}" href="{{route('books')}}">Книги</a>
               </li>   
            </ul> 
         </nav>
      </div>
   </section>
   <div class="feedback-modal hidden">
      <form class="feedback-form" action="{{route('feedback.send')}}" method="post">
         @csrf
         <fieldset>
            <legend>Обратная связь</legend>
            <label class="feedback-label">Напишите нам
               <textarea class="feedback-textarea" name="message" placeholder="Ваш вопрос или сообщение*" required></textarea>
            </label>
         </fieldset>
         <button class="button button--red" type="reset">Отмена</button>
         <button class="button button--green" type="submit">Отправить</button>
      </form>
   </div>
</header>