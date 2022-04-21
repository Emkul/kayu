<?php

use frontend\models\Identitas;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$gambar = Identitas::find()->select("*")->where(['id'=> Yii::$app->user->getId()])->one();
?>

<aside class="main-sidebar sidebar-light-primary elevation-4 " style="height: 100vh;">
    <!-- Brand Logo -->
    <a href="<?php echo Url::toRoute("barang/index") ?>" class="brand-link">
        <?php //echo Html::img( "@web/profil/". ?>
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Toko Kayu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php //echo Html::img( "@web/profil/".$gambar["gambar"], [ 'class' => 'brand-image rounded-circle elevation-3', 'style' => 'width: 35px; height: 32px;' ]) ?>
            </div>
            <div class="info">
                <a href="<?php echo Url::toRoute(["/identitas/diri"]) ?>" class="d-block"> 
                <?php //echo Yii::$app->user->identity->username; 
                if (Yii::$app->user->isGuest){
                    echo "";
                }else{
                    echo Yii::$app->user->identity->username; 
                }
                ?> 
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $menu = [
                ['label' => 'Beranda', 'iconClass' => 'fas fa-home' ,'url' => ['/barang/index']],
                
            ];
            if(Yii::$app->user->isGuest){
                $menu[] = ['label' => 'Masuk', 'iconClass' => 'fas fa-arrow-alt-circle-right' ,'url' => ['/site/login']];
                $menu[] = ['label' => 'Daftar', 'iconClass' => 'fas fa-sign-in-alt' ,'url' => ['/site/signup']];

            }else{
                $menu[] = ['label' => 'Update Profil', 'iconClass'=>'fas fa-pen-alt' ,'url' => ['/identitas/update'],
                $menu[] = ['label' => 'Profil', 'iconClass' => 'far fa-address-card'  ,'url' => ['/identitas/diri']],
                $menu[] = ['label' => 'Keranjang','iconClass' => 'fas fa-shopping-basket'  ,'url' => ['/cart/pribadi']]
            ];
            }
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $menu 
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- <p>
[
        
        // 'label' => 'Starter Pages',
        // 'icon' => 'tachometer-alt',
        // 'badge' => '<span class="right badge badge-info">2</span>',
        // 'items' => [
        //     ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
        //     ['label' => 'Inactive Page', 'iconStyle' => 'far'],
        // ]
    ],
    
    // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
    // ['label' => 'Yii2 PROVIDED', 'header' => true],
    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
    // ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
    // ['label' => 'Level1'],
    // [
    //     'label' => 'Level1',
    //     'items' => [
    //         ['label' => 'Level2', 'iconStyle' => 'far'],
    //         [
    //             'label' => 'Level2',
    //             'iconStyle' => 'far',
    //             'items' => [
    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
    //             ]
    //         ],
    //         ['label' => 'Level2', 'iconStyle' => 'far']
    //     ]
    // ],
    // ['label' => 'Level1'],
    // ['label' => 'LABELS', 'header' => true],
    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
    // ['label' => 'Warning', 'iconClass' => 'nav-icon fa fa-coffee text-warning'],
    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
],
</p> -->