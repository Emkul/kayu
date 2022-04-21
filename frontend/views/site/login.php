<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


?>

<style>
.auth-clients-holder{
    display: inline-block;
    vertical-align: top;

}


</style>
<div class="site-login py-3">
    <div class="row justify-content-center" >
        <div class=" col-lg-5 card" >
            <h1 class="text-center" ><?= Html::encode($this->title) ?></h1>
            <p class="text-center" >Masukkan Username dan Password</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5 card">
            <div class="my-3 mx-3" >
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username']) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        <br>
                        Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                    </div>

                    <div class="form-group row">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        <?= yii\authclient\widgets\AuthChoice::widget([
                            'baseAuthUrl' => ['site/auth'],
                            'popupMode' => false,
                            'class' => 'auth-clients-holder'
                        ]) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
