
<?php

use yii\helpers\Html;

$this->title = 'Регистрация MangaTrack';
?>

<style>
.signup-page {
    min-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
    background: #f8f6f2;
}

.signup-card {
    width: 100%;
    max-width: 950px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,.06);
}

.signup-info {
    padding: 60px 45px;
    background: #eee9df;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.signup-info span {
    color: #9b8061;
    font-size: 12px;
    letter-spacing: 2px;
    margin-bottom: 25px;
}

.signup-info h2 {
    color: #29251f;
    font-size: 36px;
    line-height: 1.2;
}

.signup-info p {
    color: #746d63;
    line-height: 1.8;
}

.signup-form {
    padding: 55px 45px;
}

.signup-form h1 {
    color: #29251f;
    font-size: 30px;
}

.signup-form > p {
    color: #888078;
    margin-bottom: 30px;
}

.signup-form label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
}

.signup-form input {
    width: 100%;
    padding: 13px;
    border: 1px solid #dedbd5;
    border-radius: 8px;
    margin-bottom: 20px;
    box-sizing: border-box;
}

.signup-submit {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 8px;
    background: #29251f;
    color: white;
    cursor: pointer;
}

.signup-login {
    text-align: center;
    margin-top: 25px;
    color: #777;
    font-size: 14px;
}

.signup-login a {
    color: #9b7650;
    text-decoration: none;
}

@media (max-width: 750px) {
    .signup-card {
        grid-template-columns: 1fr;
    }

    .signup-info,
    .signup-form {
        padding: 35px 25px;
    }
}
</style>

<div class="signup-page">

    <div class="signup-card">

        <div class="signup-info">
            <span>ТВОЯ ЛИЧНАЯ МАНГА-ПОЛКА / РЕГИСТРАЦИЯ</span>

            <h2>Твоя история начинается здесь.</h2>

            <p>
                Создай аккаунт, собирай любимую мангу,
                сохраняй прогресс чтения и возвращайся
                к историям в любое время.
            </p>
        </div>

        <div class="signup-form">

            <h1>Создать аккаунт.</h1>

            <p>Присоединяйся к MangaTrack.</p>

            <form>

                <label for="username">Имя пользователя</label>
                <input
                    type="text"
                    id="username"
                    placeholder="Придумай имя пользователя"
                >

                <label for="email">Электронная почта</label>
                <input
                    type="email"
                    id="email"
                    placeholder="user@example.com"
                >

                <label for="password">Пароль</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Придумай пароль"
                >

                <label for="password-repeat">Повтори пароль</label>
                <input
                    type="password"
                    id="password-repeat"
                    placeholder="Повтори пароль"
                >

                <button type="button" class="signup-submit">
                    Создать аккаунт
                </button>

            </form>

            <div class="signup-login">
                Уже есть аккаунт?
                <?= Html::a('Войти', ['site/auth']) ?>
            </div>

        </div>

    </div>

</div>
