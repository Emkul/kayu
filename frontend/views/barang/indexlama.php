<?php

use frontend\models\Gambar;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = Yii::t('app', 'Barangs');
// $this->params['breadcrumbs'][] = $this->title;

?>
<div class="barang-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <link rel="stylesheet" href="style.css">

    <style>

    .img-thumbnail{
        width: 150%;
    }
    </style>

    <!-- <div class="site-index">
        <div class="body-content">
            <div class="row">
                <?php //foreach ($dataProvider->models as $row) : ?>
                    <div class="col-md-2 col-6">
                        <div class="card my-3 shadow p-3 bg-white rounded">    
                            <div class= "card-header">
                                <?php //echo $row['judul'] ?>
                            </div>
                            <div class="card-body">
                                <?php //echo $datagambar = $row->gambaran; ?>
                                <?php //echo Html::img(  "@web/barang/".$datagambar->gambar, [ "class"=> " card-img-top", "alt" => "gambar kayu"]) ?>
                                <h3 style="margin-top: 9px;" class="card-title">Rp <?php //echo $row["harga"] ?></h3>
                                <p class="card-text text-truncate" style="max-width: 150px;" > <?php //echo $row['keterangan']?></p>
                                <p class="card-txt" > <small class="text-muted" > Dibuat Pada  <?php //echo $row['created_at']?></small> </p>
                                <p class="d-inline-block text-truncate" style="max-width: 200px;"></p> -->
                                <!-- <p class="card-text"><?php //echo \yii\helpers\StringHelper::truncateWords($row->keterangan, 7 );  ?></p> -->
                                <!-- <a href="<?php //echo Url::toRoute(["/barang/detail","id"=>$row["id"]]) ?>" >Detail</a>

                                <?php

                                    // echo html::buttonInput('Button',['class' => 'fas fa-shopping-basket ml-auto p-2 ']  );
                                    // if (yii::$app->user->isGuest) {
                                    //     echo "";
                                    // }else{
                                    //     echo html::a('', ["/cart/create","id"=>$row["id"]], ["data-method"=> "post", 'class' => 'fas fa-shopping-basket ml-auto p-2 ' ]);
                                    // } 
                                ?>

                            </div>
                            
                            <?php //echo Html::a(Html::encode($row->judul), ['detail', 'id_barang' => $row->id_barang]); ?>
                        </div>
                    </div>
                <?php //endforeach; ?>
            </div>
        </div>
    </div> -->




    <!-- <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?> -->

    <?php Pjax::end(); ?>

</div>


    

