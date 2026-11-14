<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'MangaTrack';

$userName = Yii::$app->user->identity->username ?? 'Гость';
?>

<div class="site-index">

    <section class="hero">
        <div class="eyebrow">
            ТВОЯ ЛИЧНАЯ МАНГА-ПОЛКА
        </div>

        <h1>
            С возвращением,
            <br/>
            <?= Html::encode($userName) ?>.
        </h1>

        <p>
            Хорошая история всегда ждёт продолжения. Собирай любимые тайтлы, следи за прогрессом и находи новые миры.
        </p>
    </section>

    <section class="hero-panel">
        <div>
            <div class="eyebrow" style="color:#bda8fa">
                РОДОЛЖИТЬ ПУТЕШЕСТВИЕ / 01
            </div>

            <h2>
                После финала — новая история.
            </h2>

            <p>
                Фрирен только начинает понимать людей. Продолжи её путешествие с 13-го тома.
            </p>

            <a class="btn primary" href="manga">
                Продолжить чтение →
            </a>
        </div>

        <img alt="Манга иллюстрация" src="../assets/image-7.jpeg"/>
    </section>

    <div class="stats">
        <div class="stat">
            <b>42</b>
            <span>Тайтла в библиотеке</span>
        </div>

        <div class="stat">
            <b>146</b>
            <span>Томов прочитано</span>
        </div>

        <div class="stat">
            <b>18</b>
            <span>Историй завершено</span>
        </div>

        <div class="stat">
            <b>7</b>
            <span>Дней подряд</span>
        </div>
    </div>

    <div class="section-head">
        <div>
            <div class="eyebrow">
                ТВОЯ ПОЛКА
            </div>

            <h2>Продолжить чтение</h2>
        </div>

        <a class="muted" href="collection">
            Вся коллекция ↗
        </a>
    </div>

    <div class="grid">
        <article class="card">
            <a href="manga">
                <img class="cover" src="../assets/image-1.jpeg"/>

                <h3>Провожающая в последний путь Фрирен</h3>
            </a>

            <div class="meta">Канэхито Ямада</div>

            <div class="progress">
                <i style="width:86%"></i>
            </div>

            <div class="card-foot">
                <span>12 из 14 томов</span>
                <b class="rating">86%</b>
            </div>
        </article>

        <article class="card">
            <img class="cover" src="../assets/image-2.jpeg"/>

            <h3>Дандадан</h3>

            <div class="meta">Юкинобу Тацу</div>

            <div class="progress">
                <i style="width:42%"></i>
            </div>

            <div class="card-foot">
                <span>5 из 12 томов</span>
                <b class="rating">42%</b>
            </div>
        </article>

        <article class="card">
            <img class="cover" src="../assets/image-6.jpeg"/>

            <h3>Поднятие уровня в одиночку</h3>

            <div class="meta">Чхугон</div>

            <div class="progress">
                <i style="width:44%"></i>
            </div>

            <div class="card-foot">
                <span>8 из 18 томов</span>
                <b class="rating">44%</b>
            </div>
        </article>
    </div>

    <div class="section-head">
        <h2>Твоя следующая любимая история</h2>

        <a class="muted" href="catalog">
            В каталог ↗
        </a>
    </div>

    <div class="grid">
        <article class="card">
            <img class="cover" src="../assets/image-3.jpeg"/>

            <h3>Как защитить старшего брата главной героини</h3>

            <div class="meta">
                Кхин · Дзёсэй · 2019
            </div>
        </article>

        <article class="card">
            <img class="cover" src="../assets/image-4.jpeg"/>

            <h3>Город, в котором меня нет</h3>

            <div class="meta">
                Кэй Самбэ · Детектив · 2012
            </div>
        </article>

        <article class="card">
            <img class="cover" src="../assets/image-5.jpeg"/>

            <h3>Человек-бензопила</h3>

            <div class="meta">
                Тацуки Фудзимото · Экшен · 2018
            </div>
        </article>
    </div>

</div>

