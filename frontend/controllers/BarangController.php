<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Barang;
use frontend\models\BarangSearch;
use frontend\models\Gambar;
use frontend\models\Identitas;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class BarangController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Barang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $terakhir = Gambar::find()->limit(3);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'terakhir' => $terakhir
        ]);
    }

    /**
     * Displays a single Barang model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Barang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Barang();
        $modelgambar = new Gambar();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->jenis = 1;
                $model->pengiklan = Yii::$app->user->getId();
                $model->save();
                $images = UploadedFile::getInstances($modelgambar, "gambar");
                if ($modelgambar->validate()){
                    foreach( $images as $imag){
                        $pembeda = Yii::$app->security->generateRandomString(10); 
                        $saveTo = 'barang/' . $pembeda. '.' . $imag->extension;
                        if ($imag->saveAs($saveTo)){
                            $model1 = new Gambar([
                                'id_barang' => $model->id,
                                'id_pengguna' => Yii::$app->user->getId(),
                                'gambar'=> $pembeda. '.' . $imag->extension,
                            ]);
                            $model1 -> save(false);  
                        }
                        \Yii::$app->session->setFlash('success', 'iklan berhasil di upload');
                    }
                }     
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'modelgambar' => $modelgambar,
            'model' => $model,
        ]);
    }
    
    public function actionCreatespr()
    {
        $model = new Barang();

        $modelgambar = new Gambar(); 

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->jenis = 2;
                $model->pengiklan = Yii::$app->user->getId();
                $model->save();
                $images = UploadedFile::getInstances($modelgambar, "gambar");
                if ($modelgambar->validate()){
                    foreach( $images as $imag){
                        $pembeda = Yii::$app->security->generateRandomString(10); 
                        $saveTo = 'barang/' . $pembeda. '.' . $imag->extension;
                        if ($imag->saveAs($saveTo)){
                            $model1 = new Gambar([
                                'id_barang' => $model->id,
                                'id_pengguna' => Yii::$app->user->getId(),
                                'gambar'=> $pembeda. '.' . $imag->extension,
                            ]);
                            $model1 -> save(false);  
                        }
                        \Yii::$app->session->setFlash('success', 'iklan berhasil di upload');
                    }
                }   
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('createspr', [
            'model' => $model,
            'modelgambar' => $modelgambar
        ]);
    }
    /**
     * Updates an existing Barang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        $jenis = Barang::find()->select('*')->where(['id' => $id])->one();
        $gambar = Gambar::find()->where(['id_barang' => $id])->all();
        $image = Gambar::find()->where(['id_barang' => $id])->all();

        $modelgambar = new Gambar(['id_barang' => $id]);
        $modgam = new Gambar();
        if ($this->request->isPost && $model->load($this->request->post()) && $modelgambar->load($this->request->post()) ) {
            $model->save();

            $images = UploadedFile::getInstances($modelgambar, "gambar");
            if ($modelgambar->validate()){
                foreach( $images as $imag){
                    $pembeda = Yii::$app->security->generateRandomString(10); 
                    $saveTo = 'barang/' . $pembeda. '.' . $imag->extension;
                    if ($imag->saveAs($saveTo)){
                        $model1 = new Gambar([
                            'id_barang' => $model->id,
                            'id_pengguna' => Yii::$app->user->getId(),
                            'gambar'=> $pembeda. '.' . $imag->extension,
                        ]);
                        $model1 -> save(false);  
                    }
                    \Yii::$app->session->setFlash('success', 'iklan berhasil di upload');
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
            // foreach( $gambar as $gmbr ){
            //         if ($gmbr->gambar != "../web/barang/".$gmbr->gambar ){
            //             // echo $gmbr->gambar;
            //             unlink("../web/barang/".$gmbr->gambar);
            //             $gmbr->delete();  
            //         }else{
            //             // continue;
            //         }
            //     }   
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        if ($jenis['jenis'] == 2 ){
            return $this->render('updatespr',[
                'gambar' => $gambar,
                'model' => $model,
                'modelgambar' => $modelgambar,
                'image' => $image
            ]);
        }else{
            return $this->render('update', [
                'gambar' => $gambar,
                'model' => $model,
                'modelgambar' => $modelgambar,
                'image' => $image
            ]);
        }
        
    }
    /**
     * Deletes an existing Barang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get("id");
        $gambark = Gambar::find()->where(['id_barang' => $id])->all();
        foreach($gambark as $gam){
            unlink("../web/barang/".$gam->gambar);
            $gam->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Barang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Barang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Barang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actionAdmin()
    {
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDetail($id)
    {

        $model = new Barang();
        // $coba = (new Query())->select('*')->from('tbl_barang')->leftJoin('tbl_identitas', 'tbl_identitas.id_pengguna = tbl_barang.pengiklan')->one();
        $detail = Barang::find()->select('*')->where(['id' => $id])->one();
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $modelgambar = Gambar::find()->select('*')->where(['id_barang' => $id])->all();
        $images = ArrayHelper::map($modelgambar, 'id', 'gambar');


        $related_data = Barang::find()->andFilterCompare('jenis',$detail['jenis'],'like')->andFilterHaving(['harga' => $detail['harga']])->limit(3)->all();

        return $this->render('detail', [
            'model' => $model,
            'modelgambar' => $modelgambar,
            'detail' => $detail,
            // 'coba' => $coba,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'images' => $images,
            'related_data' => $related_data
            
        ]);
    }
}
