<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Identitas */

$this->title = Yii::t('app', 'Update Identitas: {name}', [
    'name' => $model->id,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="identitas-update">

    <h1><?php // echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
