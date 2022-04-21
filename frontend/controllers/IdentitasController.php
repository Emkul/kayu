<?php

namespace frontend\controllers;

use frontend\models\Barang;
use yii; 
use frontend\models\Identitas;
use frontend\models\IdentitasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\UploadedFile;


/**
 * IdentitasController implements the CRUD actions for Identitas model.
 */
class IdentitasController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Identitas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdentitasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Identitas model.
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
     * Creates a new Identitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Identitas();

        // var_dump($model);
        

        if ($this->request->isPost) {
            $gambar =  UploadedFile::getInstance($model ,'gambar');
            if ($model->load($this->request->post())) {

                // var_dump($model);
                // echo "<pre>";
                $model->id_pengguna = Yii::$app->user->getId();
                $pembeda = Yii::$app->security->generateRandomString(10);
                $saveto = 'profil/' . $pembeda. '.' . $gambar->extension;
                $gambar->saveAs($saveto);
                $model->gambar = $pembeda. "." . $gambar->extension;
                $model->save();

                return $this->redirect(["diri"]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Identitas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $identitas = new Identitas();
        $id = Yii::$app->user->getId();
        $model = Identitas::find()->select("*")->where(["id_pengguna" => $id])->one();
        // $model = $this->findModel($id);
        $lama = $model->gambar;
        // echo $lama;
        $gambar =  UploadedFile::getInstance($model ,'gambar');
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->gambar = UploadedFile::getInstance($model, 'gambar');
            // echo "<pre>";
            // var_dump($model->gambar);
            // exit;
            if($model->validate()){
                if ($model->gambar == null) {
                    $model->gambar = $lama;
                    $model->save();
                } else {
                    $pembeda = Yii::$app->security->generateRandomString(10);
                    $namagambar = $pembeda. '.' .$model->gambar->extension;
                    $saveto = 'profil/'.$namagambar;
                    if ($model->gambar->saveAs($saveto)) {
                        unlink('profil/'.$lama);
                        $model->gambar = $namagambar;    
                        $model->save(false);
                    }
                }
            }
            // $model->save();
            return $this->redirect(['diri', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Identitas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Identitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Identitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Identitas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDiri()
    {
        $mod = Barang::find()->select('*')->all();
        $model = new Identitas();
        $id = Yii::$app->user->getId();
        $jumlah = Barang::find()->where(['pengiklan' => $id])->count();
        $barang = Barang::find()->select("*")->where(["pengiklan" => $id])->all();
        $identitas = Identitas::find()->where(["id_pengguna" => $id ])->one();
        if ($identitas == null)
        {
            return $this->redirect(["create"]);
            // return $this->render("create" ,[
            //     "model" => $model,
            // ]);

        }else{
            return $this->render('diri', [
                'barang' => $barang,
                'identitas' => $identitas,
                'model' => $model
            ]);
        }
        
    }
}
