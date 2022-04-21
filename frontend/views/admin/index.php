<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use yii\bootstrap4\Html;

// echo '<pre>';
// echo $barang1;
// echo '<br>';
// echo $barang2;
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['sweetalert2', 'toastr']);
?>
<div class="container" >
    <div class="row" >
        <div class=" col-md-3 col-6 " >
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3> <?= $user ?> </h3>
                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href= "<?=Url::toRoute(["/admin/pengguna"]) ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-6 " >
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3> <?= $barang1 ?> </h3>
                    <p>Jumlah Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href= "<?=Url::toRoute(["/admin/kayu"]) ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-6 "  >
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3> <?= $barang2 ?> </h3>
                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href= "<?=Url::toRoute(["/admin/supir"]) ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- <h1>admin/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p> -->
<?php
$sopir = 32 ;
$kayu = 22;
$user = 10;

?>


<div class="container" >    
    <div class="row" >
        <div class="col-md-8" >
            <?= ChartJs::widget([
                'type' => 'pie',
                'options' => [
                    'height' => 100,
                    'width' => 300
                ],
                'data' => [
                    'labels' => ["Kayu", "Sopir", "User"],
                    'datasets' => [
                        [
                            'label' => "My First dataset",
                            'backgroundColor' => [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => [$kayu, $sopir, $user]
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
        <?php
        
        
        ?>

    </div>
</div>

