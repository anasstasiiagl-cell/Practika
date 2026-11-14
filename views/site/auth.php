<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход в MangaTrack';
?>

<style>
.auth-page {
    min-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
    background: #f8f6f2;
}

.auth-card {
    width: 100%;
    max-width: 1050px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,.06);
}

.auth-info {
    padding: 65px 50px;
    background: #eee9df;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.auth-info .eyebrow {
    font-size: 12px;
    letter-spacing: 2px;
    color: #9b8061;
    margin-bottom: 25px;
}

.auth-info h2 {
    font-size: 38px;
    line-height: 1.2;
    color: #29251f;
    margin-bottom: 20px;
}

.auth-info p {
    color: #746d63;
    line-height: 1.8;
    font-size: 15px;
}

.auth-form {
    padding: 65px 50px;
}

.auth-form h1 {
    font-size: 30px;
    margin-bottom: 10px;
    color: #29251f;
}

.auth-subtitle {
    color: #888078;
    margin-bottom: 35px;
}

.auth-form label {
    display: block;
    margin-bottom: 9px;
    color: #39342e;
    font-size: 14px;
}

.auth-form input[type="email"],
.auth-form input[type="password"] {
    width: 100%;
    padding: 14px;
    border: 1px solid #dedbd5;
    border-radius: 8px;
    margin-bottom: 8px;
    box-sizing: border-box;
    outline: none;
}

.auth-form input:focus {
    border-color: #9b8061;
}

.auth-form .help-block {
    color: #b94a48;
    font-size: 12px;
    margin: 0 0 12px;
}

.auth-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    margin: 20px 0 25px;
}

.auth-options label {
    display: flex;
    align-items: center;
    gap: 7px;
    margin: 0;
}

.auth-options input {
    margin: 0;
}

.auth-options a,
.auth-register a {
    color: #9b7650;
    text-decoration: none;
}

.auth-submit {
    display: block;
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 8px;
    background: #29251f;
    color: white;
    font-size: 15px;
    cursor: pointer;
}

.auth-divider {
    text-align: center;
    color: #999;
    margin: 28px 0 18px;
    font-size: 13px;
}

.auth-socials {
    display: flex;
    gap: 12px;
}

.auth-socials button {
    flex: 1;
    padding: 13px;
    border: 1px solid #dedbd5;
    background: white;
    border-radius: 8px;
    cursor: pointer;
}

.auth-register {
    text-align: center;
    margin-top: 30px;
    font-size: 14px;
    color: #777;
}

.auth-note {
    text-align: center;
    font-size: 11px;
    line-height: 1.6;
    color: #aaa;
    margin-top: 25px;
}

@media (max-width: 750px) {
    .auth-card {
        grid-template-columns: 1fr;
    }

    .auth-info,
    .auth-form {
        padding: 35px 25px;
    }

    .auth-info h2 {
        font-size: 30px;
    }
}
</style>

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-info">
            <div class="eyebrow">
                ТВОЯ ЛИЧНАЯ МАНГА-ПОЛКА / ВХОД
            </div>

            <h2>Много историй.<br>Одна твоя полка.</h2>

            <p>
                Собирай любимую мангу, отмечай прочитанное
                и находи то, что захочется читать дальше.
            </p>
        </div>

        <div class="auth-form">

            <h1>С возвращением.</h1>

            <p class="auth-subtitle">
                Твои истории ждут продолжения.
            </p>

            <?php $form = ActiveForm::begin([
                'id' => 'auth-form',
                'method' => 'post',
                'action' => ['site/auth'],
                'options' => [
                    'autocomplete' => 'on',
                ],
            ]); ?>

                <?= $form->field($model, 'email')->textInput([
                    'type' => 'email',
                    'placeholder' => 'user@example.com',
                    'autocomplete' => 'email',
                    'id' => 'email',
                ])->label('Электронная почта') ?>

                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Введите пароль',
                    'autocomplete' => 'current-password',
                    'id' => 'password',
                ])->label('Пароль') ?>

                <div class="auth-options">
                    <label>
                        <?= Html::activeCheckbox($model, 'rememberMe', [
                            'label' => 'Запомнить меня',
                        ]) ?>
                    </label>

                    <a href="#">Забыли пароль?</a>
                </div>

                <button type="submit" class="auth-submit">
                    Войти в аккаунт
                </button>

            <?php ActiveForm::end(); ?>

            <div class="auth-divider">
                или продолжить через
            </div>

            <div class="auth-socials">
                <button type="button">Google</button>
                <button type="button">VK</button>
            </div>

            <div class="auth-register">
                Нет аккаунта?
                <?= Html::a('Создать аккаунт', ['site/signup']) ?>
            </div>

            <div class="auth-note">
                Продолжая, ты принимаешь условия использования
                и политику конфиденциальности.
            </div>

        </div>
    </div>
</div>

