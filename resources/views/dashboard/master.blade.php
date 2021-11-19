<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <meta name="robots" content="none"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <meta name="yandex" content="none"/>
      <title>AtS Book Space | Панель управления</title>
      {{-- Datetime picker --}}
      <link rel="stylesheet" href="{{asset('css/datetimepicker.css')}}"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      {{-- Owl carousel --}}
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      {{-- Application styles --}}
      <link rel="stylesheet" href="{{mix('/css/dashboard.css')}}">
   </head>
   <body>
      
      <div class="modal modal--fail {{session()->has('fail') ? '' : 'hidden'}}">{{session()->get('fail')}}</div>
      <div class="modal modal--success {{session()->has('success') ? '' : 'hidden'}}">{{session()->get('success')}}</div>

      @if ($errors->any())
         <div class="modal modal--fail">
            <ul class="form-errors">
               @foreach ($errors->all() as $error)
                  <li class="form-errors__item">{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

      @include('dashboard.sidebar')

      @yield('content')

      {{-- JQuery 3.6 --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- Datetime picker --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>
      {{-- Owl carousel --}}
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      {{-- Application scripts --}}
      <script src="{{mix('/js/dashboard.js')}}"></script>
   </body>
</html>