<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Identitas */

$this->title = Yii::t('app', 'Create Identitas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-create py-4">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <h2 class="d-flex justify-content-center" >ISI IDENTITAS TERLEBIH DAHULU</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
