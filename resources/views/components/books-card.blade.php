<a class="books-card {{$book->user_id ? 'unavailable' : ''}}" href="{{route('books.read', $book->id)}}">
   <img class="books-card__img" src="{{asset('img/books/' . $book->img_front)}}" alt="{{$book->title}}">
   <div class="books-card__body">
      <h3 class="books-card__title">{{$book->title}}</h3>
      <p class="books-card__author">({{$book->author}})</p>
      <div class="books-card__view">
         <div class="books-card__rating">
            @foreach (range(1, $book->rating) as $key)
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
            @endforeach
         </div>
         <span class="books-card__view-icon">
            <svg width="7.102" height="14.525" viewBox="0 0 7.102 14.525"><g transform="translate(0 14.525) rotate(-90)"><path d="M13.276.191,7.263,5.53,1.251.191a.8.8,0,0,0-1.037,0,.6.6,0,0,0,0,.921l6.53,5.8h0a.8.8,0,0,0,1.036,0l6.53-5.8a.6.6,0,0,0,0-.922A.8.8,0,0,0,13.276.191Z" fill="#fff"/></g></svg>
         </span>
         <span class="books-card__view-text">Посмотреть</span>
      </div>
      <span class="books-card__category-icon">
         {!!$book->category->icon!!}
      </span>
      @if ($book->user_id)
         <span class="books-card__status unavailable">Занято</span>
      @else
         <span class="books-card__status">Доступна</span>
      @endif
   </div>
</a>