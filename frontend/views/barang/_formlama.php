<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="barang-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype '=> 'multipart/form-data']]); ?>

    <?php //echo $form->field($model, 'jenis')->textInput() ?>
    
        <?= $form->field($modelgambar, 'gambar[]'  )->fileInput( ['multiple'=>true] ) ?>

        <div class="row">
            <div class="col">
                <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'harga')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?= $form->field($model, 'published')->dropDownList($model->getPublished()) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'ukuran')->dropDownList($model->getUkuran()) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'jumlah')->textInput() ?>
            </div>
        </div>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
