
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Авторизация';
?>

<div class="site-login">

    <h1>С возвращением.</h1>

    <p>Твои истории ждут продолжения.</p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email')->textInput([
            'autofocus' => true,
            'placeholder' => 'user@example.com'
        ])->label('Электронная почта') ?>

        <?= $form->field($model, 'password')->passwordInput([
            'placeholder' => 'Введите пароль'
        ])->label('Пароль') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'label' => 'Запомнить меня'
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Войти в аккаунт', [
                'class' => 'btn btn-primary',
                'name' => 'login-button'
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <p>
        Нет аккаунта?
        <?= Html::a('Создать аккаунт', ['site/signup']) ?>
    </p>

</div>
