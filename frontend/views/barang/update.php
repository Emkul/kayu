<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Barang */

$this->title = Yii::t('app', 'Update Barang: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Barangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="barang-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <p>Upload Ulang Gambar Anda</p>


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
               
            </div>
            <div class="col-lg-4" >
                <div class="row" >

                    <?php foreach ($image as $imag) : ?>
                        <?php
                          echo Html::img(  "@web/barang/".$imag["gambar"], [ "class"=> " card-img-top", "alt" => "gambar kayu"]);
                        ?>
                    <?php endforeach?>
                </div>          
            </div>
        </div>
    </div>

    <?= $this->render('_form', [
        'gambar' => $gambar,
        'model' => $model,
        'modelgambar' => $modelgambar,
        'image' => $image
    ]) ?>

</div>
