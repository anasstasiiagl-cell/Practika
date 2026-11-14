<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-wishlist">
<div class="page-title">
    <div class="eyebrow">
     СОХРАНЁННЫЕ ИСТОРИИ / 04
    </div>
    <h1>
     До встречи на полке.
    </h1>
    <p>
     Тайтлы, которые хочется прочитать позже.
    </p>
   </div>
   <div class="toolbar">
    <span class="muted">
     Твоя подборка на потом
    </span>
    <a class="btn primary small" href="catalog">
     Найти историю
    </a>
   </div>
   <div class="grid">
    <article class="card">
     <img class="cover" src="../assets/image-3.jpeg"/>
     <h3>
      Как защитить старшего брата главной героини
     </h3>
     <div class="meta">
      Кхин · Дзёсэй · 2019
     </div>
     <button class="small" onclick="alert('Перенесено в коллекцию')">
      ＋ В коллекцию
     </button>
    </article>
    <article class="card">
     <img class="cover" src="../assets/image-4.jpeg"/>
     <h3>
      Город, в котором меня нет
     </h3>
     <div class="meta">
      Кэй Самбэ · Детектив · 2012
     </div>
     <button class="small" onclick="alert('Перенесено в коллекцию')">
      ＋ В коллекцию
     </button>
    </article>
   </div>