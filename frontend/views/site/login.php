<meta  content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../web/css/login.css">
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Alert;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
<?php
    if( isset($newUser) ){
        echo Alert::widget([
            'options' => [
                'class' => 'alert-info',
            ],
            'body' => "Welcome to EasyDo !. Let's login now",
        ]);
    }
?>
    <h1 style="text-align:center;margin-top:40px;"><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5" id="login-form">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="margin:1em 0; font-size:10px;">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
  
</div>
