@extends('layouts.master')

@section('title', 'Уведомления')

@section('content')
   <main class="notifications-page users-page">
      <div class="container">
         <h1 class="users__title">Уведомления</h1>
         <ul class="breadcrumbs users__breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('home')}}">Главная</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Уведомления</a>
            </li>
         </ul>
         <ul class="ratings-list">
            <li class="ratings-list-head">
               <span class="width-60">Заголовок</span>
               <span class="width-20 txt-center">Дата</span>
               <span class="width-20 txt-center">Статус</span>
            </li>
            @foreach ($notifications as $notification)
               @switch($notification->type)
                  @case('presentation')
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Презентация ждет подтверждения</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
                  @case('presentation_accepted')
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Ваша презентация подтверждена</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
                  @case('presentation_denied')
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Ваша презентация отклонена</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
                  @case('feedback')
                     @php
                        $feedback = App\Models\Feedback::find($notification->type_id);                   
                     @endphp
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Сообщение от пользователя {{$feedback->user->name}} {{$feedback->user->surname}}</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
                  @case('feedback_answered')
                     @php
                        $feedback = App\Models\Feedback::find($notification->type_id);                   
                     @endphp
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Пришел ответ на Ваше сообщение</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
                  @case('booked_book_deleted')
                     <li class="ratings-list-item">
                        <a class="ratings-list-link" href="{{route('notifications.read', $notification->id)}}">
                           <span class="width-60">{{$rank++}}. Забронированная книга была удалена</span>
                           <span class="width-20 txt-center">{{$notification->created_at}}</span>
                           <span class="width-20 txt-center">@if($notification->new) НОВЫЙ @else ПРОСМОТРЕНО@endif</span>
                        </a>
                     </li>
                     @break
               @endswitch
            @endforeach
         </ul>
         {{$notifications->links('components/pagination')}}
      </div>
   </main>
@endsection