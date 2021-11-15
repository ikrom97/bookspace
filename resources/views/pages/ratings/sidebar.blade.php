<aside class="ratings-sidebar">
   <ul class="ratings-navigation">
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'ratings.activeReader' ? 'current' : ''}}" href="{{route('ratings.activeReader')}}">Самый активный читатель</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'ratings.disciplinedReader' ? 'current' : ''}}" href="{{route('ratings.disciplinedReader')}}">Самый дисциплинированный читатель</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'ratings.popularBook' ? 'current' : ''}}" href="{{route('ratings.popularBook')}}">Самая популярная книга</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'ratings.proactiveMember' ? 'current' : ''}}" href="{{route('ratings.proactiveMember')}}">Самый проактивный член клуба</a>
      </li>
      <li class="ratings-navigation-item">
         <a class="ratings-navigation-link {{$route == 'ratings.readingCompany' ? 'current' : ''}}" href="{{route('ratings.readingCompany')}}">Самая читающая компания</a>
      </li>
   </ul>
</aside>