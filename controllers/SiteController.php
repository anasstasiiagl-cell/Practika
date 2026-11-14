<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Genres;
use app\models\Manga;
use app\models\MangaGenres;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['auth', 'signup', 'login', 'error', 'captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    // Главная страница
    public function actionIndex()
    {
        return $this->render('index');
    }

    // Страница авторизации
    public function actionAuth()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['catalog']);
        }

        $model = new LoginForm();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->login()
        ) {
            return $this->redirect(['catalog']);
        }

        return $this->render('auth', [
            'model' => $model,
        ]);
    }

    // Старая авторизация
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['catalog']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['catalog']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    // Страница регистрации
    public function actionSignup()
    {
        return $this->render('signup');
    }

    // Профиль пользователя
    public function actionProfile()
    {
        $user = Yii::$app->user->identity;

        return $this->render('profile', [
            'user' => $user,
        ]);
    }

    public function actionCatalog()
    {
        $request = Yii::$app->request;

        // --- Читаем параметры из GET ---
        $q        = trim((string)$request->get('q', ''));
        $types    = (array)$request->get('type', []);    // массив выбранных типов
        $genres   = (array)$request->get('genre', []);   // массив выбранных жанров
        $yearFrom = $request->get('year_from');
        $yearTo   = $request->get('year_to');

        $tab = $request->get('tab', 'all');
        
        // --- Базовый запрос ---
        $query = Manga::find()->with('genres');
        switch ($tab) {
            case 'popular':
                // Сортируем по рейтингу (популярное)
                $query->orderBy(['rating' => SORT_DESC, 'manga.id' => SORT_ASC]);
                break;

            case 'new':
                // Сортируем по дате добавления (новинки)
                $query->orderBy(['created_at' => SORT_DESC, 'manga.id' => SORT_DESC]);
                break;

            case 'editor':
                // Выбор редакции (например, рейтинг >= 8.5)
                $query->andWhere(['>=', 'rating', 8.5])
                    ->orderBy(['rating' => SORT_DESC]);
                break;

            case 'all':
            default:
                // По умолчанию — по ID
                $query->orderBy(['manga.id' => SORT_ASC]);
                break;
        }
        // Поиск по названию / автору / ISBN (у вас ISBN в модели нет —
        // ищем по title и author; при наличии поля ISBN — добавьте)
        if ($q !== '') {
            $query->andWhere([
                'or',
                ['like', 'title',  $q],
                ['like', 'author', $q],
            ]);
        }

        // Тип издания (мультивыбор)
        $types = array_filter(array_map('trim', $types), 'strlen');
        if ($types) {
            $query->andWhere(['manga_type' => $types]);
        }

        // Жанры (мультивыбор) — через связь
        $genres = array_filter(array_map('trim', $genres), 'strlen');
        if ($genres) {
            $query->innerJoin('manga_genres mg', 'mg.manga_id = manga.id')
                ->innerJoin('genres g', 'g.id = mg.genre_id')
                ->andWhere(['g.name' => $genres])
                ->groupBy('manga.id');
        }

        // Год выхода
        if ($yearFrom !== null && $yearFrom !== '') {
            $query->andWhere(['>=', 'release_year', (int)$yearFrom]);
        }
        if ($yearTo !== null && $yearTo !== '') {
            $query->andWhere(['<=', 'release_year', (int)$yearTo]);
        }

        $manga = $query->orderBy(['manga.id' => SORT_ASC])->all();

        // --- Списки для отображения фильтров (всегда ВСЕ значения, не только отфильтрованные) ---
        $allTypes = Manga::find()
            ->select('manga_type')
            ->where(['is not', 'manga_type', null])
            ->andWhere(['<>', 'manga_type', ''])
            ->distinct()
            ->column();
        sort($allTypes);

        $allGenres = Genres::find()->select('name')->orderBy('name')->column();

        return $this->render('catalog', [
            'manga'      => $manga,
            'allTypes'   => $allTypes,
            'allGenres'  => $allGenres,
            'totalCount' => Manga::find()->count(),
            'q'          => $q,
            'selTypes'   => $types,
            'selGenres'  => $genres,
            'yearFrom'   => $yearFrom,
            'yearTo'     => $yearTo,
            'activeTab'  => $tab, // <--- передаем активный таб
        ]);
    }

    // Страница отдельной манги
    public function actionManga($id)
    {
        $manga = Manga::findOne($id);
        $pils = MangaGenres::find()->where(['manga_id' => $id])->all();

        return $this->render('manga', ['manga' => $manga, 'pils' => $pils]);
    }

    // Вишлист
    public function actionWishlist()
    {
        return $this->render('wishlist');
    }

    // Коллекция
    public function actionCollection()
    {
        return $this->render('collection');
    }

    // Добавление манги
    public function actionAdd()
    {
        return $this->render('add');
    }

    // Выход из аккаунта
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['auth']);
    }

    // Страница обратной связи
    public function actionContact()
    {
        $model = new ContactForm();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->contact(Yii::$app->params['adminEmail'])
        ) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    // Страница О проекте
    public function actionAbout()
    {
        return $this->render('about');
    }
}
