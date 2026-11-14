<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = 'Мой профиль';

$userName = $user->username ?: 'Пользователь';
$email = $user->email ?: 'Не указана';
$initials = strtoupper(substr($userName, 0, 2));

$registrationDate = $user->created_at
    ? Yii::$app->formatter->asDate($user->created_at, 'php:F Y')
    : 'дата не указана';

$mangaItems = [
    [
        'title' => 'Провожающая в последний путь Фрирен',
        'author' => 'Канэхито Ямада',
        'image' => '@web/assets/image-1.jpeg',
        'progress' => 86,
        'volumes' => '12 из 14 томов',
        'next' => 'Том 13',
    ],
    [
        'title' => 'Дандадан',
        'author' => 'Юкинобу Тацу',
        'image' => '@web/assets/image-2.jpeg',
        'progress' => 42,
        'volumes' => '5 из 12 томов',
        'next' => 'Том 6',
    ],
    [
        'title' => 'Человек-бензопила',
        'author' => 'Тацуки Фудзимото',
        'image' => '@web/assets/image-5.jpeg',
        'progress' => 44,
        'volumes' => '8 из 18 томов',
        'next' => 'Том 9',
    ],
];
?>

<div class="profile-page">

    <section class="profile-heading">
        <div>
            <div class="eyebrow">ТВОЯ ЛИЧНАЯ МАНГА-ПОЛКА / ПРОФИЛЬ</div>
            <h1>История о тебе.</h1>
            <p>Всё, что ты читаешь, любишь и открываешь.</p>
        </div>
    </section>

    <section class="profile-user-card">
        <div class="profile-avatar">
            <?= Html::encode($initials) ?>
        </div>

        <div class="profile-user-info">
            <h2><?= Html::encode($userName) ?></h2>
            <p>
                @<?= Html::encode($userName) ?>
                · Читатель с <?= Html::encode($registrationDate) ?>
            </p>
        </div>

        <div class="profile-user-action">
            <a href="#profile-details" class="btn small">
                Редактировать профиль
            </a>
            <span>Профиль виден только тебе</span>
        </div>
    </section>

    <section class="profile-stats">
        <div class="profile-stat">
            <b>42</b>
            <span>Тайтла в библиотеке</span>
            <small>включая вишлист</small>
        </div>

        <div class="profile-stat">
            <b>146</b>
            <span>Томов прочитано</span>
            <small>+18 за октябрь</small>
        </div>

        <div class="profile-stat">
            <b>18</b>
            <span>Историй завершено</span>
            <small>до последней страницы</small>
        </div>

        <div class="profile-stat">
            <b>7</b>
            <span>Дней подряд</span>
            <small>так держать!</small>
        </div>
    </section>

    <div class="profile-layout">

        <div class="profile-main-column">

            <section class="profile-section">
                <div class="profile-section-heading">
                    <div>
                        <div class="eyebrow">ТВОЯ ПОЛКА</div>
                        <h2>Моя полка</h2>
                    </div>

                    <a class="muted" href="<?= Url::to(['/site/collection']) ?>">
                        Вся полка ↗
                    </a>
                </div>

                <div class="profile-manga-grid">

                    <?php foreach ($mangaItems as $item): ?>
                        <article class="profile-manga-card">

                            <img
                                src="<?= Url::to($item['image']) ?>"
                                alt="<?= Html::encode($item['title']) ?>"
                            >

                            <h3><?= Html::encode($item['title']) ?></h3>

                            <p class="profile-manga-author">
                                <?= Html::encode($item['author']) ?>
                            </p>

                            <div class="progress">
                                <i style="width: <?= (int)$item['progress'] ?>%"></i>
                            </div>

                            <div class="profile-manga-progress">
                                <span><?= Html::encode($item['volumes']) ?></span>
                                <b><?= (int)$item['progress'] ?>%</b>
                            </div>

                            <div class="profile-manga-next">
                                <span><?= Html::encode($item['next']) ?> ↗</span>
                                <a href="<?= Url::to(['/site/catalog']) ?>">+1 том</a>
                            </div>

                        </article>
                    <?php endforeach; ?>

                </div>
            </section>

            <section class="profile-section profile-activity">
                <div class="profile-section-heading">
                    <div>
                        <div class="eyebrow">ТВОИ ОБНОВЛЕНИЯ</div>
                        <h2>Последняя активность</h2>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div>
                        <b>Фрирен · Том 12</b>
                        <span>Прочитано · Сегодня, 14:32</span>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div>
                        <b>Дандадан · Том 6</b>
                        <span>Прочитано · Вчера, 21:10</span>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div>
                        <b>Человек-бензопила · Том 9</b>
                        <span>Добавлено в коллекцию · 23 октября</span>
                    </div>
                </div>
            </section>

        </div>

        <aside class="profile-sidebar">

            <section class="profile-side-card" id="profile-details">
                <div class="eyebrow">АККАУНТ</div>
                <h2>Личные данные</h2>

                <div class="profile-detail-row">
                    <span>Электронная почта</span>
                    <b><?= Html::encode($email) ?></b>
                </div>

                <div class="profile-detail-row">
                    <span>Имя пользователя</span>
                    <b><?= Html::encode($userName) ?></b>
                </div>

                <div class="profile-detail-row">
                    <span>Любимые жанры</span>
                    <b>Фэнтези · Экшен · Драма</b>
                </div>

                <div class="profile-detail-row">
                    <span>О себе</span>
                    <p>Коллекционирую истории, к которым хочется возвращаться.</p>
                </div>
            </section>

            <section class="profile-side-card profile-goal">
                <div class="eyebrow">ОКТЯБРЬ · ЦЕЛЬ</div>
                <h2>18 / 4 <small>2 тома</small></h2>

                <div class="profile-goal-line">
                    <span></span>
                </div>

                <p>
                    Ещё 6 томов — и цель достигнута. Ты уже на три тома впереди прошлого месяца!
                </p>
            </section>

            <section class="profile-side-card">
                <div class="profile-section-heading">
                    <div>
                        <div class="eyebrow">АКТИВНОСТЬ</div>
                        <h2>Твоя неделя</h2>
                    </div>
                    <b class="profile-week-total">32 главы</b>
                </div>

                <div class="profile-week-chart">
                    <?php
                    $weekDays = [
                        ['day' => 'Пн', 'height' => 35],
                        ['day' => 'Вт', 'height' => 65],
                        ['day' => 'Ср', 'height' => 45],
                        ['day' => 'Чт', 'height' => 85],
                        ['day' => 'Пт', 'height' => 55],
                        ['day' => 'Сб', 'height' => 100],
                        ['day' => 'Вс', 'height' => 30],
                    ];
                    ?>

                    <?php foreach ($weekDays as $day): ?>
                        <div class="profile-week-day">
                            <div class="profile-week-bar">
                                <span style="height: <?= $day['height'] ?>%"></span>
                            </div>
                            <small><?= $day['day'] ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </aside>
    </div>

    <section class="profile-bottom-actions">
        <a href="<?= Url::to(['/site/contact']) ?>">Нужна помощь? Напиши нам ↗</a>

        <?= Html::beginForm(['/site/logout'], 'post') ?>
            <button type="submit" class="btn">
                Выйти из аккаунта
            </button>
        <?= Html::endForm() ?>
    </section>

</div>

