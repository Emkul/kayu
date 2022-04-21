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
    <h3  > Upload Ulang Gambar Anda </h3>

    <?= $this->render('_formspr', [
        'gambar'=> $gambar,
        'model' => $model,
        'modelgambar' => $modelgambar
    ]) ?>

</div>
