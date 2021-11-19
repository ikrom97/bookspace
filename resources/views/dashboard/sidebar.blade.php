<aside class="dashboard-sidebar">
   <nav class="main-navigation">
      <a class="dashboard-logo" href="{{route('home')}}">
         <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
         {{$site->title}}
      </a>
      <ul class="pages-navigation">
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.books' || $route == 'dashboard.books.create' || $route == 'dashboard.books.read' ? 'current' : ''}}" href="{{route('dashboard.books')}}">Книги</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.users' || $route == 'dashboard.users.create' || $route == 'dashboard.read' ? 'current' : ''}}" href="{{route('dashboard.users')}}">Читатели</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="#">Новости</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="#">Презентации</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="#">Мероприятия</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="#">Компании</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="#">Библиотека</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link" href="{{route('auth.logout')}}">Выход</a>
         </li>
      </ul>
   </nav>
   <button class="dashboard-btn" type="button">
      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h16v16H0z"/><path d="M1 9h14V7H1v2zm0 5h14v-2H1v2zM1 2v2h14V2H1z"/></svg>
   </button>
</aside>