<?php

use yii\helpers\Url;
use yii\helpers\Html;

$currentRoute = Yii::$app->controller->route;
$isGuest = Yii::$app->user->isGuest;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1" name="viewport"/>

    <title>MangaTrack</title>

    <link rel="stylesheet" href="<?= Url::to('@web/css/styles.css') ?>">
</head>

<body>

<header class="topbar">
    <div class="wrap nav">

        <a class="brand" href="<?= Url::to(['/site/index']) ?>">
            MangaTrack
            <span>.</span>
        </a>

        <nav class="links">

            <a class="<?= $currentRoute == 'site/index' ? 'active' : '' ?>"
               href="<?= Url::to(['/site/index']) ?>">
                Главная
            </a>

            <a class="<?= $currentRoute == 'site/catalog' ? 'active' : '' ?>"
               href="<?= Url::to(['/site/catalog']) ?>">
                Каталог
            </a>

            <a class="<?= $currentRoute == 'site/collection' ? 'active' : '' ?>"
               href="<?= Url::to(['/site/collection']) ?>">
                Коллекция
            </a>

            <a class="<?= $currentRoute == 'site/wishlist' ? 'active' : '' ?>"
               href="<?= Url::to(['/site/wishlist']) ?>">
                Вишлист
            </a>

            <?php if (!$isGuest): ?>
                <a class="<?= $currentRoute == 'site/profile' ? 'active' : '' ?>"
                   href="<?= Url::to(['/site/profile']) ?>">
                    Профиль
                </a>
            <?php endif; ?>

        </nav>

        <div class="navright">

            <span class="lang">RU</span>

            <?php if (!$isGuest): ?>

                <span class="username">
                    <?= Html::encode(Yii::$app->user->identity->username) ?>
                </span>

                <a class="btn primary small"
                   href="<?= Url::to(['/site/add']) ?>">
                    ＋ Добавить мангу
                </a>

                <?= Html::beginForm(['/site/logout'], 'post', ['style' => 'display:inline']) ?>

                    <button type="submit" class="btn small">
                        Выйти
                    </button>

                <?= Html::endForm() ?>

            <?php else: ?>

                <a class="btn primary small"
                   href="<?= Url::to(['/site/auth']) ?>">
                    Войти
                </a>

            <?php endif; ?>

        </div>

    </div>
</header>

<main class="container home-main page-main">
    <?= $content ?>
</main>

<footer class="footer">
    <div class="wrap">
        © 2026 MangaTrack · Каждая история — часть тебя.

        <span style="float:right">
            Помощь　 О проекте　 Русский ↗
        </span>
    </div>
</footer>

<nav class="mobile-nav">

    <a href="<?= Url::to(['/site/index']) ?>">
        ⌂
        <span>Главная</span>
    </a>

    <a href="<?= Url::to(['/site/catalog']) ?>">
        ⌕
        <span>Каталог</span>
    </a>

    <a href="<?= Url::to(['/site/collection']) ?>">
        ▤
        <span>Коллекция</span>
    </a>

    <a href="<?= Url::to(['/site/wishlist']) ?>">
        ♡
        <span>Вишлист</span>
    </a>

</nav>

<script src="<?= Url::to('@web/app.js') ?>"></script>

</body>
</html>


