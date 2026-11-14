<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $manga array */
/* @var $allTypes array */
/* @var $allGenres array */
/* @var $totalCount int */
/* @var $q string */
/* @var $selTypes array */
/* @var $selGenres array */
/* @var $yearFrom string|null */
/* @var $yearTo string|null */

$this->title = 'Каталог MangaTrack';
$count = count($manga);
?>

<div class="site-catalog">

    <div class="page-title">
        <div class="eyebrow">НАХОДИ СВОИ ИСТОРИИ / 02</div>
        <h1>За пределами полки.</h1>
        <p><?= $totalCount ?> историй. Одна — твоя следующая.</p>
    </div>

    <?php $form = \yii\widgets\ActiveForm::begin([
        'method' => 'get',
        'action' => ['catalog'],
        'options' => ['id' => 'catalogFilterForm'],
    ]); ?>

    <!-- Поиск (вне layout, на всю ширину) -->
    <input class="search"
        name="q"
        value="<?= Html::encode($q) ?>"
        placeholder="⌕ Найти мангу, манхву, автора или ISBN" />

    <div class="catalog-layout" style="margin-top:22px">

        <aside class="filterbox">
            <h3>
                Фильтры
                <a href="<?= Url::to(['catalog']) ?>"
                    style="float:right;color:var(--purple)">Сбросить</a>
            </h3>

            <b>Тип издания</b>
            <?php foreach ($allTypes as $type): ?>
                <label>
                    <input type="checkbox" name="type[]"
                        value="<?= Html::encode($type) ?>"
                        <?= in_array($type, $selTypes, true) ? 'checked' : '' ?> />
                    <?= Html::encode($type) ?>
                </label>
            <?php endforeach; ?>

            <hr style="border:0;border-top:1px solid var(--line)" />

            <b>Жанры</b>
            <?php foreach ($allGenres as $genre): ?>
                <label>
                    <input type="checkbox" name="genre[]"
                        value="<?= Html::encode($genre) ?>"
                        <?= in_array($genre, $selGenres, true) ? 'checked' : '' ?> />
                    <?= Html::encode($genre) ?>
                </label>
            <?php endforeach; ?>

            <hr style="border:0;border-top:1px solid var(--line)" />

            <b>Год выхода</b>
            <div style="margin-top:8px">
                От
                <input type="number" name="year_from"
                    value="<?= Html::encode($yearFrom) ?>"
                    placeholder="1980"
                    style="width:65px;padding:6px;border:1px solid var(--line)" />
                до
                <input type="number" name="year_to"
                    value="<?= Html::encode($yearTo) ?>"
                    placeholder="2026"
                    style="width:65px;padding:6px;border:1px solid var(--line)" />
            </div>

            <button type="submit" class="primary"
                style="width:100%;margin-top:12px">
                Применить фильтры
            </button>
        </aside>

        <section>
            <div class="toolbar">
                <?php
                // Скрытое поле для текущего таба
                echo Html::hiddenInput('tab', $activeTab, ['id' => 'activeTabInput']);

                // Список табов
                $tabs = [
                    'all'    => 'Все истории',
                    'popular' => 'Популярное',
                    'new'    => 'Новинки',
                    'editor' => 'Выбор редакции',
                ];
                ?>

                <div class="pills">
                    <?php foreach ($tabs as $key => $label): ?>
                        <a href="#"
                            class="pill <?= $activeTab === $key ? 'active' : '' ?>"
                            data-tab="<?= $key ?>"
                            style="text-decoration: none; <?= $activeTab === $key ? '' : 'color: inherit;' ?>">
                            <?= Html::encode($label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <span class="muted">
                    Найдено <span id="foundCount"><?= $count ?></span>
                </span>
            </div>

            <div class="grid" id="catalogGrid">
                <?php foreach ($manga as $item): ?>
                    <?php
                    $genreString = implode(
                        ', ',
                        ArrayHelper::getColumn($item->genres, 'name')
                    );
                    ?>
                    <article class="card">
                        <a href="<?= Url::to(['manga', 'id' => $item->id]) ?>">
                            <?php if (!empty($item->cover)): ?>
                                <img class="cover"
                                    src="<?= Url::to('@web/' . ltrim($item->cover, '/')) ?>"
                                    alt="<?= Html::encode($item->title) ?>" />
                            <?php else: ?>
                                <div class="cover">Обложка отсутствует</div>
                            <?php endif; ?>

                            <h3><?= Html::encode($item->title) ?></h3>
                        </a>

                        <div class="meta">
                            <?= Html::encode($item->author) ?>
                            <?= Html::encode($genreString) ?>
                        </div>

                        <p class="rating">
                            <?php if ($item->rating !== null): ?>
                                ★ <?= number_format((float)$item->rating, 1, ',', '') ?>
                            <?php else: ?>
                                Рейтинг не указан
                            <?php endif; ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>

            <?php if ($count === 0): ?>
                <p id="noResults">
                    По выбранным фильтрам ничего не найдено.
                </p>
            <?php endif; ?>

            <div class="toolbar">
                <span class="muted">
                    Показано <span id="shownCount"><?= $count ?></span>
                    из <?= $totalCount ?> тайтлов
                </span>
            </div>
        </section>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('catalogFilterForm');
        const tabInput = document.getElementById('activeTabInput');

        document.querySelectorAll('.pill[data-tab]').forEach(function(pill) {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                tabInput.value = this.dataset.tab;
                form.submit();
            });
        });
    });
</script>