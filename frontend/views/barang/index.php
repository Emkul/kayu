<!-- Featured Section Begin -->
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Kayu');
$this->params['barang'] = $dataProvider;
?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li> <?php echo html::a('Identitas', ['identitas/diri'])?></li>
                        <li> <?php echo html::a('Posting Kayu', ['barang/create'])?> </li>
                        <li> <?php echo html::a('Posting Sopir', ['barang/createspr'])?> </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Pencarian
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                        <h5><a href="#">hHiglight</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                        <h5><a href="#">Higlight</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                        <h5><a href="#">Higlight</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                        <h5><a href="#">Higlight</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                        <h5><a href="#">Higlight</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->






<?php Pjax::begin(); ?>
<section class="featured spad">
    <div class="container">
        <div class="row featured__filter">
            <?php foreach ($dataProvider->models as $row) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix">
                <div class="featured__item">
                <?php $datagambar = $row->gambaran; ?>
                    <div class="featured__item__pic set-bg" data-setbg="<?php $retVal = ($datagambar == null) ? 'tidak ada' : 'barang/'.$datagambar->gambar ; echo $retVal;  ?>">
                        <?php //echo Html::img(  "@web/barang/".$datagambar->gambar, [ "class"=> " card-img-top", "alt" => "gambar kayu"]) ?>
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo Url::toRoute(["/barang/detail","id"=>$row["id"]]) ?>"><?= $row['judul']?></a></h6>
                        <h5>Rp <?= $row["harga"] ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php Pjax::end(); ?>

<!-- Featured Section End -->