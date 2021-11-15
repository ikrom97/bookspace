@extends('layouts.master')

@section('title', 'О клубе')

@section('content')
   <main class="about-page">
      
      <section class="our-values">
         <img class="our-values__bg" src="{{asset('img/our-values-bg.jpg')}}">
         <div class="our-values__container">
            <h2 class="our-values__title">Наши планы</h2>
            <ul class="values">
               <li class="values__item">
                  <h3 class="values__title">Обучение</h3>
                  <p class="values__text">
                     Оказание профессионального результативного Консалтинга Компаниям любой сферы и масштаба.
                  </p>
               </li>
               <li class="values__item">
                  <h3 class="values__title">Развитие</h3>
                  <p class="values__text">
                     Старт проведения сертифицированных семинаров и тренингов, по окончанию которых каждый участник получитсертификаты.
                  </p>
               </li>
               <li class="values__item">
                  <h3 class="values__title">Опыт</h3>
                  <p class="values__text">
                     Налаживания сотрудничества с другими местными и зарубежными тренинг центрами для обмена опытом.
                  </p>
               </li>
               <li class="values__item">
                  <h3 class="values__title">Образование</h3>
                  <p class="values__text">
                     Разработка практических методик и пособий, а также издание спец. литературы.
                  </p>
               </li>
               <li class="values__item">
                  <h3 class="values__title">Профессионализм</h3>
                  <p class="values__text">
                     Кузница уникальных, узкоспециализированных востребованных кадров.
                  </p>
               </li>
            </ul>
         </div>
      </section>
      <section class="present-time">
         <div class="container">
            <b class="present-time__notation">
               «Корпоративное обучение – залог развития и успешности любой Компании!»
            </b>
            <p>
               Профессионально «подкованные» сотрудники с БОЛЬШИМ И ПРАВИЛЬНЫМ ускорением развивают компанию!
            </p> <br>
            <p>
               Грамотные сотрудники качественнее/глубже вовлекаются в рабочие процессы, являются катализаторами новых идей/инсайтов и эффективнее/результативнее действуют в направлении достижения поставленных целей, личных и корпоративных.
            </p> <br>
            <p>
               Довольные сотрудники – довольное руководства – все это влияет на атмосферу и мотивацию внутри компании, укрепляет ценности ККК, снижает текучесть кадров, усиливает репутацию компании и ее привлекательность на рынке труда.
            </p>
         </div>
      </section>
      <section class="about-us">
         <div class="container">
            <h1 class="about-us__title">О клубе</h1>
            <p class="about-us__text">
               AtS Book Space является структурным подразделением Группы Компаний ‹‹КОИНОТИ НАВ›› и сформирован на базе корпоративного учебного центра, который эффективно функционировал с 2016 г. Наши цели и планы построены на нашей амбициозности, проактивности, креативности, настойчивости и смелости бросить вызов и реализовать:
            </p>
            <ul class="about-us__list">
               <li class="about-us__item">
                  Сформировать культуру обучения в Компаниях.
               </li>
               <li class="about-us__item">
                  Сформировать ответственность сотрудника за собственное обучение.
               </li>
               <li class="about-us__item">
                  Помочь осознать важность и ценность обучения.
               </li>
               <li class="about-us__item">
                  Простимулировать саморазвитие и самосовершенствование.
               </li>
            </ul>
         </div>
      </section>
   </main>
@endsection