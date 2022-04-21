<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div >
        <?php echo Html::img("@web/about/about.jpg" ,["class" => "w-100 pt-3 pb-4"]) ?>
    </div>

    <div class="row" >
        <div class="col-4" >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>  
            </div>  
        </div>
        <div class="col-4" >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>  
            </div>  
        </div>
        <div class="col-4" >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>  
            </div>  
        </div>
    </div>


    <div class="container-fluid" >
        <div class="row" >
            <div class="col-6" >
                <p>Siapak Kami</p>
            </div>
            <div class="col-6" >
                <p> Kami Merupakan Situs daring penjualan kayu pertama di Jepara </p>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-6" >
            <div class="text-center">
            </div>
        </div>
        <div class="col-6" >
            <i class="fas fa-chair" ></i>
            <p>Temukan Berbagai Pilihan kayu terbaik </p>
        </div>
    </div>


    <!-- <code><?= __FILE__ ?></code> -->
</div>
