<?php
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Html as HelpersHtml;
use frontend\controllers\LayoutsController;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php //$this->title = Yii::t('app', 'Kayu');?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?= $this->render('hamburger') ?>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?= $this->render('header') ?>
    <!-- Header Section End -->

    <!-- featured  -->
    <?php 
        $fitur = ($this->title == 'Kayu') ?  $this->render('featured') : null ;
        echo $fitur;
    ?>
    <!-- end featured  -->

    <!-- content -->
    <?= $this->render('content', ['content' => $content]) ?>
    <!-- end content -->    

    <!-- blog column -->
    <?php 
        $retVal = ($this->title == 'Blogs') ?  null : $this->render('blog-section');
        echo $retVal;
    ?>
    <!-- end blog column -->
    
    <!-- ini footer -->
    <?= $this->render('footer') ?>
    <!-- end footer -->


    <!-- Js Plugins -->
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
