<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior; 
/**
 * This is the model class for table "{{%barang}}".
 *
 * @property int $id
 * @property int|null $jenis
 * @property string $judul
 * @property int $harga
 * @property string $keterangan
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $pengiklan
 * @property int|null $is_deleted
 * @property string|null $ukuran
 * @property string|null $alamat
 * @property int|null $jumlah
 * @property string|null $mobil
 * @property string|null $sopir
 * @property string|null $no_hp
 * @property string|null $no_wa
 *
 * @property User $pengiklan0
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang}}';
    }
     /**
     * Buat Waktu/Timestamp
     * 
    */
    public function behaviors()
    {
        return 
        [
            [
                'class' => TimestampBehavior::className(),
                'value' => new \yii\db\Expression( 'NOW()' ),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis', 'harga', 'pengiklan', 'is_deleted', 'jumlah', 'published'], 'integer'],
            [['judul', 'harga', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul'], 'string', 'max' => 255],
            [['ukuran'], 'string', 'max' => 6],
            [['alamat', 'mobil', 'sopir'], 'string', 'max' => 50],
            [['no_hp', 'no_wa'], 'string', 'max' => 20],
            [['pengiklan'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['pengiklan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'judul' => Yii::t('app', 'Judul'),
            'harga' => Yii::t('app', 'Harga'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'pengiklan' => Yii::t('app', 'Pengiklan'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'ukuran' => Yii::t('app',''),
            'alamat' => Yii::t('app', 'Alamat'),
            'jumlah' => Yii::t('app', 'Jumlah'),
            'mobil' => Yii::t('app', 'Mobil'),
            'sopir' => Yii::t('app', 'Sopir'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'no_wa' => Yii::t('app', 'No Wa'),
            'published' => Yii::t('app', 'Published'),
            'globalSearch' => Yii::t('app',''),

        ];
    }

    /**
     * Gets query for [[Pengiklan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengiklan0()
    {
        return $this->hasOne(User::className(), ['id' => 'pengiklan']);
    }

    public function getPublished()
    {
        return [
            1 => 'Yes',
            0 => 'No'
        ];
    }

    public function getUkuran()
    {
        return [
            'Piton' => 'Piton',
            'DL' => 'DL',
            'OP' => 'OP',
            'OD' => 'OD',
            '30' => '30',
            '40' => '40',
            '50+' => '50+'
        ];
    }

    public function getGambaran()
    {
        $model = Gambar::find()->where(['id_barang' => $this->id])->max('id');
        // $ket = "tidak ada";
        if($model == null){
            return null;
        }else{
            return $this->hasOne(Gambar::className(), ['id_barang'=>'id'])->where(['id'=>$model]);
        }
        
        
    }
    public function getGam(){
        $model = Gambar::find()->where(['id_barang' => $this->id])->max('id');
        return $this->hasMany(Gambar::className(), ['id_barang' => 'id'])->where(['id'=> $model]);
    }


    public function getPengiklan( $id ){

        
        return $this->hasOne(User::className(), ['pengiklan' => $id])->where(['id' => yii::$app->user->getId()])->one;
    }
}
