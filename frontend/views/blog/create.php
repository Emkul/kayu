<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Blog */

$this->title = Yii::t('app', 'Create Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <section class="breadcrumb-section set-bg" style="background-color: brown;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?= Html::encode($this->title) ?></h2>
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">Home</a> -->
                            <!-- <span>Checkout</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
