<?php

namespace frontend\controllers;

use frontend\models\Barang;
use frontend\models\Identitas;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $barang = Barang::find();
        $barang1 = $barang->where(['jenis' => 1])->count(); 
        $barang2 = $barang->where(['jenis' => 2])->count();
        $user = Identitas::find()->count(); 
        return $this->render('index', [
            'barang1' => $barang1,
            'barang2' => $barang2,
            'user' => $user
        ]);
    }
    public function actionPengguna(){

        $pengguna = Identitas::find()->select('*')->all(); 

        return $this->render('pengguna', [
            'pengguna' => $pengguna
        ]);

    }
    public function actionKayu()
    {
        $barang = Barang::find()->select('*')->all();
        $kayu = Barang::find()->where(['jenis' => 1])->all();
        $model = new Barang();

        // var_dump($barang);
        return $this->render('kayu',[
            'model' => $model,
            'kayu' => $kayu,
            'barang' => $barang
        ]);

    }
    public function actionSupir(){

        $semua = Barang::find();
        $data = $semua->select('*')->where(['jenis' => 2]) ->all();
        $supir = $semua->where(['jenis' => 2])->count();

        // var_dump($barang);
        return $this->render('supir',[
            'supir' => $supir,
            'data' => $data
        ]);


    }
}
