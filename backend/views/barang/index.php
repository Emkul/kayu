<?php

use backend\models\BarangSearch;
use fedemotta\datatables\DataTables;
use yii\helpers\Html;
use yii\widgets\Pjax;


$this->title = Yii::t('app', 'Barangs');
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
.pagination a {
  margin: 0 4px; /* 0 is for top and bottom. Feel free to change it */
}
</style>

<?= Html::a(Yii::t('app', 'Create Barang'), ['create'], ['class' => 'btn btn-success']) ?>

<div class="barang-index pt-5">
    <?php Pjax::begin(); ?>
    <?php
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
    
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'clientOptions' => [
            "lengthMenu"=> [
                [10,20,-1], 
                [10,20,Yii::t('app',"All")]
            ],
            "info"=>false,
            "responsive"=>true, 
            "dom"=> 'lfTrtip',
            "tableTools"=>[
                "aButtons"=> [  
                    [
                    "sExtends"=> "copy",
                    "sButtonText"=> Yii::t('app',"Copy to clipboard")
                    ],[
                    "sExtends"=> "csv",
                    "sButtonText"=> Yii::t('app',"Save to CSV")
                    ],[
                    "sExtends"=> "xls",
                    "oSelectorOpts"=> ["page"=> 'current']
                    ],[
                    "sExtends"=> "pdf",
                    "sButtonText"=> Yii::t('app',"Save to PDF")
                    ],[
                    "sExtends"=> "print",
                    "sButtonText"=> Yii::t('app',"Print")
                    ],
                ]
            ]
        ],
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jenis',
            'judul',
            'harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
