@extends('dashboard.master')

@section('content')
   <main class="companies-page">
      <section class="toolbar">
         <div class="search-wrap"></div>
         <div class="quantity">Компании: {{$quantity}}</div>
         <button class="create" data-action="create">Добавить новую компанию</button>
      </section>
      <section class="content">
         <h1 id="companies-title">Компании</h1>
         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link" href="{{route('dashboard.books')}}">Панель управления сайтом</a>
               <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 10L5 5L0 0V10Z" fill="#7F7FFA"/></svg>
            </li>
            <li class="breadcrumbs-item">
               <a class="breadcrumbs-link current">Компании</a>
            </li>
         </ul>
         <ul class="content-list">
            <li class="content-list-head">
               <span class="width-30">Название компании</span>
               <span class="width-20 txt-center">К-во сотрудников</span>
               <span class="width-20 txt-center">К-во прочитанных книг</span>
               <span class="width-20 txt-center">К-во прочитанных страниц</span>
               <span class="width-10 txt-center">Действие</span>
            </li>
            @foreach ($companies as $company)
               <li class="content-list-item">
                  <span class="width-30">{{$rank++}}. {{$company->title}}</span>
                  <span class="width-20 txt-center">{{$company->employees->count()}}</span>
                  <span class="width-20 txt-center">{{$company->read_books}}</span>
                  <span class="width-20 txt-center">{{$company->read_pages}}</span>
                  <div class="content-actions width-10">
                     <button class="content-action secondary-bg" data-action="update" data-company="{{$company->id}}" data-title="{{$company->title}}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
                     </button>
                     <button class="content-action red-bg" data-action="delete" data-company="{{$company->id}}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                     </button>
                  </div>
               </li>
            @endforeach
         </ul>
         {{$companies->links('components/pagination')}}
      </section>
      <div class="create-modal hidden">
         <form class="create-form" action="{{route('companies.create')}}" method="post">
            @csrf
            <label class="create-form__label">Название компании
               <input class="create-form__input" name="title" type="text" required>
            </label>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="submit">Добавить</button>
               <button class="button button--red" type="button">Отмена</button>
            </div>
         </form>
      </div>
      <div class="update-modal hidden">
         <form class="update-form" action="{{route('companies.update')}}" method="post">
            @csrf
            <input name="company-id" type="hidden" data-id="company-id">
            <label class="update-form__label">Название компании
               <input class="update-form__input" name="title" type="text" data-id="title" required>
            </label>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="submit">Редактировать</button>
               <button class="button button--red" type="button">Отмена</button>
            </div>
         </form>
      </div>
      <div class="delete-modal hidden">
         <form class="delete-form" action="{{route('companies.delete')}}" method="post">
            @csrf
            <input name="company-id" type="hidden" data-id="company-id">
            <p class="delete-message">Вы действительно хотите удалить эту компанию?</p>
            <div class="form-btn-wrapper">
               <button class="button button--green" type="button">Отмена</button>
               <button class="button button--red" type="submit">Удалить</button>
            </div>
         </form>
      </div>
   </main>
@endsection