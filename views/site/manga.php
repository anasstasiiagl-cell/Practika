<?php

/* @var $this yii\web\View */

use yii\helpers\VarDumper;

$this->title = 'My Yii Application';
?>
<div class="site-manga">
    <div class="page-title">
        <div class="eyebrow">
            КАТАЛОГ / ФРИРЕН
        </div>
        <p>
            Главная　/　Каталог　/　Фрирен
        </p>
    </div>
    <section class="detail">
        <img class="detail-cover" src="../<?= $manga->cover ?>" />
        <div>
            <div class="eyebrow">
                FRIEREN / 葬送のフリーレン
            </div>
            <h1>
                <?= $manga->title ?>
                <!-- Провожающая в последний путь Фрирен -->
            </h1>
            <div class="rating">
                ★ <?= $manga->rating ?>
                <span class="muted">
                    из 10 · превосходно
                </span>
            </div>
            <p>
                <?= $manga->description ?>
            </p>
            <div class="pills">
                <?php foreach ($pils as $pil) { ?>
                    <span class="pill">
                        <?= $pil->genre->name ?>
                    </span>
                <?php } ?>
                <!-- <span class="pill">
                    Фэнтези
                </span>
                <span class="pill">
                    Приключения
                </span>
                <span class="pill">
                    Драма
                </span> -->
            </div>
            <p class="meta">
                Канэхито Ямада · Цукаса Абэ　　2020 — настоящее время
            </p>
            <button class="primary" onclick="addTo('collection')">
                В коллекцию
            </button>
            <button onclick="addTo('wishlist')">
                В вишлист
            </button>
        </div>
        <aside class="detail-side">
            <div class="eyebrow">
                МОЙ ПРОГРЕСС
            </div>
            <h2>
                12 / 14
            </h2>
            <div class="progress">
                <i style="width:86%">
                </i>
            </div>
            <b>
                86%
            </b>
            <p class="muted">
                Прочитано 12 томов из 14.
            </p>
            <button class="primary" onclick="alert('Продолжение чтения: том 13')" style="width:100%">
                Продолжить · Том 13
            </button>
            <hr style="border:0;border-top:1px solid var(--line);margin:18px 0" />
            <div class="muted">
                Моя оценка
            </div>
            <h3>
                ★ 9 / 10
            </h3>
        </aside>
    </section>
    <div class="section-head">
        <div>
            <div class="eyebrow">
                ИСТОРИЯ ПО ТОМАМ
            </div>
            <h2>
                12 прочитано · 2 впереди
            </h2>
        </div>
        <span class="muted">
            По порядку ↓
        </span>
    </div>
    <div class="volumes" id="volumes">
    </div>
    <div class="notice">
        История продолжается. Сообщим, когда в каталоге появится 15-й том.
    </div>