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
      <title>AtS Book Space | @yield('title')</title>
      {{-- Datetime picker --}}
      <link rel="stylesheet" href="{{asset('css/datetimepicker.css')}}"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      {{-- Owl carousel --}}
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      {{-- Application styles --}}
      <link rel="stylesheet" href="{{mix('/css/app.css')}}">
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

      @include('layouts.header')

      @yield('content')

      @include('layouts.footer')

      <div class="container scroll-top__container">
         <button class="scroll-top-btn hidden" type="button">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" class="svg-inline--fa fa-chevron-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
         </button>
      </div>

      {{-- JQuery 3.6 --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- Datetime picker --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>
      {{-- Owl carousel --}}
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      {{-- Application scripts --}}
      <script src="{{mix('/js/app.js')}}"></script>
   </body>
</html>