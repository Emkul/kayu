<?php

namespace frontend\controllers;

class LayoutsController extends \yii\web\Controller
{
    public function actionFooter()
    {
        $coba = 'ini coba';
        return $this->render('layout/blog-section',[
            $coba => 'coba'
        ]);
    }

}
?>
