<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use common\models\User;
use yii\helpers\Html as htmlhelpers;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row justify-content-center" >
        <div class="col-lg-5 card" >
            <h1 class="text-center" ><?= Html::encode($this->title) ?></h1>
            <p class="text-center" >
                Diisi secara lengkap/ jika sudah memiliki akun silahkan klik <?php echo htmlhelpers::a('disini', ['site/login']); ?> 
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5 card">
            <div class="my-3 mx-3" >
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username']) ?>

                <?= $form->field($model, 'email')->input('email', ['placeholder' => 'E-mail']) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>

                <div class="form-group">
                    <?= Html::submitButton( Yii::t('app','Signup','Save'),['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
