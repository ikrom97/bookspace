<aside class="ratings-sidebar">
   <ul class="ratings-navigation">
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.profile' ? 'current' : ''}}" href="{{route('account.profile')}}">Профиль</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.readers' ? 'current' : ''}}" href="{{route('account.readers')}}">Читатели</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.readBooks' ? 'current' : ''}}" href="{{route('account.readBooks')}}">Прочитанные книги</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.activities' ? 'current' : ''}}" href="{{route('account.activities')}}">Участие в мероприятиях</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.bookedBooks' ? 'current' : ''}}" href="{{route('account.bookedBooks')}}">Забронированные книги</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'account.presentation' ? 'current' : ''}}" href="{{route('account.presentation')}}">Презентация</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link" href="{{route('auth.logout')}}">Выйти</a>
      </li>
   </ul>
</aside>