<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    

    <div class="d-flex flex-row" >
        <div>
            <?= $form->field($model, 'globalSearch')->textInput(['class' => 'hero__search__form', 'placeholder' => 'Pencarian']) ?>
        </div>
        <div>
            <?= Html::submitButton(Yii::t('app', 'Cari'), ['class' => 'site-btn']) ?>
            <?php //echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    
    

  

    <?php // echo $form->field($model, 'jenis') ?>

    <?php // echo $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'pengiklan') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'ukuran') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'mobil') ?>

    <?php // echo $form->field($model, 'sopir') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'no_wa') ?>

    

    <?php ActiveForm::end(); ?>

</div>
