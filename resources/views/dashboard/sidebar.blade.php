<aside class="dashboard-sidebar {{session()->get('sidebar')}}">
   <nav class="main-navigation">
      <a class="dashboard-logo" href="{{route('home')}}" target="_blank">
         <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
         {{$site->title}}
      </a>
      <ul class="pages-navigation">
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.books' || $route == 'dashboard.books.create' || $route == 'dashboard.books.read' ? 'current' : ''}}" href="{{route('dashboard.books')}}">Книги</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.users' || $route == 'dashboard.users.create' || $route == 'dashboard.users.read' ? 'current' : ''}}" href="{{route('dashboard.users')}}">Читатели</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.banners' || $route == 'dashboard.banners.create' || $route == 'dashboard.banners.read' ? 'current' : ''}}" href="{{route('dashboard.banners')}}">Баннеры</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.presentations' || $route == 'dashboard.presentations.create' || $route == 'dashboard.presentations.read' ? 'current' : ''}}" href="{{route('dashboard.presentations')}}">Презентации</a>
         </li>
         <li class="pages-navigation-item">
            <a class="pages-navigation-link {{$route == 'dashboard.activities' || $route == 'dashboard.activities.create' || $route == 'dashboard.activities.read' ? 'current' : ''}}" href="{{route('dashboard.activities')}}">Мероприятия</a>
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
   <a class="dashboard-btn" href="{{route('dashboard.sidebar')}}">
      <svg class="hamburger-icon" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h16v16H0z"/><path d="M1 9h14V7H1v2zm0 5h14v-2H1v2zM1 2v2h14V2H1z"/></svg>
      <svg class="close-icon" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"/></svg>
   </a>
</aside>