<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-add">
<div class="page-title">
    <div class="eyebrow">
     НОВАЯ ИСТОРИЯ НА ПОЛКЕ / 04
    </div>
    <h1>
     Место для новой истории.
    </h1>
    <p>
     Добавь мангу в коллекцию или сохрани на потом — всё начнётся с одной обложки.
    </p>
   </div>
   <div class="form-card">
    <form id="addForm">
     <div class="field">
      <label>
       Название манги *
      </label>
      <input placeholder="Название, автор или ISBN" required=""/>
     </div>
     <div class="two">
      <div class="field">
       <label>
        Автор
       </label>
       <input placeholder="Имя автора"/>
      </div>
      <div class="field">
       <label>
        Тип издания
       </label>
       <select>
        <option>
         Манга
        </option>
        <option>
         Манхва
        </option>
       </select>
      </div>
     </div>
     <div class="two">
      <div class="field">
       <label>
        Количество томов
       </label>
       <input min="1" placeholder="Например, 14" type="number"/>
      </div>
      <div class="field">
       <label>
        Год выхода
       </label>
       <input placeholder="2026" type="number"/>
      </div>
     </div>
     <div class="field">
      <label>
       Жанры
      </label>
      <input placeholder="Фэнтези, приключения, драма"/>
     </div>
     <div class="field">
      <label>
       Описание
      </label>
      <textarea placeholder="Кратко расскажи об истории"></textarea>
     </div>
     <div class="field">
      <label>
       Обложка (ссылка на изображение)
      </label>
      <input placeholder="https://..."/>
     </div>
     <div class="field">
      <label>
       На какую полку?
      </label>
      <select id="shelf">
       <option value="collection">
        Уже читаю или прочитал
       </option>
       <option value="wishlist">
        Хочу прочитать позже
       </option>
      </select>
     </div>
     <button class="primary" type="submit">
      Добавить мангу ↗
     </button>
     <a class="btn" href="catalog">
      Отмена
     </a>
     <p class="muted" id="formMsg">
     </p>
    </form>
   </div>